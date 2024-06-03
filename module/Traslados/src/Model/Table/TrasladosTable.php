<?php

declare(strict_types=1);

namespace Traslados\Model\Table;

use Laminas\Db\RowGateway\RowGateway;
use Laminas\Db\Adapter\Adapter;
use Laminas\Db\ResultSet\HydratingResultSet;
use Laminas\Db\TableGateway\AbstractTableGateway;
use Laminas\Hydrator\ClassMethodsHydrator;


use Expedientes\Model\Entity\ExpedientesEntity;
use Laminas\Db\Sql\Expression as Expression;
use RuntimeException;


class TrasladosTable extends AbstractTableGateway
{
	protected $adapter;          		# adapter to use to connect to the database
	protected $table = 'traslado';  	# our table. one we want to store data in

	public function __construct(Adapter $adapter)
	{
		$this->adapter = $adapter;
		$this->initialize();
	}

	public function listarTodos()
	{
		try {
			$sqlQuery = $this->sql->select();
			$sqlStmt = $this->sql->prepareStatementForSqlObject($sqlQuery);
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

	public function listarID($id)
	{	
		$sqlQuery = $this->sql->select()->where(['idExpedientes' => $id]);
		$sqlStmt = $this->sql->prepareStatementForSqlObject($sqlQuery);
		$handler = $sqlStmt->execute();
		return $handler;
	}

	public function guardar(array $data)
	{
		$dataFamiliares = [
			'Pacientes_idPacientes'         => $data['Pacientes_idPacientes'],
			'nombreCompletoF'                => $data['nombreCompletoF'],
			'domicilio'                     => $data['domicilio'],
			'colonia'                       => $data['colonia'],
			'telefono'                      => $data['telefono'],
			'celular'                       => $data['celular'],
			'telefonoTrabajo'               => $data['telefonoTrabajo'],
		];

		$sqlQuery = $this->sql->insert()->values($dataFamiliares);
		$sqlStmt  = $this->sql->prepareStatementForSqlObject($sqlQuery);
		return $sqlStmt->execute();
		// SELECT PARA OBTERNER EL ULTIMO ID INSERTADO DE PACIENTES
		/*$sqlSelect = $this->sql->select()
		->columns(['id' => new Expression('@@identity')]);
		$sqlStmts = $this->sql->prepareStatementForSqlObject($sqlSelect);
		$handler = $sqlStmts->execute();
		return $handler->current();*/
	}
}
