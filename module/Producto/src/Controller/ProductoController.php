<?php

declare(strict_types=1);

namespace Producto\Controller;

use Error;
use Exception;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

use Laminas\Db\Adapter\Adapter;
use Laminas\View\Renderer\RendererInterface;
use Producto\Model\Table\ProductoTable;
use Producto\Form\ProductoForm;
use RuntimeException;


class ProductoController extends AbstractActionController
{
    private $adapter;
    private $productoTable;
    protected $tcpdf;
    public function __construct(Adapter $adapter, ProductoTable $productoTable, $tspdf, $renderer)
    {
        $this->adapter          = $adapter;
        $this->productoTable    = $productoTable;
        $this->tcpdf            = $tspdf;
        $this->renderer         = $renderer;
    }
    public function indexAction()
    {
        $objProductos = $this->productoTable->listAll();
        return new ViewModel(['productos' => $objProductos]);
        //return new ViewModel();
    }

    public function nuevoAction()
    {
        $formProducto = new ProductoForm();
        $request = $this->getRequest();

        if($request->isPost()){
            $formData = $request->getPost()->toArray();
            $formProducto->setData($formData);
            if ($formProducto->isValid()){
                try { 
                    $data = $formProducto->getData();
                    $dataProducto = [
                        'idproductos'       => $data['idproductos'],
                        'nombre'            => $data['nombre'],
                        'descripcion'       => $data['descripcion'],
                        'tipo'              => $data['tipo'],
                        'precio'            =>$data['precio']
                    ];                    
                    //var_dump('Variable :'.$dataProducto['nombre']);
                    //exit();
                    $this->productoTable->guardar($dataProducto);
                    $this->flashMessenger()->addSuccessMessage('El producto se han Guardado con Exito');
                    return $this->redirect()->toRoute('producto');
                }catch(RuntimeException $exception){
                    $this->flashMessenger()->addErrorMessage($exception->getMessage());
                }
            }
        }

        return new ViewModel([
            'form' => $formProducto,
        ]);
    }
    
    /**
     * Método para modificar los productos 
     */
    public function editarAction()
    {      
        $id = (int) $this->params()->fromRoute('id', 0);
        if (0 === $id) {
            return $this->redirect()->toRoute('producto', ['action' => 'index']);
        }
        try {
            $objProductos =  $this->productoTable->obtenerProducto($id);
        } catch (RuntimeException $e) {
            $this->flashMessenger()->addErrorMessage($e->getMessage());
        }

        $formProducto = new ProductoForm();
        $request = $this->getRequest();
        $formProducto->bind($objProductos);
        $formProducto->get('btnGuardar')->setAttribute('value', 'Editar');

        if($request->isPost()){
            $formData = $request->getPost()->toArray();
            $formProducto->setData($formData);
            if ($formProducto->isValid()){
                try { 
                    $data = $formProducto->getData();
                    $dataProducto = [
                        'idproductos'       => $data['idproductos'],
                        'nombre'            => $data['nombre'],
                        'descripcion'       => $data['descripcion'],
                        'tipo'              => $data['tipo'],
                        'precio'            =>$data['precio']
                    ];
                                
                    $this->productoTable->guardar($dataProducto);
                    $this->flashMessenger()->addSuccessMessage('El producto se han Guardado con Exito');
                    return $this->redirect()->toRoute('producto');
                }catch(RuntimeException $exception){
                    $this->flashMessenger()->addErrorMessage($exception->getMessage());
                }
            }
        }        
        return new ViewModel([
            'form' => $formProducto,
            //'productos' => $objProductos,
        ]);
    }
    
    /***
     * Método para borrar productos
     *  */    
    public function borrarAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        if (0 === $id) {
            return $this->redirect()->toRoute('producto', ['action' => 'index']);
        }
        $this->productoTable->eliminarProducto($id);
        $this->flashMessenger()->addSuccessMessage('El producto se borro con Exito....');
        return $this->redirect()->toRoute('producto');
    }

}
