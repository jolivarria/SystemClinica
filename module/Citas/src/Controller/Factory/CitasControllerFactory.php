<?php

declare(strict_types=1);

namespace Citas\Controller\Factory;

use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;

use Laminas\Db\Adapter\Adapter;
use Laminas\View\Renderer\RendererInterface;
use Pacientes\Model\Table\IngresoTable;
use Citas\Controller\CitasController;
use Citas\Model\Table\CitasTable;
use Expedientes\Model\Table\ExpedientesTable;

class CitasControllerFactory implements FactoryInterface
{
	public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
	{
		$tcpdf = $container->get(\TCPDF::class);
        $renderer = $container->get(RendererInterface::class);
		return new CitasController(
			$container->get(Adapter::class),
			$container->get(IngresoTable::class),
			$container->get(ExpedientesTable::class),
			$container->get(CitasTable::class),
			$tcpdf,
			$renderer,
		);
	}
}
