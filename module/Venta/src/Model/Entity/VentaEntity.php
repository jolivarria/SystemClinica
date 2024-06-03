<?php

declare(strict_types=1);

namespace Venta\Model\Entity;

class VentaEntity
{
    protected $idventas;        //int(11) AI PK 
    protected $idExpedientes;   // int(11) 
    protected $fecha;           // datetime 
    protected $total;           // decimal(10,2) 
    protected $estado;          // enum('Pendiente','Pagado','Cancelado')

    public function exchangeArray(array $data)
    {
        $this->idventas         = !empty($data['idventas']) ? $data['idventas'] : null;
        $this->idExpedientes    = !empty($data['idExpedientes']) ? $data['idExpedientes'] : null;
        $this->fecha            = !empty($data['fecha']) ? $data['fecha'] : null;
        $this->total            = !empty($data['total']) ? $data['total'] : null;
        $this->precio           = !empty($data['precio']) ? $data['precio'] : null;
        $this->estado           = !empty($data['estado']) ? $data['estado'] : null;      
    }
    public function getArrayCopy()
    {
        return get_object_vars($this);
    }

    /**
     * Get the value of idventas
     */
    public function getIdventas()
    {
        return $this->idventas;
    }

    /**
     * Set the value of idventas
     */
    public function setIdventas($idventas): self
    {
        $this->idventas = $idventas;

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
     * Get the value of total
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set the value of total
     */
    public function setTotal($total): self
    {
        $this->total = $total;

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
}
