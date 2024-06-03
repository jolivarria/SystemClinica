<?php

declare(strict_types=1);

namespace Pacientes\Model\Table;


use Laminas\Db\Adapter\Adapter;
use Laminas\Db\ResultSet\HydratingResultSet;
use Laminas\Db\TableGateway\AbstractTableGateway;
use Laminas\Filter;
use Laminas\Hydrator\ClassMethodsHydrator;
use Laminas\I18n;
use Laminas\InputFilter;
use Laminas\Validator;
use RuntimeException;
use Pacientes\Model\Entity\TrasladoEntity;
use Laminas\Db\TableGateway\TableGatewayInterface;

class TrasladoTable extends AbstractTableGateway
{
	protected $adapter;          				# adapter to use to connect to the database
	protected $table = 'solicitudrescate';  	# our table. one we want to store data in
	
	public function __construct(Adapter $adapter)
	{
		$this->adapter = $adapter;
		$this->initialize();
	}

	public function listarTodosTraslados()
	{
		$sqlQuery = $this->sql->select()->where(['estado' => 1]);
		$sqlStmt = $this->sql->prepareStatementForSqlObject($sqlQuery);
		$handler = $sqlStmt->execute();
		//print_r($handler);
		$classMethod = new ClassMethodsHydrator();
		$entity      = new TrasladoEntity();
		$resultSet   = new HydratingResultSet($classMethod, $entity);
		$resultSet->initialize($handler);
		return $resultSet;
	}

	public function guardarTraslados(array $data)
	{
		$timeNow = date('Y-m-d H:i:s');
		$values = [
			'idsolicitudRescate' 	=> $data['idsolicitudRescate'],
			'nombreCompleto' 		=> $data['nombreCompleto'],
			'edad'       			=> $data['edad'],
			'parentesco' 			=> $data['parentesco'], # encrypt/hash password
			'direccion'  			=> $data['direccion'],
			'nombreResposable'   	=> $data['nombreResposable'],
			'celular'				=> $data['celular'],
			'folio'      			=> $data['folio'],
			'operadora'  			=> $data['operadora'],
			'costo'      			=> $data['costo'],
			'fechaCreacion' 		=> $timeNow,
		];

		if($values['idsolicitudRescate']==='')
		{
			$sqlQuery = $this->sql->insert()->values($values);
			$sqlStmt  = $this->sql->prepareStatementForSqlObject($sqlQuery);
			return $sqlStmt->execute();
		}
		else
		{
			$sqlQuery = $this->sql->update()->set($values)->where(['idsolicitudRescate' => $values['idsolicitudRescate']]);
			$sqlStmt  = $this->sql->prepareStatementForSqlObject($sqlQuery);
			return $sqlStmt->execute();
		}

	}

	public function borrarTraslado($id)
	{
		$sqlQuery = $this->sql->update()->set(['estado'=>0])->where(['idsolicitudRescate' => $id]);
		$sqlStmt = $this->sql->prepareStatementForSqlObject($sqlQuery);
		return $sqlStmt->execute();
	}
	public function editarTraslado($id)
	{
		$id = (int) $id;
		$sqlQuery = $this->sql->select()->where(['idsolicitudRescate' => $id]);
		$sqlStmt  = $this->sql->prepareStatementForSqlObject($sqlQuery);
		$handler  = $sqlStmt->execute();
		if (!$handler) {
			throw new RuntimeException(sprintf(
				'Could not find row with identifier %d',
				$id
			));
		}
		$classMethod = new ClassMethodsHydrator();
		$entity      = new TrasladoEntity();
		$resultSet   = new HydratingResultSet($classMethod, $entity);
		$resultSet->initialize($handler);
		return $resultSet->current();
	}
	public function detalleTraslado($id)
	{
		$sqlQuery = $this->sql->select()->where(['idsolicitudRescate' => $id]);
		$sqlStmt  = $this->sql->prepareStatementForSqlObject($sqlQuery);
		$handler  = $sqlStmt->execute()->current();
		return $handler;
	}


	public function getTrasladoFormFilter()
	{
		$inputFilter = new InputFilter\InputFilter();
		$factory = new InputFilter\Factory();

		# filter and validate username input field
		$inputFilter->add(
			$factory->createInput(
				[
					'name' => 'nombreCompleto',
					'required' => true,
					'validators' => [
						['name' => Validator\NotEmpty::class],
						[
							'name' => Validator\StringLength::class,
							'options' => [
								'min' => 15,
								'max' => 50,
								'messages' => [

									Validator\StringLength::TOO_SHORT => 'El nombre completo debe tener al menos 15 caracteres.',
									Validator\StringLength::TOO_LONG => 'El nombre completo debe tener como máximo 50 caracteres.',
								],
							],
						],

						
					],
				]
			)
		);
		# filter and validate birthday dateselect field
		$inputFilter->add(
			$factory->createInput(
				[
					'name' => 'edad',
					'required' => true,
					'filters' => [
						['name' => Filter\StripTags::class], # stips html tags
						['name' => Filter\StringTrim::class], # removes empty spaces
						['name' => Filter\StringTrim::class], # removes empty spaces
					],
					'validators' => [
						['name' => Validator\NotEmpty::class],
						[
							'name' => I18n\Validator\IsInt::class,
							'options' => [
								'messages' => [
									I18n\Validator\IsInt::NOT_INT => 'La edad debe de ser solo numeros',
								],
							],
						],
						[
							'name' => Validator\StringLength::class,
							'options' => [
								'min' => 2,
								'max' => 2,
								'messages' => [

									Validator\StringLength::TOO_SHORT => 'La edad debe tener como minimo 2 digitos.',
									Validator\StringLength::TOO_LONG => 'La edad debe tener maximo 2 Numeros.',
								],
							],
						],
					],
				]
			)
		);

		#validar parentesco 
		$inputFilter->add(
			$factory->createInput(
				[
					'name' => 'parentesco',
					'required' => true,
					'filters' => [
						['name' => Filter\StripTags::class], # stips html tags						
						['name' => I18n\Filter\Alnum::class], # allows only [a-zA-Z0-9] characters
					],
					'validators' => [
						['name' => Validator\NotEmpty::class],
						[
							'name' => Validator\StringLength::class,
							'options' => [
								'min' => 4,
								'max' => 15,
								'messages' => [

									Validator\StringLength::TOO_SHORT => 'El parentesco debe contener como minimo 4 caracteres',
									Validator\StringLength::TOO_LONG => 'El parentesco debe contener como maximo 15 caracteres.',
								],
							],
						],
						[
							'name' => I18n\Validator\Alnum::class,
							'options' => [
								'messages' => [
									I18n\Validator\Alnum::NOT_ALNUM => 'El parentesco debe constar únicamente de caracteres alfanuméricos',
								],
							],
						],
					],
				]
			)
		);

		#validar Direccion 
		$inputFilter->add(
			$factory->createInput(
				[
					'name' => 'direccion',
					'required' => true,
					'filters' => [
						['name' => Filter\StripTags::class], # stips html tags
					],
					'validators' => [
						['name' => Validator\NotEmpty::class],
						[
							'name' => Validator\StringLength::class,
							'options' => [
								'min' => 20,
								'max' => 100,
								'messages' => [
									Validator\StringLength::TOO_SHORT => 'La Dirección debe contener como minimo 20 caracteres',
									Validator\StringLength::TOO_LONG => 'La Dirección debe contener como minimo 100 caracteres',
								],
							],
						],
					],
				]
			)
		);

		#validar nombreResposable 
		$inputFilter->add(
			$factory->createInput(
				[
					'name' => 'nombreResposable',
					'required' => true,
					'filters' => [
						['name' => Filter\StripTags::class], # stips html tags
					],
					'validators' => [
						['name' => Validator\NotEmpty::class],
						[
							'name' => Validator\StringLength::class,
							'options' => [
								'min' => 15,
								'max' => 50,
								'messages' => [

									Validator\StringLength::TOO_SHORT => 'La nombre del responsable debe contener como minimo 15 caracteres',
									Validator\StringLength::TOO_LONG => 'La nombre del responsable debe contener como minimo 50 caracteres',
								],
							],
						],
					],
				]
			)
		);

		#validar folio 
		$inputFilter->add(
			$factory->createInput(
				[
					'name' => 'folio',
					'required' => true,
					'filters' => [
						['name' => Filter\StripTags::class], # stips html tags
						['name' => Filter\StringTrim::class], # removes empty spaces
						['name' => I18n\Filter\Alnum::class], # allows only [a-zA-Z0-9] characters
					],
					'validators' => [
						['name' => Validator\NotEmpty::class],
						[
							'name' => Validator\StringLength::class,
							'options' => [
								'min' => 5,
								'max' => 10,
								'messages' => [

									Validator\StringLength::TOO_SHORT => 'El folio debe contener como minimo 5 caracteres',
									Validator\StringLength::TOO_LONG => 'El folio  debe contener como minimo 10 caracteres',
								],
							],
						],
						[
							'name' => I18n\Validator\Alnum::class,
							'options' => [
								'messages' => [
									I18n\Validator\Alnum::NOT_ALNUM => 'El folio debe constar de solo caracteres alfanumericos',
								],
							],
						],
					],
				]
			)
		);

		#validar folio 
		$inputFilter->add(
			$factory->createInput(
				[
					'name' => 'operadora',
					'required' => true,
					'filters' => [
						['name' => Filter\StripTags::class], # stips html tags
						['name' => Filter\StringTrim::class], # removes empty spaces
						['name' => I18n\Filter\Alnum::class], # allows only [a-zA-Z0-9] characters
					],
					'validators' => [
						['name' => Validator\NotEmpty::class],
						[
							'name' => Validator\StringLength::class,
							'options' => [
								'min' => 10,
								'max' => 20,
								'messages' => [

									Validator\StringLength::TOO_SHORT => 'El campo operadora debe contener como minimo 10 caracteres',
									Validator\StringLength::TOO_LONG => 'El campo operadora  debe contener como minimo 20 caracteres',
								],
							],
						],
						[
							'name' => I18n\Validator\Alnum::class,
							'options' => [
								'messages' => [
									I18n\Validator\Alnum::NOT_ALNUM => 'El campo operadora debe constar de solo caracteres alfanumericos',
								],
							],
						],
					],
				]
			)
		);

		# filter and validate birthday dateselect field
		$inputFilter->add(
			$factory->createInput(
				[
					'name' => 'costo',
					'required' => true,
					'filters' => [
						['name' => Filter\StripTags::class], # stips html tags
						['name' => Filter\StringTrim::class], # removes empty spaces
						['name' => Filter\StringTrim::class], # removes empty spaces
					],
					'validators' => [
						['name' => Validator\NotEmpty::class],
						[
							'name' => I18n\Validator\IsInt::class,
							'options' => [
								'messages' => [
									I18n\Validator\IsInt::NOT_INT => 'La costo debe de ser solo numeros',
								],
							],
						],
						[
							'name' => Validator\StringLength::class,
							'options' => [
								'min' => 3,
								'max' => 3,
								'messages' => [

									Validator\StringLength::TOO_SHORT => 'La costo debe tener como minimo 3digitos.',
									Validator\StringLength::TOO_LONG => 'La costo debe tener maximo 3 Numeros.',
								],
							],
						],
					],
				]
			)
		);
		return $inputFilter;
	}
}
