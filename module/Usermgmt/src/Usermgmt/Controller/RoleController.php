<?php

namespace Usermgmt\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

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
        return new ViewModel();
    }

    public function addAction()
    {
        return new ViewModel();
    }

    public function editAction()
    {
        return new ViewModel();
    }

    public function deleteAction()
    {
        return new ViewModel();
    }


}

