<?php

declare(strict_types=1);

namespace Traslados;

use Traslados\Model\Table\TrasladosTable;
use Laminas\Db\Adapter\Adapter;



class Module
{
    public function getConfig(): array
    {
        /** @var array $config */
        $config = include __DIR__ . '/../config/module.config.php';
        return $config;
    }

    public function getServiceConfig()
    {
        return [
            'factories' => [
                TrasladosTable::class => function($sm) {
    				$dbAdapter = $sm->get(Adapter::class);
    				return new TrasladosTable($dbAdapter);
                },
            ]
        ];
        
    }
}
