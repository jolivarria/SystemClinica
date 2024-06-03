<?php

declare(strict_types=1);

namespace Venta;

use Venta\Model\Table\VentaTable;
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
                VentaTable::class => function($sm) {
    				$dbAdapter = $sm->get(Adapter::class);
    				return new VentaTable($dbAdapter);
                },
            ]
        ];
        
    }
}
