<?php

declare(strict_types=1);

namespace Expedientes\Form\Expedientes;

use Laminas\Form\Form;
use Laminas\Form\Element;

class ExpedientesForm extends Form
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
			'name' => 'idExpedientes'
		]);
		# costo input field
		$this->add([
			'type' => Element\Text::class,
			'name' => 'costo',
			'options' => [
				'label' => 'Costo:'
			],
			'attributes' => [
				'required' => true,
				'size' => 5,
				'maxlength' => 5,
				'pattern' => '^[0-9]+$',  # enforcing what type of data we accept
				'data-toggle' => 'tooltip',
				'class' => 'form-control',   # styling the text field
				'title' => 'El costo debe constar de solo numeros',
				'placeholder' => '$0000'
			]
		]);
		

		# submit button
		$this->add([
			'type' => Element\Submit::class,
			'name' => 'btnGuardar',
			'attributes' => [
				'value' => 'Guardar...',
				'class' => 'btn btn-primary float-right'
			]
		]);
	}

}