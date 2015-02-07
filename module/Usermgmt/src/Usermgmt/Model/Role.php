<?php
namespace Usermgmt\Model;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use zend\InputFilter\InputFilterInterface;

class Role implements InputFilterAwareInterface
{
 
 public $id;
 public $name;
 protected $inputFilter;

 public function exchangeArray($data)
 {
     $this->id     = (!empty($data['id'])) ? $data['id'] : null;
     $this->name   = (!empty($data['name'])) ? $data['name'] : null;
 }

 public function getArrayCopy()
 {
     return get_object_vars($this);
 }


 public function setInputFilter(InputFilterInterface $inputFilter){
 	throw new Exception("Error Processing Request", 1);
 }

 public function getInputFilter(){
 	if(!$this->inputFilter){
 		$inputFilter = new InputFilter();
 	

	 	$inputFilter->add(array(
	 		'name'=>'id',
	 		'required'=>true,
	 		'filters'=>array(
	 			array('name'=>'Int')
	 		)
	 	));

	 	$inputFilter->add(array(
	 		'name'=>'name',
	 		'required'=>true,
	 		'filters'=>array(
	 			array('name'=>'StripTags'),
	 			array('name'=>'StringTrim')
	 		),
	 		'validators'=>array(
	 			array(
	 					'name'=>'StringLength',
	 					'options'=>array(
	 						'encoding' => 'UTF-8',
	 						'min' => '3',
	 						'max'=>'30'
	 					)
	 				)
	 		 )
	 	));

	 	$this->inputFilter = $inputFilter;
	}

	return $this->inputFilter;

 }


}