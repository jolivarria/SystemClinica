<?php

declare(strict_types=1);

namespace Pacientes\Controller\Factory;

use Interop\Container\ContainerInterface;
use Laminas\Db\Adapter\Adapter;
use Laminas\ServiceManager\Factory\FactoryInterface;

use Pacientes\Controller\PacientesController;
use Pacientes\Model\Table\PacienteTable;
use Pacientes\Model\Table\IngresoTable;
use Familiares\Model\Table\FamiliaresTable;
use Expedientes\Model\Table\ExpedientesTable;

class PacientesControllerFactory implements FactoryInterface
{
	public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
	{
		return new PacientesController(
			$container->get(Adapter::class),
			$container->get(PacienteTable::class),
			$container->get(IngresoTable::class),
			$container->get(FamiliaresTable::class),
			$container->get(ExpedientesTable::class),
		);
	}
}
