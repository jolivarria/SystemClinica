<?php

declare(strict_types=1);

namespace Producto;

use Laminas\Router\Http\Segment;
use Laminas\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [            
            'producto' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/producto[/:action]',
                    'defaults' => [
                        'controller' => Controller\ProductoController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'producto-nuevo' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/producto/nuevo[/:action]',
                    'defaults' => [
                        'controller' => Controller\ProductoController::class,
                        'action'     => 'nuevo',
                    ],
                ],
            ],
            'producto-editar' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/producto/editar[/:action[/:id]]',
                    'defaults' => [
                        'controller' => Controller\ProductoController::class,
                        'action'     => 'editar',
                    ],
                ],
            ],
            'borrar' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/producto/borrar[/:action[/:id]]',
                    'defaults' => [
                        'controller' => Controller\ProductoController::class,
                        'action'     => 'borrar',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            //Controller\ProductoController::class => InvokableFactory::class,
            Controller\ProductoController::class => Controller\Factory\ProductoControllerFactory::class,
        ],
    ],
    'view_manager' => [
        'template_map' => [
            'producto/producto'                 => __DIR__ . '/../view/producto/producto/index.phtml',
        ],
        'template_path_stack' => [
            'producto' => __DIR__ . '/../view',
        ],
    ],
];
