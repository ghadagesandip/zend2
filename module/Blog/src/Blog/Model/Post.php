<?php
namespace Blog\Model;

class Post implements PostInterface{

	protected $id;

	protected $title;

	protected $text;

	public function getId(){
		return $ths->id;
	}

	public function setId($id){
		$this->id = $id;
	}
}




