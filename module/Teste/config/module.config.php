<?php

namespace Teste;

return array(
	'router' => array(
		'routes' => array(
			'teste-form' => array(
				'type' => 'Literal',
				'options' => array(
					'route' => '/form',
					'defaults' => array(
						'__NAMESPACE__' => 'Teste\Controller',
						'controller' => 'Index',
						'action' => 'index',
					)
				)
			),
			'teste-new' => array(
				'type' => 'Literal',
				'options' => array(
					'route' => '/new',
					'defaults' => array(
						'__NAMESPACE__' => 'Teste\Controller',
						'controller' => 'Index',
						'action' => 'new',
					)
				)
			),
			'teste-filter' => array(
				'type' => 'Literal',
				'options' => array(
					'route' => '/filter',
					'defaults' => array(
						'__NAMESPACE__' => 'Teste\Controller',
						'controller' => 'Index',
						'action' => 'filter',
					)
				)
			)
		)
	),
	'controllers' => array(
		'invokables' => array(
			'Teste\Controller\Index' => 'Teste\Controller\IndexController',
		),
	),
	'view_manager' => array(
		'template_path_stack' => array(
			'teste' => __DIR__ . '/../view'
		)
	),
	'service_manager' => array(
		'abstract_factories' => array(
			'Zend\Form\FormAbstractServiceFactory'
		)
	),
	'validators' => array(
		'invokables' => array(
			'Special' => 'Teste\Validator\Special',
		)
	),
	'forms' => array(
		'SampleForm' => array(
			'hydrator' => 'ObjectProperty',
			'type' => 'Zend\Form\Form',
			'elements' => array(
				array(
					'spec' => array(
						'type' => 'Text',
						'name' => 'simpleinput',
						'options' => array(
							'label' => 'Exemplo de entrada:'
						)
					)
				),
				array(
					'spec' => array(
						'type' => 'Submit',
						'name' => 'submit',
						'attributes' => array(
							'value' => 'Go'
						)
					)
				)
			),
			'input_filter' => array(
				'simpleinput' => array(
					'required' => true,
					'validators' => array(
						array(
							'name' => 'Special'
						)
					)
				)
			)
		)
	)
);