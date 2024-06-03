<?php

declare(strict_types=1);

namespace Familiares\Form\Familiares;

use Laminas\Form\Form;
use Laminas\Form\Element;

class FamiliaresForm extends Form
{
	/*idFamiliares int(11) AI PK 
	Pacientes_idPacientes int(11) 
	nombreCompletoF varchar(45) 
	domicilio varchar(45) 
	colonia varchar(45) 
	telefono varchar(45) 
	celular varchar(45) 
	telefonoTrabajo varchar(45)*/

	public function __construct($name = null)
	{
		parent::__construct('new-familiares');
		$this->setAttribute('method', 'post');

		# idFamiliares input field
		$this->add([
			'type' => Element\Hidden::class,
			'name' => 'idFamiliares'
		]);
		# Pacientes_idPacientes input field
		$this->add([
			'type' => Element\Hidden::class,
			'name' => 'Pacientes_idPacientes'
		]);
		
		# nombreCompleto input field
		$this->add([
			'type' => Element\Text::class,
			'name' => 'nombreCompletoF',
			'options' => [
				'label' => 'Nombre Familiar:'
			],
			'attributes' => [
				'required' => true,
				'size' => 40,
				'maxlength' => 40,
				'pattern' => '^[a-zA-ZÀ-ÿñÑ]+( [a-zA-ZÀ-ÿñÑ]+)*$',  # enforcing what type of data we accept
				'data-toggle' => 'tooltip',
				'class' => 'form-control',   # styling the text field
				'title' => 'El Nombre del familiar debe constar únicamente de caracteres',
				'placeholder' => 'Ingrese su Nombre Completo..'
			]
		]);
		
		# domicilio input field
		$this->add([
			'type' => Element\Text::class,
			'name' => 'domicilio',
			'options' => [
				'label' => 'Domicilio:'
			],
			'attributes' => [
				'required' => true,
				'size' => 255,
				'maxlength' => 255,
				'pattern' => '^[.a-zA-ZÀ-ÿñÑ0-9.]+( [a-zA-ZÀ-ÿñÑ0-9.]+)*$',  # enforcing what type of data we accept
				'data-toggle' => 'tooltip',
				'class' => 'form-control',   # styling the text field
				'title' => 'El Domicilio debe constar de solo caracteres alfanumericos',
				'placeholder' => 'Ingresa la domicilio'
			]
		]);
		# colonia input field
		$this->add([
			'type' => Element\Text::class,
			'name' => 'colonia',
			'options' => [
				'label' => 'Colonia:'
			],
			'attributes' => [
				'required' => true,
				'size' => 255,
				'maxlength' => 255,
				'pattern' => '^[.a-zA-ZÀ-ÿñÑ0-9.]+( [a-zA-ZÀ-ÿñÑ0-9.]+)*$',  # enforcing what type of data we accept
				'data-toggle' => 'tooltip',
				'class' => 'form-control',   # styling the text field
				'title' => 'la colonia debe constar de solo caracteres alfanumericos',
				'placeholder' => 'Ingresa la domicilio'
			]
		]);
		

		#telefono input field
		$this->add([
			'type' => Element\Text::class,
			'name' => 'telefono',
			'options' => [
				'label' => 'Teléfono:'
			],
			'attributes' => [
				'required' => true,
				'size' => 15,
				'maxlength' => 15,
				'pattern' => '^[0-9]+$',  # enforcing what type of data we accept
				'data-toggle' => 'tooltip',
				'class' => 'form-control',   # styling the text field
				'title' => 'El teléfono debe constar de solo numeros',
				'placeholder' => 'Ejemplo: 524558235'
			]
		]);
		#celular input field
		$this->add([
			'type' => Element\Text::class,
			'name' => 'celular',
			'options' => [
				'label' => 'Celular:'
			],
			'attributes' => [
				'required' => true,
				'size' => 15,
				'maxlength' => 15,
				'pattern' => '^[0-9]+$',  # enforcing what type of data we accept
				'data-toggle' => 'tooltip',
				'class' => 'form-control',   # styling the text field
				'title' => 'El celular debe constar de solo numeros',
				'placeholder' => 'Ejemplo: 6624023987'
			]
		]);
		#$telefonoTrabajo input field
		$this->add([
			'type' => Element\Text::class,
			'name' => 'telefonoTrabajo',
			'options' => [
				'label' => 'Teléfono de trabajo:'
			],
			'attributes' => [
				'required' => true,
				'size' => 3,
				'maxlength' => 3,
				'pattern' => '^[0-9]+$',  # enforcing what type of data we accept
				'data-toggle' => 'tooltip',
				'class' => 'form-control',   # styling the text field
				'title' => 'El telefono de trabajo debe constar de solo numeros',
				'placeholder' => 'Ingresa el Costo del Traslado'
			]
		]);
		

		# submit button
		$this->add([
			'type' => Element\Submit::class,
			'name' => 'btnGuardar',
			'attributes' => [
				'value' => 'Enviar...',
				'class' => 'btn btn-primary'
			]
		]);
	}

}