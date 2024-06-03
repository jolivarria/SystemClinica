<?php

declare(strict_types=1);

namespace Citas\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

use Laminas\Db\Adapter\Adapter;
use Citas\Model\Table\CitasTable;
use Laminas\View\Renderer\RendererInterface;
use Pacientes\Model\Table\IngresoTable;
use Expedientes\Model\Table\ExpedientesTable;
use Citas\Form\Citas\CitasForm;

class CitasController extends AbstractActionController
{
    private $adapter;
    private $ingresoTable;
    private $expedientesTable;
    private $citasTable;
    protected $tcpdf;
    /**
     * @var RendererInterface
     */
    protected $renderer;

    public function __construct(Adapter $adapter, IngresoTable $ingresoTable, ExpedientesTable $expedientesTable, CitasTable $citasTable, $tspdf, $renderer)
    {
        $this->adapter          = $adapter;
        $this->ingresoTable     = $ingresoTable;
        $this->expedientesTable = $expedientesTable;
        $this->citasTable       = $citasTable;
        $this->tcpdf            = $tspdf;
        $this->renderer         = $renderer;
    }

    public function indexAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        $obj = $this->citasTable->listarTodos($id);
        $objPaciente = $this->ingresoTable->buscarPaciente($id);
        $page = (int) $this->params()->fromQuery('page', 1); # sorry i forgot this line..
        $page = ($page < 1) ? 1 : $page;
        return new ViewModel(['citas' => $obj, 'id' => $id,'paciente'=>$objPaciente]);
        //return new ViewModel();*/
    }

    public function mostarcitasAction()
    {
        $obj = $this->citasTable->listAll();
        $page = (int) $this->params()->fromQuery('page', 1); # sorry i forgot this line..
        $page = ($page < 1) ? 1 : $page;
        return new ViewModel(['citas' => $obj]);
    }

    public function nuevoAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        //print_r($id);
        $objPaciente = $this->ingresoTable->buscarPaciente($id);
        $formCitas = new CitasForm();
        return new ViewModel([
            'form'              => $formCitas,
            'paciente'          => $objPaciente,
            'idExpediente'      => $id,
        ]);
    }
    public function guardarAction()
    {
        $formCitas = new CitasForm();
        $request = $this->getRequest();
        if ($request->isPost()) {
            $formData = $request->getPost()->toArray();            
            $input =  $formData['fecha'];
            $date = strtotime($input); 
            $fecha = date('Y/m/d H:i:s', $date); 
           
            $timeNow = date('Y-m-d H:i:s');
            $data = [
                'idPacientes'    => $formData['idPacientes'],
                'idExpedientes'  => $formData['idExpedientes'],
                'motivo'         => $formData['motivo'],
                'observaciones'  => $formData['observaciones'],
                'ubicacion'      => $formData['ubicacion'],
                'estado'         => 1,
                'fecha'          => $fecha,
                'fechaCaptura'   => $timeNow
            ];
            $this->citasTable->guardar($data);
            $this->flashMessenger()->addSuccessMessage('Los datos se han Guardado con Exito');
            return $this->redirect()->toRoute('citas',['action' => 'index', 'id' =>$data['idPacientes'] ]);
            //('ingreso-eliminar', ['action' => 'eliminar', 'id' => $ingreso->getIdIngresos()])
        }
    }
    public function editarAction()
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
    public function eliminarAction()
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
