<?php 

namespace Blog\Factory;

use Blog\Service\PostService;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class PostServiceInterface implements FactoryInterface{

	public function createService(ServiceLocatorInterface $serviceLocator){

		return new PostService(
			$serviceLocator->get('Blog\Mapper\PostServiceInterface')
		);

	}
}