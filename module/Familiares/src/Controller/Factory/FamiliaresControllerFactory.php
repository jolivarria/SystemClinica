<?php

declare(strict_types=1);

namespace Familiares\Controller\Factory;

use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;

use Laminas\Db\Adapter\Adapter;
use Familiares\Controller\FamiliaresController;
use Familiares\Model\Table\FamiliaresTable;

class FamiliaresControllerFactory implements FactoryInterface
{
	public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
	{
		return new FamiliaresController(
			$container->get(Adapter::class),
			$container->get(FamiliaresTable::class),
		);
	}
}
