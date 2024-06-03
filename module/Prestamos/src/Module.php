<?php

declare(strict_types=1);

namespace Prestamos;

use Prestamos\Model\Table\PrestamosTable;
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
                PrestamosTable::class => function($sm) {
    				$dbAdapter = $sm->get(Adapter::class);
    				return new PrestamosTable($dbAdapter);
                },
            ]
        ];
        
    }
}
