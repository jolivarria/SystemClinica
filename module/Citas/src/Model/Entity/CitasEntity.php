<?php

declare(strict_types=1);

namespace Citas\Model\Entity;

class CitasEntity
{
    protected $idcitas; //int(11) AI PK 
    protected $idExpedientes; //int(11) 
    protected $idPacientes;
    protected $nombreCompleto;          //varchar(45)
    protected $motivo; //varchar(155) 
    protected $observaciones; //text 
    protected $ubicacion; //varchar(45) 
    protected $estado; //tinyint(4) 
    protected $fecha; //varchar(45) 
    protected $fechaCaptura; //timestamp

    /**
     * Get the value of idcitas
     */
    public function getIdcitas()
    {
        return $this->idcitas;
    }

    /**
     * Set the value of idcitas
     */
    public function setIdcitas($idcitas): self
    {
        $this->idcitas = $idcitas;

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

    /**
     * Get the value of motivo
     */
    public function getMotivo()
    {
        return $this->motivo;
    }

    /**
     * Set the value of motivo
     */
    public function setMotivo($motivo): self
    {
        $this->motivo = $motivo;

        return $this;
    }

    /**
     * Get the value of observaciones
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }

    /**
     * Set the value of observaciones
     */
    public function setObservaciones($observaciones): self
    {
        $this->observaciones = $observaciones;

        return $this;
    }

    /**
     * Get the value of ubicacion
     */
    public function getUbicacion()
    {
        return $this->ubicacion;
    }

    /**
     * Set the value of ubicacion
     */
    public function setUbicacion($ubicacion): self
    {
        $this->ubicacion = $ubicacion;

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
     * Get the value of fecha
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set the value of fecha
     */
    public function setFecha($fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get the value of fechaCaptura
     */
    public function getFechaCaptura()
    {
        return $this->fechaCaptura;
    }

    /**
     * Set the value of fechaCaptura
     */
    public function setFechaCaptura($fechaCaptura): self
    {
        $this->fechaCaptura = $fechaCaptura;

        return $this;
    }

    /**
     * Get the value of idPacientes
     */
    public function getIdPacientes()
    {
        return $this->idPacientes;
    }

    /**
     * Set the value of idPacientes
     */
    public function setIdPacientes($idPacientes): self
    {
        $this->idPacientes = $idPacientes;

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
