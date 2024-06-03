<?php

declare(strict_types=1);

namespace Pacientes\Model\Entity;

class TrasladoEntity
{
    protected $idsolicitudRescate; //int(11) AI PK 
    protected $nombreCompleto; // varchar(45) 
    protected $edad; // varchar(45) 
    protected $parentesco; // varchar(45) 
    protected $direccion; // varchar(45) 
    protected $nombreResposable; // varchar(45) 
    protected $celular; //varchar(45)
    protected $folio; // varchar(45) 
    protected $operadora; // varchar(45) 
    protected $costo; // double
    protected $fechaCreacion;  //timestamp 	


    /**
     * Get the value of idsolicitudRescate
     */
    public function getIdsolicitudRescate()
    {
        return $this->idsolicitudRescate;
    }

    /**
     * Set the value of idsolicitudRescate
     *
     * @return  self
     */
    public function setIdsolicitudRescate($idsolicitudRescate)
    {
        $this->idsolicitudRescate = $idsolicitudRescate;

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
     *
     * @return  self
     */
    public function setNombreCompleto($nombreCompleto)
    {
        $this->nombreCompleto = $nombreCompleto;

        return $this;
    }

    /**
     * Get the value of edad
     */
    public function getEdad()
    {
        return $this->edad;
    }

    /**
     * Set the value of edad
     *
     * @return  self
     */
    public function setEdad($edad)
    {
        $this->edad = $edad;

        return $this;
    }

    /**
     * Get the value of parentesco
     */
    public function getParentesco()
    {
        return $this->parentesco;
    }

    /**
     * Set the value of parentesco
     *
     * @return  self
     */
    public function setParentesco($parentesco)
    {
        $this->parentesco = $parentesco;

        return $this;
    }

    /**
     * Get the value of dirección
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set the value of dirección
     *
     * @return  self
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get the value of nombreResposable
     */
    public function getNombreResposable()
    {
        return $this->nombreResposable;
    }

    /**
     * Set the value of nombreResposable
     *
     * @return  self
     */
    public function setNombreResposable($nombreResposable)
    {
        $this->nombreResposable = $nombreResposable;

        return $this;
    }

    public function getCelular()
    {
        return $this->celular;
    }
    public function setCelular($celular)
    {
        $this->celular = $celular;
        return $this;
    }

    /**
     * Get the value of folio
     */
    public function getFolio()
    {
        return $this->folio;
    }

    /**
     * Set the value of folio
     *
     * @return  self
     */
    public function setFolio($folio)
    {
        $this->folio = $folio;

        return $this;
    }

    /**
     * Get the value of operadora
     */
    public function getOperadora()
    {
        return $this->operadora;
    }

    /**
     * Set the value of operadora
     *
     * @return  self
     */
    public function setOperadora($operadora)
    {
        $this->operadora = $operadora;

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
     *
     * @return  self
     */
    public function setCosto($costo)
    {
        $this->costo = $costo;

        return $this;
    }
    public function getFechaCreacion()
    {
        return $this->fechaCreacion;
    }
    public function setFechaCreacion($fechaCreacion)
    {
        $this->fechaCreacion = $fechaCreacion;

        return $this;
    }

    public function exchangeArray(array $data)
    {
        $this->idsolicitudRescate     = !empty($data['idsolicitudRescate']) ? $data['idsolicitudRescate'] : null;
        $this->nombreCompleto = !empty($data['nombreCompleto']) ? $data['nombreCompleto'] : null;
        $this->edad  = !empty($data['edad']) ? $data['edad'] : null;
        $this->parentesco = !empty($data['parentesco']) ? $data['parentesco'] : null;
        $this->nombreResposable = !empty($data['nombreResposable']) ? $data['nombreResposable'] : null;
        $this->direccion = !empty($data['direccion']) ? $data['direccion'] : null;
        $this->celular = !empty($data['celular']) ? $data['celular'] : null;
        $this->folio = !empty($data['folio']) ? $data['folio'] : null;
        $this->operadora = !empty($data['operadora']) ? $data['operadora'] : null;
        $this->costo = !empty($data['costo']) ? $data['costo'] : null;
    }
    public function getArrayCopy()
    {
        return get_object_vars($this);
    }
}
