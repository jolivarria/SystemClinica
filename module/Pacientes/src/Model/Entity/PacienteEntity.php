<?php

declare(strict_types=1);

namespace Pacientes\Model\Entity;

class PacienteEntity
{
    protected $idPacientes;         //Primaria	int(11)			No	Ninguna		AUTO_INCREMENT	Cambiar Cambiar	Eliminar Eliminar
    protected $nombreCompleto;      //varchar(45)	utf8_bin		No	Ninguna			Cambiar Cambiar	Eliminar Eliminar	
    protected $fechaNac;	        //date			No	Ninguna			Cambiar Cambiar	Eliminar Eliminar	
    protected $sexo;	            //enum('Masculino', 'Femenino')	utf8_bin		No	Ninguna			Cambiar Cambiar	Eliminar Eliminar	
    protected $direccion;	        //varchar(45)	utf8_bin		No	Ninguna			Cambiar Cambiar	Eliminar Eliminar	
    protected $escolardiad;	        //varchar(45)	utf8_bin		No	Ninguna			Cambiar Cambiar	Eliminar Eliminar	
    protected $ocupacion;	        //varchar(45)	utf8_bin		No	Ninguna			Cambiar Cambiar	Eliminar Eliminar	
    protected $estadoCivil;	        //enum('Casado', 'Separado', 'Soltero', 'Divorciado'...	utf8_bin Cambiar	Eliminar Eliminar	
    protected $nacionalidad;	    //varchar(45)	utf8_bin		No	Ninguna			Cambiar Cambiar	Eliminar Eliminar	
    protected $estado;	            //varchar(45)	utf8_bin		No	Ninguna			Cambiar Cambiar	Eliminar Eliminar	
    protected $municipio;	        //	varchar(45)	utf8_bin		No	Ninguna	
    protected $codigoPostal;	    //	varchar(45)	utf8_bin		No	Ninguna	
    protected $telefono;	        //	varchar(45)	utf8_bin		Sí	NULL	
    protected $celular;	            //	varchar(45)	utf8_bin		Sí	NULL				
    protected $telefonoTrabajo;	    //	varchar(45)	utf8_bin		Sí	NULL				
    protected $serviciosMedicos;	//	blob			No	Ninguna				
    protected $tipoServicioMedico;	//	varchar(45)
    #ingreso del paciente.....
    protected $idIngresos;              // Primaria	int(11)			No	Ninguna		AUTO_INCREMENT	Cambiar Cambiar	Eliminar Eliminar		
    protected $idsolicitudRescate;      //	int(11)			No	0			Cambiar Cambiar	Eliminar Eliminar	
    protected $reingreso;               //	enum('No', 'Si')	utf8_bin		No	No			Cambiar Cambiar	Eliminar Eliminar	
    protected $tipoIngreso;             //	enum('Voluntario', 'Involuntario', 'Obligatorio')	utf8_bin		No	Ninguna			Cambiar Cambiar	Eliminar Eliminar	
    protected $referencia;              //	enum('Domicilio Particular', 'Institucion Publica'...	utf8_bin		No	Ninguna			Cambiar Cambiar	Eliminar Eliminar	
    protected $acude;                   //	enum('Solo', 'Amigo', 'Vecino', 'Familiar', 'Paren...	utf8_bin		No	Ninguna			Cambiar Cambiar	Eliminar Eliminar	
    protected $fechaIngreso;            //  timestamp
    #Tabla Familiares
    protected $idFamiliares;            // Primaria	int(11)			No	Ninguna		AUTO_INCREMENT	Cambiar Cambiar	Eliminar Eliminar	
    protected $Pacientes_idPacientes;            // Índice	int(11)			No	Ninguna			Cambiar Cambiar	Eliminar Eliminar	
    protected $nombreCompletoF;            //	varchar(45)	utf8_bin		No	Ninguna			Cambiar Cambiar	Eliminar Eliminar	
    protected $domicilio;            //	varchar(45)	utf8_bin		No	Ninguna			Cambiar Cambiar	Eliminar Eliminar	
    protected $colonia;            //	varchar(45)	utf8_bin		No	Ninguna			Cambiar Cambiar	Eliminar Eliminar	
    protected $telefonoF;            //	varchar(45)	utf8_bin		Sí	NULL			Cambiar Cambiar	Eliminar Eliminar	
    protected $celularF;            //	varchar(45)	utf8_bin		No	Ninguna			Cambiar Cambiar	Eliminar Eliminar	
    protected $telefonoTrabajoF;            //	varchar(45)	utf8_bin    

    
    public function getIdPacientes()
    {
        return $this->idPacientes;
    }
    public function setIdPacientes($idPacientes)
    {
        $this->idPacientes = $idPacientes;
    }

    public function getNomCompleto()
    {
        return $this->nombreCompleto;
    }
    public function setNombreCompleto($nombreCompleto)
    {
        $this->nombreCompleto = $nombreCompleto;
    }
    public function getFechaNac()
    {
        return $this->fechaNac;
    }
    public function setFechaNac($fechaNac)
    {
        $this->fechaNac = $fechaNac;
    }
    public function getSexo()
    {
        return $this->sexo;
    }
    public function setSexo($sexo)
    {
        $this->Sexo = $sexo;
    }
    public function getDireccion()
    {
        return $this->direccion;
    }
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }
    public function getEscolaridad()
    {
        return $this->escolardiad;
    }
    public function setEscolaridad($escolardiad)
    {
        $this->escolardiad = $escolardiad;
    }
    public function getOcupacion()
    {
        return $this->ocupacion;
    }
    public function setOcupacion($ocupacion)
    {
        $this->ocupacion = $ocupacion;
    }
    public function getEstadoCivil()
    {
        return $this->estadoCivil;
    }
    public function setEstadoCivil($estadoCivil)
    {
        $this->estadoCivil = $estadoCivil;
    }
    public function getNacionalidad()
    {
        return $this->nacionalidad;
    }
    public function setNacionalidad($nacionalidad)
    {
        $this->nacionalidad = $nacionalidad;
    }
    public function getEstado()
    {
        return $this->estado;
    }
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }
    public function getMunicipio()
    {
        return $this->municipio;
    }
    public function setMunicipio($municipio)
    {
        $this->municipio = $municipio;
    }
    public function getCodigoPostal()
    {
        return $this->codigoPostal;
    }
    public function setCodigoPostal($codigoPostal)
    {
        $this->codigoPostal = $codigoPostal;
    }
    public function getTelefono()
    {
        return $this->telefono;
    }
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }
    public function getTelefonoTrabajo()
    {
        return $this->telefonoTrabajo;
    }
    public function setTelefonoTrabajo($telefonoTrabajo)
    {
        $this->telefonoTrabajo = $telefonoTrabajo;
    }
    public function getCelular()
    {
        return $this->celular;
    }
    public function setCelular($celular)
    {
        $this->celular = $celular;
    }
    public function getServiciosMedicos()
    {
        return $this->serviciosMedicos;
    }
    public function setServiciosMedicos($serviciosMedicos)
    {
        $this->serviciosMedicos = $serviciosMedicos;
    }
    public function getTipoServicios()
    {
        return $this->tipoServicioMedico;
    }
    public function setTipoServicios($tipoServicioMedico)
    {
        $this->tipoServicioMedico = $tipoServicioMedico;
    }

    public function getArrayCopy()
    {
        return get_object_vars($this);
    }
   

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
     * Get the value of nombreCompletoF
     */
    public function getNombreCompletoF()
    {
        return $this->nombreCompletoF;
    }

    /**
     * Set the value of nombreCompletoF
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
     * Get the value of telefonoF
     */
    public function getTelefonoF()
    {
        return $this->telefonoF;
    }

    /**
     * Set the value of telefonoF
     */
    public function setTelefonoF($telefonoF): self
    {
        $this->telefonoF = $telefonoF;

        return $this;
    }

    /**
     * Get the value of celularF
     */
    public function getCelularF()
    {
        return $this->celularF;
    }

    /**
     * Set the value of celularF
     */
    public function setCelularF($celularF): self
    {
        $this->celularF = $celularF;

        return $this;
    }

    /**
     * Get the value of telefonoTrabajoF
     */
    public function getTelefonoTrabajoF()
    {
        return $this->telefonoTrabajoF;
    }

    /**
     * Set the value of telefonoTrabajoF
     */
    public function setTelefonoTrabajoF($telefonoTrabajoF): self
    {
        $this->telefonoTrabajoF = $telefonoTrabajoF;

        return $this;
    }
    

    public function exchangeArray(array $data)
    {
        $this->idPacientes      = !empty($data['idPacientes']) ? $data['idPacientes'] : null;
        $this->nombreCompleto   = !empty($data['nombreCompleto']) ? $data['nombreCompleto'] : null;
        $this->fechaNac         = !empty($data['fechaNac']) ? $data['fechaNac'] : null;
        $this->sexo             = !empty($data['sexo']) ? $data['sexo'] : null;
        $this->direccion        = !empty($data['direccion']) ? $data['direccion'] : null;
        $this->escolardad       = !empty($data['escolardad']) ? $data['escolardad'] : null;
        $this->ocupacion        = !empty($data['ocupacion']) ? $data['ocupacion'] : null;
        $this->estadoCivil      = !empty($data['estadoCivil']) ? $data['estadoCivil'] : null;
        $this->nacionalidad     = !empty($data['nacionalidad']) ? $data['nacionalidad'] : null;
        $this->estado           = !empty($data['estado']) ? $data['estado'] : null;
        $this->municipio        = !empty($data['municipio']) ? $data['municipio'] : null;
        $this->codigoPostal     = !empty($data['codigoPostal']) ? $data['codigoPostal'] : null;
        $this->telefono         = !empty($data['telefono']) ? $data['telefono'] : null;
        $this->celular              = !empty($data['celular']) ? $data['celular'] : null;
        $this->telefonoTrabajo      = !empty($data['telefonoTrabajo']) ? $data['telefonoTrabajo'] : null;
        $this->serviciosMedicos     = !empty($data['serviciosMedicos']) ? $data['serviciosMedicos'] : null;
        $this->tipoServicioMedico  = !empty($data['tipoServicioMedico']) ? $data['tipoServicioMedico'] : null;
        
    }
   
}
