<?php

declare(strict_types=1);

namespace Prestamos\Model\Entity;

class PrestamosEntity
{
    protected $idprestamos;             //int(11) PK 
    protected $idExpedientes;             // int(11) 
    protected $idIngresos;             // int(11) 
    protected $idPacientes;             // int(11) 
    protected $prestamo_monto;             // double 
    protected $taza_interes;             // varchar(45) 
    protected $plazo;                       // varchar(45) 
    protected $amortización;             // varchar(45) 
    protected $concepto;                //varchar(60)
    protected $status;
    protected $fecha_prestamo;             // timestamp

    /**
     * Get the value of idprestamos
     */
    public function getIdprestamos()
    {
        return $this->idprestamos;
    }

    /**
     * Set the value of idprestamos
     */
    public function setIdprestamos($idprestamos): self
    {
        $this->idprestamos = $idprestamos;

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
     * Get the value of prestamo_monto
     */
    public function getPrestamoMonto()
    {
        return $this->prestamo_monto;
    }

    /**
     * Set the value of prestamo_monto
     */
    public function setPrestamoMonto($prestamo_monto): self
    {
        $this->prestamo_monto = $prestamo_monto;

        return $this;
    }

    /**
     * Get the value of taza_interes
     */
    public function getTazaInteres()
    {
        return $this->taza_interes;
    }

    /**
     * Set the value of taza_interes
     */
    public function setTazaInteres($taza_interes): self
    {
        $this->taza_interes = $taza_interes;

        return $this;
    }

    /**
     * Get the value of plazo
     */
    public function getPlazo()
    {
        return $this->plazo;
    }

    /**
     * Set the value of plazo
     */
    public function setPlazo($plazo): self
    {
        $this->plazo = $plazo;

        return $this;
    }

    /**
     * Get the value of amortización
     */
    public function getAmortización()
    {
        return $this->amortización;
    }

    /**
     * Set the value of amortización
     */
    public function setAmortización($amortización): self
    {
        $this->amortización = $amortización;

        return $this;
    }

    /**
     * Get the value of fecha_prestamo
     */
    public function getFechaPrestamo()
    {
        return $this->fecha_prestamo;
    }

    /**
     * Set the value of fecha_prestamo
     */
    public function setFechaPrestamo($fecha_prestamo): self
    {
        $this->fecha_prestamo = $fecha_prestamo;

        return $this;
    }

    /**
     * Get the value of concepto
     */
    public function getConcepto()
    {
        return $this->concepto;
    }

    /**
     * Set the value of concepto
     */
    public function setConcepto($concepto): self
    {
        $this->concepto = $concepto;

        return $this;
    }

    /**
     * Get the value of status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     */
    public function setStatus($status): self
    {
        $this->status = $status;

        return $this;
    }
}
