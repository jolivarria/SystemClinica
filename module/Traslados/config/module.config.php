<?php

declare(strict_types=1);

namespace Traslados;


use Laminas\Router\Http\Segment;
//use Laminas\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'traslados' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/traslados[/:action]',
                    'defaults' => [
                        'controller' => Controller\TrasladosController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\TrasladosController::class => Controller\Factory\TrasladosControllerFactory::class,
        ],
    ],
    'view_manager' => [
        'template_map' => [
            'traslados'                 => __DIR__ . '/../view/traslados/index.phtml',
           


            
        ],
        'template_path_stack' => [
            'traslados' => __DIR__ . '/../view',
        ],
    ],
];
