<?php

declare(strict_types=1);

namespace Producto\Controller\Factory;

use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;

use Laminas\Db\Adapter\Adapter;
use Laminas\View\Renderer\RendererInterface;
use Producto\Model\Table\ProductoTable;
use Producto\Controller\ProductoController;


class ProductoControllerFactory implements FactoryInterface
{
	public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
	{
		$tcpdf = $container->get(\TCPDF::class);
        $renderer = $container->get(RendererInterface::class);
		return new ProductoController(
			$container->get(Adapter::class),
			$container->get(ProductoTable::class),
			$tcpdf,
			$renderer,
		);
	}
}
