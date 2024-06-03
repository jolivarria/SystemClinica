<?php

declare(strict_types=1);

namespace Pacientes\Model\Entity;

class IngresoEntity
{
    protected $idIngresos;              // Primaria	int(11)			No	Ninguna		AUTO_INCREMENT		
    protected $idPacientes;             // Índice	int(11)			No	Ninguna		
    protected $idExpedientes;
    protected $idsolicitudRescate;      //	int(11)			No	0
    protected $reingreso;               //	enum('No', 'Si')	utf8_bin	
    protected $tipoIngreso;             //	enum('Voluntario', 'Involuntario', 'Obligatorio')	utf8_bin
    protected $referencia;              //	enum('Domicilio Particular', 'Institucion Publica'...	utf8_bin
    protected $acude;                   //	enum('Solo', 'Amigo', 'Vecino', 'Familiar', 'Paren...	utf8_bin
    protected $fechaIngreso;            //	timestamp			No	current_timestamp()	
    protected $nombreCompleto;
    protected $direccion;
    protected $escolardiad;

    public function getIdIngresos()
    {
        return $this->idIngresos;
    }
    public function setIdIngresos($idIngresos)
    {
        $this->idIngresos = $idIngresos;
    }
    public function getIdPacientes()
    {
        return $this->idPacientes;
    }
    public function setIdPacientes($idPacientes)
    {
        $this->idPacientes = $idPacientes;
    }
    public function getIdsolicitudRescate()
    {
        return $this->idsolicitudRescate;
    }
    public function setIdsolicitudRescate($idsolicitudRescate)
    {
        $this->idsolicitudRescate = $idsolicitudRescate;
    }
    public function getReingreso()
    {
        return $this->reingreso;
    }
    public function setReingreso($reingreso)
    {
        $this->reingreso = $reingreso;
    }
    public function getTipoIngreso()
    {
        return $this->tipoIngreso;
    }
    public function setTipoIngreso($tipoIngreso)
    {
        $this->tipoIngreso = $tipoIngreso;
    }
    public function getReferencia()
    {
        return $this->referencia;
    }
    public function setReferencia($referencia)
    {
        $this->referencia = $referencia;        
    }
    public function getAcude()
    {
        return $this->acude;
    }
    public function setAcude($acude)
    {
        $this->acude = $acude;
    }
    public function getFechaIngreso()
    {
        return $this->fechaIngreso;
    }
    public function setFechaIngreso($fechaIngreso)
    {
        $this->fechaIngreso = $fechaIngreso;
    }
    public function getNomCompleto()
    {
        return $this->nombreCompleto;
    }
    public function setNombreCompleto($nombreCompleto)
    {
        $this->nombreCompleto = $nombreCompleto;
    }

    /**
     * Get the value of direccion
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set the value of direccion
     */
    public function setDireccion($direccion): self
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get the value of escolardiad
     */
    public function getEscolardiad()
    {
        return $this->escolardiad;
    }

    /**
     * Set the value of escolardiad
     */
    public function setEscolardiad($escolardiad): self
    {
        $this->escolardiad = $escolardiad;

        return $this;
    }

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
}