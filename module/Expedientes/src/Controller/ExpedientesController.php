<?php

declare(strict_types=1);

namespace Expedientes\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

use Laminas\Db\Adapter\Adapter;
use Expedientes\Model\Table\ExpedientesTable;
use Laminas\View\Renderer\RendererInterface;
use Expedientes\Form\Expedientes\ExpedientesForm;
use Laminas\View\Model\JsonModel;

class ExpedientesController extends AbstractActionController
{
    private $adapter;
    private $expedientesTable;
    protected $tcpdf;
    /**
     * @var RendererInterface
     */
    protected $renderer;

    public function __construct(Adapter $adapter, ExpedientesTable $expedientesTable, $tspdf, $renderer)
    {
        $this->adapter = $adapter;
        $this->expedientesTable = $expedientesTable;
        $this->tcpdf = $tspdf;
        $this->renderer = $renderer;
    }

    public function indexAction()
    {
        $obj = $this->expedientesTable->listarTodosExpedientes();
        $page = (int) $this->params()->fromQuery('page', 1); # sorry i forgot this line..
        $page = ($page < 1) ? 1 : $page;
        return new ViewModel(['expedientes' => $obj]);
        //return new ViewModel();*/
    }

    public function listexpedienteAction()
    {
        //$obj = $this->expedientesTable->listarNombresExpedientes();
        //var_dump($obj);       
        //return new ViewModel(['expedientes' => $obj]);
        //return $this->getResponse()->setContent(json_encode(['obj' => $obj,'success' => true]));
        $result = $this->expedientesTable->fetchAll();
        //return new JsonModel($result);
        return $this->getResponse()->setContent(json_encode(['obj' => $result]));
        //return new JsonModel($result);
       
    }

    public function openexpAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        //print_r('id' . $id);
        $objExpedientes = $this->expedientesTable->abrirExpediente($id);
        $formExpedientes = new ExpedientesForm();
        $view = new ViewModel();
        $view->setTemplate('expedientes/openexp')->setVariables([
            'numExpediente'     => $objExpedientes['numeroExpediente'],
            'paciente'          => $objExpedientes['nombreCompleto'],
            'nombreCompletoF'   => $objExpedientes['nombreCompletoF'],
            'fechaNac'          => $objExpedientes['fechaNac'],
            'form'              => $formExpedientes,
            'idExpediente'      => $id,
        ]);

        return $view;
    }
    public function guardarAction()
    {
        $formExpedientes = new ExpedientesForm();
        $request = $this->getRequest();
        if ($request->isPost()) {
            $formData = $request->getPost()->toArray();
            $id = $formData['idExpedientes'];
            $costo = $formData['costo'];
            $this->expedientesTable->guardarExpediente($id, $costo);
            $this->flashMessenger()->addSuccessMessage('Los datos se han Guardado con Exito');
            return $this->redirect()->toRoute('expedientes');
        }
    }
    public function rptconsentimienoAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        $objExpedientes = $this->expedientesTable->abrirExpediente($id);
        $view = new ViewModel();
        $renderer = $this->renderer;
        $view->setTemplate('layout/rptExpediente')->setVariables(array(
            'numExpediente'     => $objExpedientes['numeroExpediente'],
            'paciente'          => $objExpedientes['nombreCompleto'],
            'nombreCompletoF'   => $objExpedientes['nombreCompletoF'],
            'fechaNac'          => $objExpedientes['fechaNac'],
        ));
        $html = $renderer->render($view);
        $pdf = $this->tcpdf;
        $pdf->SetFont('arialnarrow', '', 10, '', false);
        $pdf->AddPage();
        $pdf->writeHTML($html, true, false, true, false, '');
        $pdf->Output();
    }
}
