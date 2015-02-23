<?php
namespace Checklist\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Checklist\Form\TaskForm;
use Checklist\Model\TaskEntity;

class TaskController extends AbstractActionController
{
	public function getTaskMapper(){
		$sm = $this->getServiceLocator();
		return $sm->get('TaskMapper');
	}


	public function indexAction(){

		$tasks = $this->getTaskMapper()->fetchAll();
		//echo '<pre>'; print_r($tasks);exit;

		//return array('tasks'=>$tasks); this also works
		return new ViewModel(array('tasks'=>$tasks));	
	}

	public function addAction(){
		
		$form = new TaskForm();
		$task = new TaskEntity();
		$form->bind($task);

		$request = $this->getRequest();
		if($request->isPost()){
			$form->setData($request->getPost());
			if($form->isValid()){
				$this->getTaskMapper()->saveTask($task);
				return $this->redirect()->toRoute('task');
			}	
		}	

		return array('form'=>$form);
	}

	public function editAction(){
		$id = (int) $this->params('id');
		if(!$id){
			return $this->redirect()->toRoute('task',array('action'=>'add'));
		}

		$task = $this->getTaskMapper()->getTask($id);
		$form = new TaskForm();
		$form->bind($task);

		$request = $this->getRequest();
		if($request->isPost()){
			$form->setData($request->getPost());
			if($form->isValid()){
				$this->getTaskMapper()->saveTask($task);
				return $this->redirect()->toRoute('task');
			}
		}

		return array(
			'id'=>$id,
			'form'=>$form
		);
	}


	public function deleteAction(){
		$id = $this->params('id');
		$task = $this->getTaskMapper()->getTask($id);

		if(!$task){
			return $this->redirect()->toRoute('task');
		}

		$request = $this->getRequest();
		if($request->isPost()){
			if($request->getPost()->get('delete')=='Yes'){
				if($this->getTaskMapper()->deleteTask($id)){
					$this->flashMessenger()->addMessage('Task deleeted');	
				}
			}
			return $this->redirect()->toRoute('task');
		}

		return array(
			'id'=>$id,
			'task'=>$task
		);
	}

	public function viewAction(){
		$id = $this->params('id');
		$task = $this->getTaskMapper()->getTask($id);
		return new ViewModel(array('task'=>$task));

	}
}