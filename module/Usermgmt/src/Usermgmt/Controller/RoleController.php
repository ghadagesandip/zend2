<?php

namespace Usermgmt\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Usermgmt\Model\Role;
use Usermgmt\Form\RoleForm;


class RoleController extends AbstractActionController
{

	protected $roleTable = null;

	public function getRoleTable(){
		if(!$this->roleTable){
			$sm = $this->getServiceLocator();
			$this->roleTable = $sm->get('Usermgmt\Model\RoleTable');
		}
		return $this->roleTable;
	}


    public function indexAction()
    {
        return new ViewModel(array(
           'roles' => $this->getRoleTable()->fetchAll(),
        ));
    }



    public function viewAction()
    {

    }

    public function addAction()
    {
        $form = new RoleForm();
        $form->get('submit')->setAttribute('value','Submit');

        $request = $this->getRequest();
        
        if($request->isPost()){
            $role = new Role();
            $form->setInputFilter($role->getInputFilter());
            $form->setData($request->getPost());

            if($form->isValid()){
                $role->exchangeArray($form->getData());
                $this->getRoleTable()->saveRole($role);
                $this->flashMessenger()->addMessage('Role added successfully');
                return $this->redirect()->toRoute('role');
            }
        }
        
        return array('form'=>$form);
    }



    public function editAction()
    {
        $id = (int) $this->params()->fromRoute('id',0);
        if(!$id){
            return $this->redirect()->toRoute('role',array('action'=>'add'));
        }

        try{
            $role =  $this->getRoleTable()->getRole($id);
        }catch(Exception $e){
            return $this->redirect()->toRoute('role',array('action'=>'index'));
        }

        $form = new RoleForm();
        $form->bind($role);
        $form->get('submit')->setAttribute('value','Update');

        $request = $this->getRequest();
        
        if($request->isPost()){
            $form->setInputFilter($role->getInputFilter()); 
            $form->setData($request->getPost());

            if($form->isValid()){
                $this->getRoleTable()->saveRole($role);
                $this->flashMessenger()->addMessage('role updated successfully');
                return $this->redirect()->toRoute('role');
            }
        }

        return array(
            'id'=>$id,
            'form'=>$form
        );    

    }



    public function deleteAction()
    {
        $id = (int) $this->params()->fromRoute('id',0);
        if(!$id){
            $this->flashMessenger()->addMessage('no role to delete');
            $this->redirect()->toRoute('role',array('action'=>'index'));
        }

        $request = $this->getRequest();
        if($request->isPost()){
            $del = $request->getPost('del','No');
            if($del=='Yes'){
                $this->getRoleTable()->deleteRole($id);
                $this->flashMessenger()->addMessage('Record delete successfully');
                $this->redirect()->toRoute('role');
            }
        }

         return array(
           'id'=>$id,
           'role'=>$this->getRoleTable()->getRole($id)
        );  


    }



}

