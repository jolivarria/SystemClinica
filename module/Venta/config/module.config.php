<?php

declare(strict_types=1);

namespace Venta;

use Laminas\Router\Http\Segment;
use Laminas\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [            
            'ventas' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/ventas[/:action]',
                    'defaults' => [
                        'controller' => Controller\VentaController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'nuevo' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/venta/nuevo[/:action]',
                    'defaults' => [
                        'controller' => Controller\VentaController::class,
                        'action'     => 'nuevo',
                    ],
                ],
            ],
            'editar' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/venta/editar[/:action[/:id]]',
                    'defaults' => [
                        'controller' => Controller\VentaController::class,
                        'action'     => 'editar',
                    ],
                ],
            ],
            'borrar' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/venta/borrar[/:action[/:id]]',
                    'defaults' => [
                        'controller' => Controller\VentaController::class,
                        'action'     => 'borrar',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            //Controller\ProductoController::class => InvokableFactory::class,
            Controller\VentaController::class => Controller\Factory\VentaControllerFactory::class,
        ],
    ],
    'view_manager' => [
        'template_map' => [
            'venta/venta'                 => __DIR__ . '/../view/venta/venta/index.phtml',
        ],
        'template_path_stack' => [
            'venta' => __DIR__ . '/../view',
        ],
    ],
];
