<?php

declare(strict_types=1);

namespace Familiares\Model\Table;

use Laminas\Db\Adapter\Adapter;
use Laminas\Db\ResultSet\HydratingResultSet;
use Laminas\Db\TableGateway\AbstractTableGateway;
use Laminas\Hydrator\ClassMethodsHydrator;

use Pacientes\Model\Entity\IngresoEntity;
use Familiares\Model\Entity\FamiliaresEntity;
use Laminas\Db\Sql\Expression as Expression;

class FamiliaresTable extends AbstractTableGateway
{
	protected $adapter;          		# adapter to use to connect to the database
	protected $table = 'Familiares';  	# our table. one we want to store data in

	public function __construct(Adapter $adapter)
	{
		$this->adapter = $adapter;
		$this->initialize();
	}

	public function listarTodosFamilias()
	{
		$sqlQuery = $this->sql->select()->join('pacientes', 'pacientes.idPacientes='.$this->table.'.Pacientes_idPacientes',
		     ['nombreCompleto'])		    
		    ->order('pacientes.idPacientes ASC');
			
		$sqlStmt = $this->sql->prepareStatementForSqlObject($sqlQuery);
		//print_r($sqlStmt);	
		$handler = $sqlStmt->execute();
		$classMethod = new ClassMethodsHydrator();
		$entity      = new FamiliaresEntity();
		$resultSet   = new HydratingResultSet($classMethod, $entity);

		$resultSet->initialize($handler);

		return $resultSet;
		
	}





	public function guardar(array $data)
	{		
		$dataFamiliares= [
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
