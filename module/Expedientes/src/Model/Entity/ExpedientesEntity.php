<?php

declare(strict_types=1);

namespace Expedientes\Model\Entity;

class ExpedientesEntity
{
    protected $idExpedientes;       //int(11) AI PK 
    protected $idIngresos;          //int(11) PK 
    protected $Pacientes_idPacientes; //int(11) 
    protected $nombreCompleto;          //varchar(45)
    protected $serviciosMedicos;    //
    protected $tipoServicioMedico; //
    protected $numeroExpediente;    //varchar(45) 
    protected $estado;              //estado
    protected $costo;               //double
    protected $tipoIngreso;         //enum('Voluntario','Involuntario','O
    protected $fechaCreacion;        //timestamp
    protected $fechaExpediente;
    

   

    /**
     * Get the value of idExpedientes
     */
    public function getIdExpedientes()
    {
        return $this->idExpedientes;
    }

    /**
     * Set the value of idExpedientes
     */
    public function setIdExpedientes($idExpedientes): self
    {
        $this->idExpedientes = $idExpedientes;

        return $this;
    }

    /**
     * Get the value of idIngresos
     */
    public function getIdIngresos()
    {
        return $this->idIngresos;
    }

    /**
     * Set the value of idIngresos
     */
    public function setIdIngresos($idIngresos): self
    {
        $this->idIngresos = $idIngresos;

        return $this;
    }

    /**
     * Get the value of Pacientes_idPacientes
     */
    public function getPacientesIdPacientes()
    {
        return $this->Pacientes_idPacientes;
    }

    /**
     * Set the value of Pacientes_idPacientes
     */
    public function setPacientesIdPacientes($Pacientes_idPacientes): self
    {
        $this->Pacientes_idPacientes = $Pacientes_idPacientes;

        return $this;
    }

    /**
     * Get the value of numeroExpediente
     */
    public function getNumeroExpediente()
    {
        return $this->numeroExpediente;
    }

    /**
     * Set the value of numeroExpediente
     */
    public function setNumeroExpediente($numeroExpediente): self
    {
        $this->numeroExpediente = $numeroExpediente;

        return $this;
    }

    /**
     * Get the value of costo
     */
    public function getCosto()
    {
        return $this->costo;
    }

    /**
     * Set the value of costo
     */
    public function setCosto($costo): self
    {
        $this->costo = $costo;

        return $this;
    }

    /**
     * Get the value of nombreCompleto
     */
    public function getNombreCompleto()
    {
        return $this->nombreCompleto;
    }

    /**
     * Set the value of nombreCompleto
     */
    public function setNombreCompleto($nombreCompleto): self
    {
        $this->nombreCompleto = $nombreCompleto;

        return $this;
    }

    /**
     * Get the value of tipoIngreso
     */
    public function getTipoIngreso()
    {
        return $this->tipoIngreso;
    }

    /**
     * Set the value of tipoIngreso
     */
    public function setTipoIngreso($tipoIngreso): self
    {
        $this->tipoIngreso = $tipoIngreso;

        return $this;
    }

    /**
     * Get the value of fechaCreacion
     */
    public function getFechaCreacion()
    {
        return $this->fechaCreacion;
    }

    /**
     * Set the value of fechaCreacion
     */
    public function setFechaCreacion($fechaCreacion): self
    {
        $this->fechaCreacion = $fechaCreacion;

        return $this;
    }

    /**
     * Get the value of estado
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set the value of estado
     */
    public function setEstado($estado): self
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get the value of fechaExpediente
     */
    public function getFechaExpediente()
    {
        return $this->fechaExpediente;
    }


    /**
     * Set the value of fechaExpediente
     */
    public function setFechaExpediente($fechaExpediente): self
    {
        $this->fechaExpediente = $fechaExpediente;

        return $this;
    }

    /**
     * Get the value of serviciosMedicos
     */
    public function getServiciosMedicos()
    {
        return $this->serviciosMedicos;
    }

    /**
     * Set the value of serviciosMedicos
     */
    public function setServiciosMedicos($serviciosMedicos): self
    {
        $this->serviciosMedicos = $serviciosMedicos;

        return $this;
    }

    /**
     * Get the value of tipoServicioMedico
     */
    public function getTipoServicioMedico()
    {
        return $this->tipoServicioMedico;
    }

    /**
     * Set the value of tipoServicioMedico
     */
    public function setTipoServicioMedico($tipoServicioMedico): self
    {
        $this->tipoServicioMedico = $tipoServicioMedico;

        return $this;
    }

    public function exchangeArray(array $data)
    {
        $this->idExpedientes            = !empty($data['idExpedientes']) ? $data['idExpedientes'] : null;
        $this->idIngresos               = !empty($data['idIngresos']) ? $data['idIngresos'] : null;
        $this->Pacientes_idPacientes    = !empty($data['Pacientes_idPacientes']) ? $data['Pacientes_idPacientes'] : null;
        $this->nombreCompleto           = !empty($data['nombreCompleto']) ? $data['nombreCompleto'] : null;
        $this->serviciosMedicos         = !empty($data['serviciosMedicos']) ? $data['serviciosMedicos'] : null;
        $this->tipoServicioMedico       = !empty($data['tipoServicioMedico']) ? $data['tipoServicioMedico'] : null;     
        $this->numeroExpediente         = !empty($data['numeroExpediente']) ? $data['numeroExpediente'] : null;  
        $this->estado                   = !empty($data['estado']) ? $data['estado'] : null;  
        $this->costo                    = !empty($data['costo']) ? $data['costo'] : null;  
        $this->tipoIngreso              = !empty($data['tipoIngreso']) ? $data['tipoIngreso'] : null;  
        $this->fechaCreacion            = !empty($data['fechaCreacion']) ? $data['fechaCreacion'] : null;  
        $this->fechaExpediente          = !empty($data['fechaExpediente']) ? $data['fechaExpediente'] : null;  
        
    }
    public function getArrayCopy()
    {
        return get_object_vars($this);
    }
}