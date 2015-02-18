<?php
namespace Checklist\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class TaskController extends AbstractActionController
{
	public function getTaskMapper(){
		$sm = $this->getServiceLocator();
		return $sm->get('TaskMapper');
	}


	public function indexAction(){

		$mapper = $this->getTaskMapper();
		$tasks = $mapper->fetchAll();
		//echo '<pre>'; print_r($tasks);exit;
		return new ViewModel(array('tasks'=>$tasks));	
	}

	public function addAction(){
		
	}

}