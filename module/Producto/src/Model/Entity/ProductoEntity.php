<?php

declare(strict_types=1);

namespace Producto\Model\Entity;

class ProductoEntity
{
    protected $idproductos;             //int(11) AI PK 
    protected $nombre;             // varchar(45) 
    protected $descripcion;             // text 
    protected $tipo;                   // enum('Producto','Servicio') 
    protected $precio;             // decimal(10,2) 
    protected $fecha_registro;             // timestamp

   

    /**
     * Get the value of idproductos
     */
    public function getIdproductos()
    {
        return $this->idproductos;
    }

    /**
     * Set the value of idproductos
     */
    public function setIdproductos($idproductos): self
    {
        $this->idproductos = $idproductos;

        return $this;
    }

    /**
     * Get the value of nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     */
    public function setNombre($nombre): self
    {
        $this->nombre = $nombre;

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
     * Get the value of precio
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set the value of precio
     */
    public function setPrecio($precio): self
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get the value of fecha_registro
     */
    public function getFechaRegistro()
    {
        return $this->fecha_registro;
    }

    /**
     * Set the value of fecha_registro
     */
    public function setFechaRegistro($fecha_registro): self
    {
        $this->fecha_registro = $fecha_registro;

        return $this;
    }
    public function exchangeArray(array $data)
    {
        $this->idproductos      = !empty($data['idproductos']) ? $data['idproductos'] : null;
        $this->nombre           = !empty($data['nombre']) ? $data['nombre'] : null;
        $this->descripcion      = !empty($data['descripcion']) ? $data['descripcion'] : null;
        $this->tipo             = !empty($data['tipo']) ? $data['tipo'] : null;
        $this->precio           = !empty($data['precio']) ? $data['precio'] : null;
        $this->fecha_registro   = !empty($data['fecha_registro']) ? $data['fecha_registro'] : null;      
    }
    public function getArrayCopy()
    {
        return get_object_vars($this);
    }
}
