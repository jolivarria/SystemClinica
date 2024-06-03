<?php

declare(strict_types=1);

namespace Producto\Model\Table;

use Exception;
use Laminas\Db\RowGateway\RowGateway;
use Laminas\Db\Adapter\Adapter;
use Laminas\Db\ResultSet\HydratingResultSet;
use Laminas\Db\TableGateway\AbstractTableGateway;
use Laminas\Hydrator\ClassMethodsHydrator;

use Laminas\Db\Adapter\Driver\ResultInterface;
use Laminas\Db\ResultSet\ResultSet;
use Producto\Model\Entity\ProductoEntity;
use Laminas\Db\Sql\Expression as Expression;
use RuntimeException;


class ProductoTable extends AbstractTableGateway
{
	protected $adapter;          		# adapter to use to connect to the database
	protected $table = 'Productos';  	# our table. one we want to store data in

	public function __construct(Adapter $adapter)
	{
		$this->adapter = $adapter;
		$this->initialize();
	}

	public function listarTodos($id)
	{
		try {
			$sqlQuery = $this->sql->select()->where(['citas.idPacientes' => $id])
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
			$entity      = new ProductoEntity();
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
			->order('productos.nombre ASC');
			/*$sqlQuery = $this->sql->select()
			->join(
					'pacientes',
					'pacientes.idPacientes=' . $this->table . '.idPacientes',
					['nombreCompleto']
				)->join(
					'ingresos',
					'ingresos.idPacientes=' . $this->table . '.idPacientes',
					['tipoIngreso']
				)->order('pacientes.idPacientes ASC');*/

			$sqlStmt = $this->sql->prepareStatementForSqlObject($sqlQuery);
			($sqlStmt);
			$handler = $sqlStmt->execute();
			$classMethod = new ClassMethodsHydrator();
			$entity      = new ProductoEntity();
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
		$id=$data['idproductos'];
		if ($id === "") {
			$sqlQuery = $this->sql->insert()->values($data);
		}else{
			$sqlQuery = $this->sql->update()->set($data)->where(['idproductos'=> $id]);
		}
		
		$sqlStmt  = $this->sql->prepareStatementForSqlObject($sqlQuery);
		return $sqlStmt->execute();
		// SELECT PARA OBTERNER EL ULTIMO ID INSERTADO DE PACIENTES
		/*$sqlSelect = $this->sql->select()
		->columns(['id' => new Expression('@@identity')]);
		$sqlStmts = $this->sql->prepareStatementForSqlObject($sqlSelect);
		$handler = $sqlStmts->execute();
		return $handler->current();*/
	}

	public function obtenerProducto($idproductos)
	{
		$id = (int) $idproductos;
		$sqlQuery = $this->sql->select()->where(['idproductos' => $id]);
		$sqlStmt  = $this->sql->prepareStatementForSqlObject($sqlQuery);
		$handler  = $sqlStmt->execute();
		
		if (!$handler) {
			throw new RuntimeException(sprintf(
				'Could not find row with identifier %d',
				$id
			));
		}
		$classMethod = new ClassMethodsHydrator();
		$entity      = new ProductoEntity();
		$resultSet   = new HydratingResultSet($classMethod, $entity);
		$resultSet->initialize($handler);
		return $resultSet->current();
	}

	public function eliminarProducto($id)
	{
		try{
			$sqlQuery = $this->sql->delete()->where(['idproductos'=>$id]);
			$sqlStmt = $this->sql->prepareStatementForSqlObject($sqlQuery);
			return $sqlStmt->execute();
		}catch (RuntimeException $exception) {
			return $exception->getMessage();
		}
		
	}
}
