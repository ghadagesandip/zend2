<?php
return array(
	'router'=>array(
		'routes'=>array(
			   'role' => array(
	                'type' => 'Zend\Mvc\Router\Http\Literal',
	                'options' => array(
	                    'route'    => '/role',
	                    'defaults' => array(
	                        'controller' => 'Usermgmt\Controller\Role',
	                        'action'     => 'index',
	                    ),
	                ),

           		),
			   'role' => array(
	                'type' => 'Zend\Mvc\Router\Http\segment',
	                'options' => array(
	                    'route'    => '/role[/:action][/:id]',
		                    'constraints' => array(
	                      	   'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
	                           'id'     => '[0-9]+',
                     	),
	                    'defaults' => array(
	                        'controller' => 'Usermgmt\Controller\Role',
	                        'action'     => 'index',
	                    ),
	                ),

           		),

		)
	),
	 'controllers' => array(
        'invokables' => array(
            'Usermgmt\Controller\Role' => 'Usermgmt\Controller\RoleController'
        ),
    ),
	'view_manager' => array(
           'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);