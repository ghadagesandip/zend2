<?php
 namespace Album\Form;

 use Zend\Form\Form;

 class AlbumForm extends Form
 {
     public function __construct($name = null)
     {
         // we want to ignore the name passed
         parent::__construct('album');

         $this->add(array(
             'name' => 'id',
             'type' => 'Hidden',
         ));
         $this->add(array(
             'name' => 'title',
             'type' => 'Text',
             'options' => array(
                 'label' => 'Title',
             ),
             'attributes'=>array(
                'class'=>'form-control'
              )
         ));
         $this->add(array(
             'name' => 'artist',
             'type' => 'Text',
             'options' => array(
                 'label' => 'Artist',
             ),
             'attributes'=>array(
                'class'=>'form-control'
              )
         ));
         $this->add(array(
             'name' => 'submit',
             'type' => 'Submit',
             'attributes' => array(
                 'value' => 'Go',
                 'id' => 'submitbutton',
                 'class'=>'btn btn-primary'
             ),
         ));

         $this->add(array(
             'name' => 'reset',
             'type' => 'button',
             'attributes' => array(
                 'value' => 'Reset',
                 'id' => 'resetbutton',
                 'class'=>'btn btn-default'
             ),
         )); 
     }
 }