<?php
return array(
	 'controllers' => array(
         'invokables' => array(
             'Usermgmt\Controller\Role' => 'Usermgmt\Controller\RoleController',
         ),
     ),
	'router'=>array(
		'routes'=>array(
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
	'view_manager' => array(
           'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);