<?php

declare(strict_types=1);

namespace Producto;

use Producto\Model\Table\ProductoTable;
use Laminas\Db\Adapter\Adapter;
class Module
{
    public function getConfig(): array
    {
        /** @var array $config */
        $config = include __DIR__ . '/../config/module.config.php';
        return $config;
    }
    public function onBootstrap($event)
    {
       
    }
    
    public function getServiceConfig()
    {
        return [
            'factories' => [
                ProductoTable::class => function($sm) {
    				$dbAdapter = $sm->get(Adapter::class);
    				return new ProductoTable($dbAdapter);
                },
            ]
        ];
        
    }
}
