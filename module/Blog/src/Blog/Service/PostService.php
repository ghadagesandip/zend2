<?php

namespace Blog\Service;
use Blog\Mapper\PostServiceInterface;

class PostService implements PostServiceInterface{

	protected $postMapper;

    public function __construct(PostServiceInterface $postMapper){

        $this->postMapper = $postMapper;

    }


	public function findAllPosts(){
		return $this->postMapper->findAll();		
	}

	public function findPost($id){
		
        return $this->postMapper->find($id)	;
	}

	
}
