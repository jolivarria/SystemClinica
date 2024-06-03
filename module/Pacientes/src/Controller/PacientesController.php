<?php

declare(strict_types=1);

namespace Pacientes\Controller;

use Exception;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

use Laminas\Db\Adapter\Adapter;
use Pacientes\Model\Table\PacienteTable;
use Pacientes\Model\Table\IngresoTable;
use RuntimeException;
use Pacientes\Form\Paciente\IngresoForm;

use Familiares\Model\Table\FamiliaresTable;
use Expedientes\Model\Table\ExpedientesTable;

class PacientesController extends AbstractActionController
{
    private $adapter;
    private $pacienteTable;
    private $ingresoTable;
    private $familiaresTable;
    private $expedientesTable;


    public function __construct(
        Adapter $adapter,
        PacienteTable $pacienteTable,
        IngresoTable $ingresoTable,
        FamiliaresTable $familiaresTable,
        ExpedientesTable $expedientesTable )
    {
        $this->adapter = $adapter;
        $this->pacienteTable = $pacienteTable;
        $this->ingresoTable = $ingresoTable;
        $this->familiaresTable = $familiaresTable;
        $this->expedientesTable = $expedientesTable;

    }
    
    public function indexAction()
    {
        $pacientes = $this->pacienteTable->listarTodosPacientes();
		$page = (int) $this->params()->fromQuery('page', 1); # sorry i forgot this line..
		$page = ($page < 1) ? 1 : $page;	
		return new ViewModel(['pacientes' => $pacientes]);
    }

    public function ingresosAction()
    {
        $ingresos = $this->ingresoTable->listarTodosIngresos();
		$page = (int) $this->params()->fromQuery('page', 1); # sorry i forgot this line..
		$page = ($page < 1) ? 1 : $page;	
		return new ViewModel(['ingresos' => $ingresos]);
    }

    public function pacientesAction()
    {

    }
    
    public function altaAction()
    {
        $formIngreso = new IngresoForm();
        $request = $this->getRequest();

        if($request->isPost()){
            $formData = $request->getPost()->toArray();
            $formIngreso->setData($formData);
            if ($formIngreso->isValid()){
                try { 
                    $data = $formIngreso->getData();
                    #guarda a los pacientes y regresa el ultimo id que fue insertado 
                    #del paciente para ser insertado en la tabla de ingreso
                    $idPaciente = $this->pacienteTable->guardar($data);
                    $timeNow = date('Y-m-d H:i:s');
                    
                    #separacion del Request del formulario 
                    $dataIngresos = [
                        'idPacientes'           => $idPaciente['id'],
                        'idsolicitudRescate'    => 0,
                        'reingreso'             =>'No',
                        'tipoIngreso'           =>$data['tipoIngreso'],
                        'referencia'            =>$data['referencia'],
                        'acude'                 =>$data['acude'],
                        'fechaIngreso'          =>$timeNow
                    ];
                    #se guardarn los datos en ingresos 
                    $idIngr = $this->ingresoTable->guardar($dataIngresos);
                    //print_r('idIngresos:'.$idIngr);
                    $fecha_actual = date("Y/m/d");
                      $dataExpedientes= [
                        'idIngresos'                => $idIngr['id'],
                        'Pacientes_idPacientes'     => $idPaciente['id'],
                        'numeroExpediente'          => '00'.$idPaciente['id'],
                        'costo'                     => 0,
                        'estado'                    => 1,
                        'desactivado'               => 1,
                        'fechaExpediente'           => $fecha_actual,
                        'fechaCreacion'             => $timeNow,
                    ];

                    $this->expedientesTable->guardar($dataExpedientes);

                    $dataFamiliares= [
                        'Pacientes_idPacientes'         => $idPaciente['id'],
                        'nombreCompletoF'                => $data['nombreCompletoF'],
                        'domicilio'                     => $data['domicilio'],
                        'colonia'                       => $data['colonia'],
                        'telefono'                      => $data['telefonoF'],
                        'celular'                       => $data['celular'],
                        'telefonoTrabajo'               => $data['telefonoTrabajoF'],
                    ];

                    $this->familiaresTable->guardar($dataFamiliares);
                   
                     

                    $this->flashMessenger()->addSuccessMessage('Los datos se han Guardado con Exito');
                    return $this->redirect()->toRoute('pacientes');
                } catch (RuntimeException $exception) {
                    $this->flashMessenger()->addErrorMessage($exception->getMessage());
                    return $this->redirect()->refresh(); # refresh this page to view errors
                }
            }
        }
        return new ViewModel(['form'=>$formIngreso]);
    }

    public function editarAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        return new ViewModel(['id' => $id]);
    }

    public function eliminarAction()
    {
        /**Borrado logico del sistema  */
        $id = (int) $this->params()->fromRoute('id', 0);
        if (! $id) {
            return $this->redirect()->toRoute('ingresos');
        }
        try{
        $this->ingresoTable->desactivarIngreso($id);
        $this->flashMessenger()->addSuccessMessage('Se desactivo el ingreso seleccionado...');
        return $this->redirect()->toRoute('ingresos');

        }catch (RuntimeException $exception) {
            $this->flashMessenger()->addErrorMessage($exception->getMessage());
            return $this->redirect()->refresh(); # refresh this page to view errors
        
        }
        
    }
}
