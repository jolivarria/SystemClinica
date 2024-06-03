<?php

declare(strict_types=1);

namespace Expedientes;


use Laminas\Router\Http\Segment;
//use Laminas\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'expedientes' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/expedientes[/:action]',
                    'defaults' => [
                        'controller' => Controller\ExpedientesController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'abrir-expediente' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/expedientes/openexp[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\ExpedientesController::class,
                        'action'     => 'openexp',
                    ],
                ],
            ],
            'guardar-expediente' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/expedientes/guardar[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\ExpedientesController::class,
                        'action'     => 'guardar',
                    ],
                ],
            ],
            'consentimiento-expediente' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/expedientes/consentimiento[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\ExpedientesController::class,
                        'action'     => 'rptconsentimieno',
                    ],
                ],
            ],
            'listexpediente-expediente' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/expedientes/listexpediente[/:action]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\ExpedientesController::class,
                        'action'     => 'listexpediente',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\ExpedientesController::class => Controller\Factory\ExpedientesControllerFactory::class,
        ],
    ],
    'view_manager' => [
        'template_map' => [
            'expedientes'                 => __DIR__ . '/../view/expedientes/index.phtml',
           


            
        ],
        'template_path_stack' => [
            'expedientes' => __DIR__ . '/../view',
        ],
    ],
];
