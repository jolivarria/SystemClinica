<?php

declare(strict_types=1);

namespace Pago;

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
}
