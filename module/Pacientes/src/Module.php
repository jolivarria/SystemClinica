<?php

declare(strict_types=1);

namespace Pacientes;

use Laminas\Db\Adapter\Adapter;
use Pacientes\Model\Table\PacienteTable;
use Pacientes\Model\Table\IngresoTable;
use Pacientes\Model\Table\TrasladoTable;

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
                PacienteTable::class => function($sm) {
    				$dbAdapter = $sm->get(Adapter::class);
    				return new PacienteTable($dbAdapter);
                },
                IngresoTable::class => function($sm) {
    				$dbAdapter = $sm->get(Adapter::class);
    				return new IngresoTable($dbAdapter);
                },
                TrasladoTable::class => function($sm) {
    				$dbAdapter = $sm->get(Adapter::class);
    				return new TrasladoTable($dbAdapter);
                },
            ]
        ];
        
    }
}
