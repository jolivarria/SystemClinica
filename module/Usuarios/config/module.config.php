<?php

declare(strict_types=1);

namespace Usuarios;

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
                        'controller' => Controller\UsuariosController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'login' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/login[/:action]',
                    'defaults' => [
                        'controller' => Controller\UsuariosController::class,
                        'action'     => 'login',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\UsuariosController::class => InvokableFactory::class,
        ],
    ],
    'view_manager' => [
        'template_map' => [
            'usuarios'                 => __DIR__ . '/../view/usuarios/index.phtml',
            'usuarios/usuarios/login'                 => __DIR__ . '/../view/usuarios/usuarios/login.phtml',


            
        ],
        'template_path_stack' => [
            'usuarios' => __DIR__ . '/../view',
        ],
    ],
];
