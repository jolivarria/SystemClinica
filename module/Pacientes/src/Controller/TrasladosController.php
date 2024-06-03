<?php

declare(strict_types=1);

namespace Pacientes\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

use Laminas\Db\Adapter\Adapter;
use Pacientes\Model\Table\TrasladoTable;
use Laminas\Paginator\Paginator;
use RuntimeException;
use Pacientes\Form\Traslado\TrasladoForm;
use Laminas\View\Renderer\RendererInterface;

class TrasladosController extends AbstractActionController
{
    private $adapter;
    private $trasladoTable;

    /**
     * @var \TCPDF
     */
    protected $tcpdf;

    /**
     * @var RendererInterface
     */
    protected $renderer;

    public function __construct(Adapter $adapter, TrasladoTable $trasladoTable, $tspdf, $renderer)
    {
        $this->adapter = $adapter;
        $this->trasladoTable = $trasladoTable;
        $this->tcpdf = $tspdf;
        $this->renderer = $renderer;
    }

    public function indexAction()
    {
    }

    public function trasladoAction()
    {
        $traslado = $this->trasladoTable->listarTodosTraslados();
        $page = (int) $this->params()->fromQuery('page', 1); # sorry i forgot this line..
        $page = ($page < 1) ? 1 : $page;
        return new ViewModel(['traslados' => $traslado]);
    }
    public function newAction()
    {
        $formTras = new TrasladoForm();
        $request = $this->getRequest();

        if ($request->isPost()) {
            $formData = $request->getPost()->toArray();
            $formTras->setInputFilter($this->trasladoTable->getTrasladoFormFilter());
            $formTras->setData($formData);
            if ($formTras->isValid()) {

                try { 
                    $data = $formTras->getData();
                    print_r($data);
                    $this->trasladoTable->guardarTraslados($data);
                    $this->flashMessenger()->addSuccessMessage('Los datos del traslado se han guardado con Exito');
                    return $this->redirect()->toRoute('traslado-rescate');
                } catch (RuntimeException $exception) {
                    $this->flashMessenger()->addErrorMessage($exception->getMessage());
                    return $this->redirect()->refresh(); # refresh this page to view errors
                }
            }
        }
        $view = new ViewModel(['form' => $formTras]);
        //$view->setTerminal(true);

        return  $view;
    }
    
    public function deleteAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);

        if (0 === $id) 
        {
            return $this->redirect()->toRoute('traslado-new', ['action' => 'new']);
        }
         // Retrieve the album with the specified id. Doing so raises
        // an exception if the album is not found, which should result
        // in redirecting to the landing page.
        try {
            $traslado =  $this->trasladoTable->borrarTraslado($id);
            $this->flashMessenger()->addSuccessMessage('El registro se ha borrado Exito');
            return $this->redirect()->toRoute('traslado-rescate');
        } catch (\Exception $e) {
            return $this->redirect()->toRoute('traslado-new', ['action' => 'new']);
        }
    }

    /**
     * Editar traslado 
     */
    public function editAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);

        if (0 === $id) {
            return $this->redirect()->toRoute('traslado-new', ['action' => 'new']);
        }

        // Retrieve the album with the specified id. Doing so raises
        // an exception if the album is not found, which should result
        // in redirecting to the landing page.
        try {
            $traslado =  $this->trasladoTable->editarTraslado($id);
        } catch (\Exception $e) {
            return $this->redirect()->toRoute('traslado-new', ['action' => 'new']);
        }

        $formTras = new TrasladoForm();
        $request = $this->getRequest();

        $formTras->bind($traslado);

        $formTras->get('btnGuardar')->setAttribute('value', 'Editar');

        if ($request->isPost()) {
            $formData = $request->getPost()->toArray();
            $formTras->setInputFilter($this->trasladoTable->getTrasladoFormFilter());
            $formTras->setData($formData);
            print_r($formTras);
            if ($formTras->isValid()) {
                $id = (int) $this->params()->fromRoute('id', 0);
                if ($id === 0) {
                    try {
                        $data = $formTras->getData();
                        $this->trasladoTable->guardarTraslados($data);
                        $this->flashMessenger()->addSuccessMessage('Los datos del traslado se han guardado con Exito');
                        return $this->redirect()->toRoute('traslado-rescate');
                    } catch (RuntimeException $exception) {
                        $this->flashMessenger()->addErrorMessage($exception->getMessage());
                        return $this->redirect()->refresh(); # refresh this page to view errors
                    }
                } else {
                    $this->flashMessenger()->addSuccessMessage('Modificaras este traslado..');
                }
            }
        }
        $view = new ViewModel(['form' => $formTras]);
        //$view->setTerminal(true);

        return  $view;







        /*$request = $this->getRequest();
        $viewData = ['id' => $id, 'form' => $form];

        if (! $request->isPost()) {
            return $viewData;
        }

        $form->setInputFilter($album->getInputFilter());
        $form->setData($request->getPost());

        if (! $form->isValid()) {
            return $viewData;
        }

        try {
            $this->table->saveAlbum($album);
        } catch (\Exception $e) {
        }

        // Redirect to album list
        return $this->redirect()->toRoute('album', ['action' => 'index']);*/
    }
    public function detalleAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        if (0 === $id) {
            return $this->redirect()->toRoute('traslado-rescate', ['action' => 'traslado']);
        }
        $traslado = $this->trasladoTable->detalleTraslado($id);
        return new ViewModel(['traslados' => $traslado]);
    }

    public function pdfAction()
    {
        $view = new ViewModel();

        $renderer = $this->renderer;
        $view->setTemplate('layout/pdf')->setVariables(array('projects' => 'hola', 'view' => 'pdf'));

        $html = $renderer->render($view);

        $pdf = $this->tcpdf;


        $pdf->SetFont('arialnarrow', '', 12, '', false);
        $pdf->AddPage();
        $pdf->writeHTML($html, true, false, true, false, '');

        $pdf->Output();
    }
}
