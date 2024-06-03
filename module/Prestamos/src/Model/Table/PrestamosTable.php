<?php

declare(strict_types=1);

namespace Prestamos\Model\Table;

use Exception;
use Laminas\Db\RowGateway\RowGateway;
use Laminas\Db\Adapter\Adapter;
use Laminas\Db\ResultSet\HydratingResultSet;
use Laminas\Db\TableGateway\AbstractTableGateway;
use Laminas\Hydrator\ClassMethodsHydrator;

use Laminas\Db\Adapter\Driver\ResultInterface;
use Laminas\Db\ResultSet\ResultSet;
use Prestamos\Model\Entity\PrestamosEntity;
use Laminas\Db\Sql\Expression as Expression;
use RuntimeException;


class PrestamosTable extends AbstractTableGateway
{
	protected $adapter;          		# adapter to use to connect to the database
	protected $table = 'prestamos';  	# our table. one we want to store data in

	public function __construct(Adapter $adapter)
	{
		$this->adapter = $adapter;
		$this->initialize();
	}

	public function listarTodos($id)
	{ 
		try {
			$sqlQuery = $this->sql->select()->where(['prestamos.idPacientes' => $id])
			->join(
					'pacientes',
					'pacientes.idPacientes=' . $this->table . '.idPacientes',
					['nombreCompleto']
				)->join(
					'ingresos',
					'ingresos.idPacientes=' . $this->table . '.idPacientes',
					['tipoIngreso']
				)->order('pacientes.idPacientes ASC');

			$sqlStmt = $this->sql->prepareStatementForSqlObject($sqlQuery);
			($sqlStmt);
			$handler = $sqlStmt->execute();
			$classMethod = new ClassMethodsHydrator();
			$entity      = new PrestamosEntity();
			$resultSet   = new HydratingResultSet($classMethod, $entity);

			$resultSet->initialize($handler);
		} catch (RuntimeException $exception) {
			return $exception->getMessage();
			//return $this->redirect()->refresh(); # refresh this page to view errors
		}
		return $resultSet;
	}
	
	public function listAll()
	{
		try {
			$sqlQuery = $this->sql->select()
			->join(
					'pacientes',
					'pacientes.idPacientes=' . $this->table . '.idPacientes',
					['nombreCompleto']
				)->join(
					'ingresos',
					'ingresos.idPacientes=' . $this->table . '.idPacientes',
					['tipoIngreso']
				)->order('pacientes.idPacientes ASC');

			$sqlStmt = $this->sql->prepareStatementForSqlObject($sqlQuery);
			($sqlStmt);
			$handler = $sqlStmt->execute();
			$classMethod = new ClassMethodsHydrator();
			$entity      = new CitasEntity();
			$resultSet   = new HydratingResultSet($classMethod, $entity);

			$resultSet->initialize($handler);
		} catch (RuntimeException $exception) {
			return $exception->getMessage();
			//return $this->redirect()->refresh(); # refresh this page to view errors
		}
		return $resultSet;
	}

	public function guardar(array $data)
	{
		$sqlQuery = $this->sql->insert()->values($data);
		$sqlStmt  = $this->sql->prepareStatementForSqlObject($sqlQuery);
		return $sqlStmt->execute();
		// SELECT PARA OBTERNER EL ULTIMO ID INSERTADO DE PACIENTES
		/*$sqlSelect = $this->sql->select()
		->columns(['id' => new Expression('@@identity')]);
		$sqlStmts = $this->sql->prepareStatementForSqlObject($sqlSelect);
		$handler = $sqlStmts->execute();
		return $handler->current();*/
	}

	public function abrirExpediente($id)
	{
		$sqlSelect = $this->sql->select()->where(['expedientes.idExpedientes' => $id])
		->join('familiares', 'familiares.Pacientes_idPacientes='.$this->table.'.Pacientes_idPacientes',
		['nombreCompletoF'])
		->join(
			'pacientes',
			'pacientes.idPacientes=' . $this->table . '.Pacientes_idPacientes',	['nombreCompleto','fechaNac']
		)			    
	   ->order('pacientes.idPacientes ASC');;
		$sqlStmts = $this->sql->prepareStatementForSqlObject($sqlSelect);
		$handler = $sqlStmts->execute();
		//print_r($handler);
		return $handler->current();

		/*$sqlQuery = $this->sql->update()->set(['costo' => $costo,'estado'=>'Abierto'])->where(['idExpedientes' => $id]);
		$sqlStmt  = $this->sql->prepareStatementForSqlObject($sqlQuery);
		return $sqlStmt->execute();/*/
	}

	public function guardarExpediente($id,$costo)
	{
		try{
			$sqlQuery = $this->sql->update()->set(['costo'=>$costo,'estado'=>'Abierto'])->where(['idExpedientes' => $id]);
			$sqlStmt = $this->sql->prepareStatementForSqlObject($sqlQuery);
			return $sqlStmt->execute();
		}catch (RuntimeException $exception) {
			return $exception->getMessage();
		}
		
	}
}
