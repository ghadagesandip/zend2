	<?php
return array(
	'service_manager' => array(
         'invokables' => array(
             'Blog\Service\PostServiceInterface' => 'Blog\Service\PostService'
         )
     ),


	'router'=>array(
		'routes'=>array(
			'post'=>array(
				'type'=>'literal',
				'options'=>array(
					'route'=>'/blog',
					'defaults'=>array(
						'controller'=>'Blog\Controller\List',
						'action'=>'index'
					)
				)
			)
		)
	),

	'controllers'=>array(
		'factories'=>array(
			'Blog\Controller\List' => 'Blog\Factory\ListControllerFactory'
		)
	),

	'view_manager'=>array(
		'template_path_stack'=>array(
			__DIR__.'/../view',
		)
	)
);