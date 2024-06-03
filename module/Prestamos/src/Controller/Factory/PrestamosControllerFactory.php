<?php

declare(strict_types=1);

namespace Prestamos\Controller\Factory;

use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;

use Laminas\Db\Adapter\Adapter;
use Laminas\View\Renderer\RendererInterface;
use Pacientes\Model\Table\IngresoTable;
use Prestamos\Controller\PrestamosController;
use Prestamos\Model\Table\PrestamosTable;
use Expedientes\Model\Table\ExpedientesTable;

class PrestamosControllerFactory implements FactoryInterface
{
	public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
	{
		$tcpdf = $container->get(\TCPDF::class);
        $renderer = $container->get(RendererInterface::class);
		return new PrestamosController(
			$container->get(Adapter::class),
			$container->get(IngresoTable::class),
			$container->get(ExpedientesTable::class),
			$container->get(PrestamosTable::class),
			$tcpdf,
			$renderer,
		);
	}
}
