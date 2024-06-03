<?php

declare(strict_types=1);

namespace Pacientes;

use Laminas\Router\Http\Literal;
use Laminas\Router\Http\Segment;

//use Laminas\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'home' => [
                'type'    => Literal::class,
                'options' => [
                    'route'    => '/',
                    'defaults' => [
                        'controller' => Controller\PacientesController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'pacientes' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/pacientes[/:action]',
                    'defaults' => [
                        'controller' => Controller\PacientesController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'ingresos' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/ingresos[/:action]',
                    'defaults' => [
                        'controller' => Controller\PacientesController::class,
                        'action'     => 'ingresos',
                    ],
                ],
            ],
            'ingreso-alta' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/new[/:action]',
                    'defaults' => [
                        'controller' => Controller\PacientesController::class,
                        'action'     => 'alta',
                    ],
                ],
            ],
            'ingreso-editar' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/edit[/:action]',
                    'defaults' => [
                        'controller' => Controller\PacientesController::class,
                        'action'     => 'editar',
                    ],
                ],
            ],
            'ingreso-eliminar' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/delete[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\PacientesController::class,
                        'action'     => 'eliminar',
                    ],
                ],
            ],
            'traslado-rescate' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/recate[/:action]',
                    'defaults' => [
                        'controller' => Controller\TrasladosController::class,
                        'action'     => 'traslado',
                    ],
                ],
            ],
            'traslado-new' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/recate/new[/:action]',
                    'defaults' => [
                        'controller' => Controller\TrasladosController::class,
                        'action'     => 'new',
                    ],
                ],
            ],
            'traslado-edit' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/recate/edit[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\TrasladosController::class,
                        'action'     => 'edit',
                    ],
                ],
            ],
            'traslado-delete' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/recate/delete[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\TrasladosController::class,
                        'action'     => 'delete',
                    ],
                ],
            ],
            'traslado-detalle' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/detalle[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\TrasladosController::class,
                        'action'     => 'detalle',
                    ],
                ],
            ],
            'traslado-pdf' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/rpttraslado[/:action]',
                    'defaults' => [
                        'controller' => Controller\TrasladosController::class,
                        'action'     => 'pdf',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\PacientesController::class => Controller\Factory\PacientesControllerFactory::class,
            Controller\TrasladosController::class => Controller\Factory\TrasladosControllerFactory::class,
        ],
    ],
    'view_manager' => [
        'template_map' => [
            'pacientes'                 => __DIR__ . '/../view/pacientes/index.phtml',
            'trasladopdf'               => __DIR__ . '/../view/traslado/pdf.phtml',
        ],
        'template_path_stack' => [
            'pacientes' => __DIR__ . '/../view',
        ],
    ],
];
