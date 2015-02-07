<?php 

namespace Usermgmt\Form;
use Zend\Form\Form;

class RoleForm extends Form{
	
	public function __construct($name = null){
		parent::__construct('role');
	

		$this->add(array(
			'name'=>'id',
			'type'=>'Hidden'
		));

		$this->add(array(
			'name'=>'name',
			'type'=>'Text',
			'options'=>array(
				'label'=>'Name'
			)
		));


		$this->add(array(
			'name'=>'submit',
			'type'=>'submit',
			'attributes'=>array(
				'value'=>'Go',
				'id'=>'submitbutton',
				'class'=>'btn btn-primary'
			)
		));

		$this->add(array(
			'name'=>'reset',
			'type'=>'button',
			'attributes'=>array(
				'value'=>'Reset',
				'class'=>'btn btn-default'
			)
		));

	}
}
