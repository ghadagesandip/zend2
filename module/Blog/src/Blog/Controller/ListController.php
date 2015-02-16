<?php
namespace Blog\Controller;

use Blog\Service\PostServiceInterface;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ListController extends AbstractActionController
{

	protected $postService;

	public function __construct(PostServiceInterface $postService){

		$this->postService = $postService;
	}

    public function indexAction()
    {

            $posts = $this->postService->findAllPosts();
            return new ViewModel(array('posts'=>$posts));
            //return array('posts'=>$posts);

    }


}

