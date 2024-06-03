<?php

declare(strict_types=1);

namespace Familiares\Model\Entity;

class FamiliaresEntity
{
    protected $idFamiliares;            //int(11) AI PK 
    protected $Pacientes_idPacientes;   //int(11) 
    protected $nombreCompleto;          //pacentes
    protected $nombreCompletoF;          //varchar(45) 
    protected $domicilio;               //varchar(45) 
    protected $colonia;                 //varchar(45) 
    protected $telefono;                //varchar(45) 
    protected $celular;                 //varchar(45) 
    protected $telefonoTrabajo;         //varchar(45)

    /**
     * Get the value of idFamiliares
     */
    public function getIdFamiliares()
    {
        return $this->idFamiliares;
    }

    /**
     * Set the value of idFamiliares
     */
    public function setIdFamiliares($idFamiliares): self
    {
        $this->idFamiliares = $idFamiliares;

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
     * Get the value of nombreCompleto
     */
    public function getNombreCompletoF()
    {   
        return $this->nombreCompletoF;
    }

    /**
     * Set the value of nombreCompleto
     */
    public function setNombreCompletoF($nombreCompletoF): self
    {
        $this->nombreCompletoF = $nombreCompletoF;

        return $this;
    }

    /**
     * Get the value of domicilio
     */
    public function getDomicilio()
    {
        return $this->domicilio;
    }

    /**
     * Set the value of domicilio
     */
    public function setDomicilio($domicilio): self
    {
        $this->domicilio = $domicilio;

        return $this;
    }

    /**
     * Get the value of colonia
     */
    public function getColonia()
    {
        return $this->colonia;
    }

    /**
     * Set the value of colonia
     */
    public function setColonia($colonia): self
    {
        $this->colonia = $colonia;

        return $this;
    }

    /**
     * Get the value of telefono
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set the value of telefono
     */
    public function setTelefono($telefono): self
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get the value of celular
     */
    public function getCelular()
    {
        return $this->celular;
    }

    /**
     * Set the value of celular
     */
    public function setCelular($celular): self
    {
        $this->celular = $celular;

        return $this;
    }

    /**
     * Get the value of telefonoTrabajo
     */
    public function getTelefonoTrabajo()
    {
        return $this->telefonoTrabajo;
    }

    /**
     * Set the value of telefonoTrabajo
     */
    public function setTelefonoTrabajo($telefonoTrabajo): self
    {
        $this->telefonoTrabajo = $telefonoTrabajo;

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
}