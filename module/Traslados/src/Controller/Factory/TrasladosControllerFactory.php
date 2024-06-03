<?php

declare(strict_types=1);

namespace Traslados\Controller\Factory;

use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;

use Laminas\Db\Adapter\Adapter;
use Traslados\Controller\TrasladosController;
use Traslados\Model\Table\TrasladosTable;

class TrasladosControllerFactory implements FactoryInterface
{
	public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
	{
		return new TrasladosController(
			$container->get(Adapter::class),
			$container->get(TrasladosTable::class),
		);
	}
}
