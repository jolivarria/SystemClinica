<?php

declare(strict_types=1);

namespace Familiares;


use Laminas\Router\Http\Segment;
//use Laminas\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'familiares' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/familiares[/:action]',
                    'defaults' => [
                        'controller' => Controller\FamiliaresController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'nuevo-familiar' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/addfamiliar[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\FamiliaresController::class,
                        'action'     => 'addfamiliar',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\FamiliaresController::class => Controller\Factory\FamiliaresControllerFactory::class,
        ],
    ],
    'view_manager' => [
        'template_map' => [
            'familiares'                 => __DIR__ . '/../view/familiares/index.phtml',
           


            
        ],
        'template_path_stack' => [
            'familiares' => __DIR__ . '/../view',
        ],
    ],
];
