<?php

namespace SONApi;

return array(
    
    'di' => array(
        'instance' => array(
            'alias' => array(
                'json-pp' => 'SONApi\PostProcessor\Json',
                'xml-pp' => 'SONApi\PostProcessor\Xml'
            )
        )
    ),
    
    'controllers' => array(
        'invokables' => array(
            'curso' => 'SONApi\Controller\CursoController',
            'user' => 'SONApi\Controller\UserController'
        )
    ),
    
    'router' => array(
        'routes' => array(
            'restful' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/api/:controller[/:formatter][/:id[/]]',
                    'constraints' => array(
                        'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'formatter' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[a-zA-Z0-9_-]*'
                    ),
                    'defaults' => array(
                        'formatter' => 'json',
                    )
                )
            )
        )
    ),
);

