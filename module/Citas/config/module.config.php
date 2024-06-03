<?php

declare(strict_types=1);

namespace Citas;


use Laminas\Router\Http\Segment;
//use Laminas\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'citas' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/cita/index[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\CitasController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'mostar-all-citas' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/cita/mostar-all-citas[/:action]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\CitasController::class,
                        'action'     => 'mostarcitas',
                    ],
                ],
            ],
            'nuevo-cita' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/cita/nuevo[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\CitasController::class,
                        'action'     => 'nuevo',
                    ],
                ],
            ],
            'guardar-cita' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/cita/guardar[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\CitasController::class,
                        'action'     => 'guardar',
                    ],
                ],
            ],
            'editar-citas' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/citas/editar[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\CitasController::class,
                        'action'     => 'editar',
                    ],
                ],
            ],
            'eliminar-cita' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/cita/eliminar[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\CitasController::class,
                        'action'     => 'eliminar',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\CitasController::class => Controller\Factory\CitasControllerFactory::class,
        ],
    ],
    'view_manager' => [
        'template_map' => [
            'citas'                 => __DIR__ . '/../view/citas/index.phtml',
           


            
        ],
        'template_path_stack' => [
            'citas' => __DIR__ . '/../view',
        ],
    ],
];
