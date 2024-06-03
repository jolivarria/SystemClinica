<?php

declare(strict_types=1);

namespace Familiares;

use Familiares\Model\Table\FamiliaresTable;
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
                FamiliaresTable::class => function($sm) {
    				$dbAdapter = $sm->get(Adapter::class);
    				return new FamiliaresTable($dbAdapter);
                },
            ]
        ];
        
    }
}
