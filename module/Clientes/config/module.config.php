<?php

declare(strict_types=1);

namespace Clientes;

use Laminas\Router\Http\Literal;
use Laminas\Router\Http\Segment;
use Laminas\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'home' => [
                'type'    => Literal::class,
                'options' => [
                    'route'    => '/',
                    'defaults' => [
                        'controller' => Controller\ClientesController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'clientes' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/clientes[/:action]',
                    'defaults' => [
                        'controller' => Controller\ClientesController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\ClientesController::class => InvokableFactory::class,
        ],
    ],
    'view_manager' => [
        'template_map' => [
            'clientes'                 => __DIR__ . '/../view/clientes/index.phtml',
           


            
        ],
        'template_path_stack' => [
            'clientes' => __DIR__ . '/../view',
        ],
    ],
];
