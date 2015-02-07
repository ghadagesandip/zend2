<?php
return array(

	'router'=>array(
		'routes'=>array(
			'post'=>array(
				'type'=>'literal',
				'options'=>array(
					'route'=>'/blog',
					'default'=>array(
						'controller'=>'Blog\controller\List',
						'action'=>'index'
					)
				)
			)
		)
	),

	'controllers'=>array(
		'invokables'=>array(
			'Blog\controllers\List' => 'Blog\controllers\ListController'
		)
	),

	'view_manager'=>array(
		'template_path_stack'=>array(
			__DIR__.'/../view',
		)
	)
);