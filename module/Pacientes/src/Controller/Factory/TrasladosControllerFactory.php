<?php

declare(strict_types=1);

namespace Pacientes\Controller\Factory;

use Interop\Container\ContainerInterface;
use Laminas\Db\Adapter\Adapter;
use Laminas\ServiceManager\Factory\FactoryInterface;

use Pacientes\Controller\TrasladosController;
use Laminas\View\Renderer\RendererInterface;
use Pacientes\Model\Table\TrasladoTable;

class TrasladosControllerFactory implements FactoryInterface
{
	public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
	{
		$tcpdf = $container->get(\TCPDF::class);
        $renderer = $container->get(RendererInterface::class);
		return new TrasladosController(
			$container->get(Adapter::class),
			$container->get(TrasladoTable::class),
			$tcpdf,
			$renderer
		);
	}
}
