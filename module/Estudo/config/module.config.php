<?php

namespace Estudo;

return array(
    'router' => array(
        'routes' => array(
            'estudo' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/product',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Estudo\Controller',
                        'controller' => 'Index',
                        'action'     => 'index'
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                                
                            ),
                        )
                    )
                )
            )
        )
    ),
    'controllers' => array(
        'invokables' => array(
            'Estudo\Controller\Index' => 'Estudo\Controller\IndexController',
        )
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'estudo' => __DIR__ . '/../view',
        )
    ),
    /*'doctrine' => array(
        'driver' => array(
            __NAMESPACE__ . '_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => ''
            )
        )
    )*/
);

