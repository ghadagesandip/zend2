<?php
namespace Checklist\Model;

class TaskEntity{
	
	protected $id
	protected $title;
	protected $completed = 0;
	protected $created;

	public function __construct(){
		$this->created = date('Y-m-d H:i:s');
	}


	public function setId($id){
		$this->id = $id;
	}

	public function getId(){
		return $this->id;
	}

	public function setTitle($title){
		$this->title = $title;
	}

	public function getTitle(){
		return $this->title;
	}

	public function setCompleted($$completed){
		$this->completed = $completed;
	}

	public function getCompleted(){
		return $this->completed;
	}

	public function getCreated()
     {
       return $this->created;
     }

     public function setCreated($Value)
     {
       $this->created = $Value;
     }
     
}