<?php

declare(strict_types=1);

namespace Expedientes;

use Expedientes\Model\Table\ExpedientesTable;
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
                ExpedientesTable::class => function($sm) {
    				$dbAdapter = $sm->get(Adapter::class);
    				return new ExpedientesTable($dbAdapter);
                },
            ]
        ];
        
    }
}
