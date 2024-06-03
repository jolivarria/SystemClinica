<?php

declare(strict_types=1);

namespace Pacientes\Model\Table;

use Laminas\Crypt\Password\Bcrypt;
use Laminas\Db\Adapter\Adapter;
use Laminas\Db\ResultSet\HydratingResultSet;
use Laminas\Db\TableGateway\AbstractTableGateway;
use Laminas\Filter;
use Laminas\Hydrator\ClassMethodsHydrator;
use Laminas\I18n;
use Laminas\InputFilter;
use Laminas\Paginator\Adapter\DbSelect;
use Laminas\Paginator\Paginator;
use Laminas\Validator;
use Laminas\Db\Sql\Expression as Expression;

use Pacientes\Model\Entity\PacienteEntity;
use Pacientes\Model\Entity\IngresoEntity;
use Pacientes\Model\Table\IngresoTable;


class PacienteTable extends AbstractTableGateway
{
	protected $adapter;          		# adapter to use to connect to the database
	protected $table = 'pacientes';  	# our table. one we want to store data in

	public function __construct(Adapter $adapter)
	{
		$this->adapter = $adapter;
		$this->initialize();
	}

	public function listarTodosPacientes()
	{
		$sqlQuery = $this->sql->select();
		$sqlStmt = $this->sql->prepareStatementForSqlObject($sqlQuery);
		$handler = $sqlStmt->execute();
		$classMethod = new ClassMethodsHydrator();
		$entity      = new PacienteEntity();
		$resultSet   = new HydratingResultSet($classMethod, $entity);

		$resultSet->initialize($handler);

		return $resultSet;
	}

	public function guardar(array $data){


		$timeNow = date('Y-m-d H:i:s');
		$valuesPacientes = [
			'nombreCompleto' 		=> $data['nombreCompleto'],
			'fechaNac' 				=> $data['fechaNac'],
			'sexo'       			=> $data['sexo'],
			'direccion' 			=> $data['direccion'],
			'escolardiad'  			=> $data['escolardiad'],
			'ocupacion'   			=> $data['ocupacion'],
			'estadoCivil'			=> $data['estadoCivil'],
			'nacionalidad'      	=> $data['nacionalidad'],
			'estado'  				=> $data['estado'],
			'municipio'      		=> $data['municipio'],
			'codigoPostal'			=> $data['codigoPostal'],
			'telefono'				=> $data['telefono'],
			'celular'				=> $data['celular'],
			'telefonoTrabajo'		=> $data['telefonoTrabajo'],
			'serviciosMedicos'		=> $data['serviciosMedicos'],
			'tipoServicioMedico'	=> $data['tipoServicioMedico'],
			'fechaCreacion' 		=> $timeNow,
		];

		$sqlQuery = $this->sql->insert()->values($valuesPacientes);
		$sqlStmt  = $this->sql->prepareStatementForSqlObject($sqlQuery);
		$sqlStmt->execute();

		$sqlSelect = $this->sql->select()
		->columns(['id' => new Expression('@@identity')]);
		$sqlStmts = $this->sql->prepareStatementForSqlObject($sqlSelect);
		$handler = $sqlStmts->execute();
		return $handler->current();

	}
	
}
