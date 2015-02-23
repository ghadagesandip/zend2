<?php
return array(
	'controllers' => array(
         'invokables' => array(
             'Checklist\Controller\Task' => 'Checklist\Controller\TaskController',
         ),
     ),
	
	'view_manager' => array(
         'template_path_stack' => array(
             'task' => __DIR__ . '/../view',
         ),
    ),

	'router' => array(
	    'routes' => array(
	        'task' => array(
	            'type'    => 'Segment',
	            'options' => array(
	                'route'    => '/task[/:action[/:id]]',
	                'defaults' => array(
	                    '__NAMESPACE__' => 'Checklist\Controller',
	                    'controller'    => 'Task',
	                    'action'        => 'index',
	                ),
	                'constraints' => array(
	                    'action' => '(add|edit|view|delete)',
	                    'id'     => '[0-9]+',
	                ),
	            ),
	        ),
	    ),
	),
);