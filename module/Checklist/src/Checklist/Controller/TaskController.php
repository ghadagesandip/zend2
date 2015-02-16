<?php
namespace Checklist\Controller;
use Zend\Mvc\Controller\AbstractActionController;

class TaskController extends AbstractActionController
{
	public function getTaskMapper(){
		$sm = $this->getServiceLocator();
		return $sm->get('TaskMapper');
	}


	public function indexAction(){

		$mapper = $this->TaskMapper();
		$task = $mapper->fetchAll();
		echo '<pre>'; print_r($task);exit;

		return new ViewModel(array('task'=>$task));
	}

}