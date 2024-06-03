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

use Pacientes\Model\Entity\IngresoEntity;


class IngresoTable extends AbstractTableGateway
{
	protected $adapter;          		# adapter to use to connect to the database
	protected $table = 'ingresos';  	# our table. one we want to store data in

	public function __construct(Adapter $adapter)
	{
		$this->adapter = $adapter;
		$this->initialize();
	}

	public function listarTodosIngresos()
	{
		$sqlQuery = $this->sql->select()->where(['ingresos.estado' => 1])->join('pacientes', 'pacientes.idPacientes='.$this->table.'.idPacientes',
		     ['nombreCompleto'])			    
		    ->order('pacientes.idPacientes ASC');
		
		$sqlStmt = $this->sql->prepareStatementForSqlObject($sqlQuery);
		$handler = $sqlStmt->execute();
		//print_r($handler);
		$classMethod = new ClassMethodsHydrator();
		$entity      = new IngresoEntity();
		$resultSet   = new HydratingResultSet($classMethod, $entity);
		$resultSet->initialize($handler);
		return $resultSet;
	}
	public function buscarPaciente($id)
	{
		$sqlQuery = $this->sql->select()->where(['ingresos.estado' => 1,'ingresos.idPacientes'=>$id])->
		join('pacientes', 'pacientes.idPacientes='.$this->table.'.idPacientes',
		     ['nombreCompleto','direccion','escolardiad'])->
			 join('expedientes', 'expedientes.Pacientes_idPacientes='.$this->table.'.idPacientes',
			 ['idExpedientes','Pacientes_idPacientes'])			    
		    ->order('pacientes.idPacientes ASC');
		
		$sqlStmt = $this->sql->prepareStatementForSqlObject($sqlQuery);
		$handler = $sqlStmt->execute();
		//print_r($handler);
		$classMethod = new ClassMethodsHydrator();
		$entity      = new IngresoEntity();
		$resultSet   = new HydratingResultSet($classMethod, $entity);
		$resultSet->initialize($handler);
		return $resultSet->current();
	}
	public function guardar(array $data)
	{		
		$sqlQuery = $this->sql->insert()->values($data);
		$sqlStmt  = $this->sql->prepareStatementForSqlObject($sqlQuery);
		$sqlStmt->execute();

		$sqlSelect = $this->sql->select()
		->columns(['id' => new Expression('@@identity')]);
		$sqlStmts = $this->sql->prepareStatementForSqlObject($sqlSelect);
		$handler = $sqlStmts->execute();
		return $handler->current();
	}

	public function desactivarIngreso($id)
	{
		$sqlQuery = $this->sql->update()->set(['estado' =>0])->where(['idIngresos' => $id]);
		$sqlStmt  = $this->sql->prepareStatementForSqlObject($sqlQuery);
		$sqlStmt->execute();
		return $sqlStmt;
	}
}
