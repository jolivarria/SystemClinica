<?php

declare(strict_types=1);

namespace Prestamos;


use Laminas\Router\Http\Segment;
//use Laminas\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'prestamos' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/prestamos[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\PrestamosController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'mostar-all-prestamos' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/prestamos/mostar-all-prestamos[/:action]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\PrestamosController::class,
                        'action'     => 'mostarprestamos',
                    ],
                ],
            ],
            'nuevo-prestamos' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/prestamos/nuevo[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\PrestamosController::class,
                        'action'     => 'nuevo',
                    ],
                ],
            ],
            'guardar-prestamos' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/prestamos/guardar[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\PrestamosController::class,
                        'action'     => 'guardar',
                    ],
                ],
            ],
            'editar-citas' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/prestamos/editar[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\PrestamosController::class,
                        'action'     => 'editar',
                    ],
                ],
            ],
            'eliminar-cita' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/prestamos/eliminar[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\PrestamosController::class,
                        'action'     => 'eliminar',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\PrestamosController::class => Controller\Factory\PrestamosControllerFactory::class,
        ],
    ],
    'view_manager' => [
        'template_map' => [
            'prestamos'                 => __DIR__ . '/../view/prestamos/index.phtml',
           


            
        ],
        'template_path_stack' => [
            'prestamos' => __DIR__ . '/../view',
        ],
    ],
];
