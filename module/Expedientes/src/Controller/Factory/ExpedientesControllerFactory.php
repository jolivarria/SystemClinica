<?php

declare(strict_types=1);

namespace Expedientes\Controller\Factory;

use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;

use Laminas\Db\Adapter\Adapter;
use Laminas\View\Renderer\RendererInterface;
use Expedientes\Controller\ExpedientesController;
use Expedientes\Model\Table\ExpedientesTable;

class ExpedientesControllerFactory implements FactoryInterface
{
	public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
	{
		$tcpdf = $container->get(\TCPDF::class);
        $renderer = $container->get(RendererInterface::class);
		return new ExpedientesController(
			$container->get(Adapter::class),
			$container->get(ExpedientesTable::class),
			$tcpdf,
			$renderer,
		);
	}
}
