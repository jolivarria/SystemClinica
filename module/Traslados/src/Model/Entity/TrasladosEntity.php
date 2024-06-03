<?php

declare(strict_types=1);

namespace Traslados\Model\Entity;

class TrasladosEntity
{
    protected $idTraslado;          //int(11) AI PK 
    protected $idExpedientes;       //int(11) 
    protected $idIngresos;          //int(11) 
    protected $idPacientes;         //int(11) 
    protected $tipo;                //enum('Médico Gral. Farmacias Similiares','Hospital General','Familiar') 
    protected $costo;               //double 
    protected $descripcion;         //text 
    protected $estado;              //tinyint(4) 
    protected $fechaTraslado;       //date 
    protected $fechaCaptura;        //timestam
   

    

    /**
     * Get the value of idTraslado
     */
    public function getIdTraslado()
    {
        return $this->idTraslado;
    }

    /**
     * Set the value of idTraslado
     */
    public function setIdTraslado($idTraslado): self
    {
        $this->idTraslado = $idTraslado;

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
     * Get the value of tipo
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set the value of tipo
     */
    public function setTipo($tipo): self
    {
        $this->tipo = $tipo;

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
     * Get the value of descripcion
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set the value of descripcion
     */
    public function setDescripcion($descripcion): self
    {
        $this->descripcion = $descripcion;

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
     * Get the value of fechaTraslado
     */
    public function getFechaTraslado()
    {
        return $this->fechaTraslado;
    }

    /**
     * Set the value of fechaTraslado
     */
    public function setFechaTraslado($fechaTraslado): self
    {
        $this->fechaTraslado = $fechaTraslado;

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
}