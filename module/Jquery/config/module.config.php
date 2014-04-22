<?php

namespace Jquery;

return array(
	'router' => array(
		'routes' => array(
			'jquery-home' => array(
				'type' => 'Zend\Mvc\Router\Http\Literal',
				'options' => array(
					'route' => '/jquery',
					'defaults' => array(
						'controller' => 'Jquery\Controller\Index',
						'action' => 'index',
					)
				)
			)
		)
	),
	'controllers' => array(
		'invokables' => array(
			'Jquery\Controller\Index' => 'Jquery\Controller\IndexController',
		)
	),
	'view_manager' => array(
		'template_path_stack' => array(
			'jquery' => __DIR__ . '/../view',
		)
	)
);