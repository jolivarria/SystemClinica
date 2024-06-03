<?php

declare(strict_types=1);

namespace Pago;

use Laminas\Router\Http\Literal;
use Laminas\Router\Http\Segment;
use Laminas\ServiceManager\Factory\InvokableFactory;
use User\Controller\LoginController; 

return [
    'router' => [
        'routes' => [
            'pago' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/pago[/:action]',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => InvokableFactory::class,
        ],
    ],
    'view_manager' => [

        'template_map' => [
            'pago/index'                 => __DIR__ . '/../view/pago/index.phtml',
           
        ],
        'template_path_stack' => [
            'pago' => __DIR__ . '/../view',
        ],
    ],
];
