<?php

declare(strict_types=1);

namespace Venta\Controller\Factory;

use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;

use Laminas\Db\Adapter\Adapter;
use Laminas\View\Renderer\RendererInterface;
use Venta\Model\Table\VentaTable;
use Producto\Model\Table\ProductoTable;
use Venta\Controller\VentaController;


class VentaControllerFactory implements FactoryInterface
{
	public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
	{
		$tcpdf = $container->get(\TCPDF::class);
        $renderer = $container->get(RendererInterface::class);
		return new VentaController(
			$container->get(Adapter::class),
			$container->get(VentaTable::class),
			$container->get(ProductoTable::class),
			$tcpdf,
			$renderer,
		);
	}
}
