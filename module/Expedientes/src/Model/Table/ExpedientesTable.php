<?php

declare(strict_types=1);

namespace Expedientes\Model\Table;

use Exception;
use Laminas\Db\RowGateway\RowGateway; 
use Laminas\Db\Adapter\Adapter;
use Laminas\Db\ResultSet\HydratingResultSet;
use Laminas\Db\TableGateway\AbstractTableGateway;
use Laminas\Hydrator\ClassMethodsHydrator;

use Laminas\Db\Adapter\Driver\ResultInterface;
use Laminas\Db\ResultSet\ResultSet;
use Expedientes\Model\Entity\ExpedientesEntity;
use Laminas\Db\Sql\Expression as Expression;
use RuntimeException;


class ExpedientesTable extends AbstractTableGateway
{
	protected $adapter;          		# adapter to use to connect to the database
	protected $table = 'Expedientes';  	# our table. one we want to store data in

	public function __construct(Adapter $adapter)
	{
		$this->adapter = $adapter;
		$this->initialize();
	}

	public function listarTodosExpedientes()
	{
		try {
			$sqlQuery = $this->sql->select()->where(['expedientes.desactivado' => 1])
				->join(
					'pacientes',
					'pacientes.idPacientes=' . $this->table . '.Pacientes_idPacientes',
					['nombreCompleto', 'serviciosMedicos', 'tipoServicioMedico']
				)->join(
					'ingresos',
					'ingresos.idPacientes=' . $this->table . '.Pacientes_idPacientes',
					['tipoIngreso']
				)->order('pacientes.idPacientes ASC');

			$sqlStmt = $this->sql->prepareStatementForSqlObject($sqlQuery);
			($sqlStmt);
			$handler = $sqlStmt->execute();
			$classMethod = new ClassMethodsHydrator();
			$entity      = new ExpedientesEntity();
			$resultSet   = new HydratingResultSet($classMethod, $entity);

			$resultSet->initialize($handler);
		} catch (RuntimeException $exception) {
			return $exception->getMessage();
			//return $this->redirect()->refresh(); # refresh this page to view errors
		}
		return $resultSet;
	}
	public function listarNombresExpedientes()
	{
		$sqlSelect = $this->sql->select()->columns(['idExpedientes'])->where(['expedientes.desactivado' => 1])
			->join(
				'pacientes',
				'pacientes.idPacientes=' . $this->table . '.Pacientes_idPacientes',
				['nombreCompleto']
			)->order('pacientes.idPacientes ASC');
		//var_dump($sqlSelect->);
		//exit();		
		$statement = $this->sql->prepareStatementForSqlObject($sqlSelect);
		$resultSet = $statement->execute();
		
		$hydrator = new ClassMethodsHydrator();
		$entityPrototype = new ExpedientesEntity();
		$hydratingResultSet = new HydratingResultSet($hydrator, $entityPrototype);

		$hydratingResultSet->initialize($resultSet);

		$entities = [];
		foreach ($hydratingResultSet as $entity) {
			$entities[] = $entity->getArrayCopy();
		}

		return $entities;
	}
	public function fetchAll()
	{
		/*$sqlSelect = $this->sql->select()->columns(['idExpedientes'])->where(['expedientes.desactivado' => 1])
			->join(
				'pacientes',
				'pacientes.idPacientes=' . $this->table . '.Pacientes_idPacientes',
				['nombreCompleto']
			)->order('pacientes.idPacientes ASC');
		//var_dump($sqlSelect->);
		//exit();		
		$statement = $this->sql->prepareStatementForSqlObject($sqlSelect);
		$resultSet = $statement->execute();
		$result = new ResultSet();
		$result->initialize($resultSet);	
			
		//var_dump($sqlSelect->);
		//exit();		
	
		return $result->toArray();*/

        $sqlSelect = $this->sql->select()->columns(['idExpedientes'])->where(['expedientes.desactivado' => 1])
			->join(
				'pacientes',
				'pacientes.idPacientes=' . $this->table . '.Pacientes_idPacientes',
				['nombreCompleto']
			)->order('pacientes.idPacientes ASC');

        $statement = $this->sql->prepareStatementForSqlObject($sqlSelect);
        $resultSet = new ResultSet();
        $resultSet->initialize($statement->execute());

        return $resultSet->toArray();
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
			->join(
				'familiares',
				'familiares.Pacientes_idPacientes=' . $this->table . '.Pacientes_idPacientes',
				['nombreCompletoF']
			)
			->join(
				'pacientes',
				'pacientes.idPacientes=' . $this->table . '.Pacientes_idPacientes',
				['nombreCompleto', 'fechaNac']
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

	public function guardarExpediente($id, $costo)
	{
		try {
			$sqlQuery = $this->sql->update()->set(['costo' => $costo, 'estado' => 'Abierto'])->where(['idExpedientes' => $id]);
			$sqlStmt = $this->sql->prepareStatementForSqlObject($sqlQuery);
			return $sqlStmt->execute();
		} catch (RuntimeException $exception) {
			return $exception->getMessage();
		}
	}
}
