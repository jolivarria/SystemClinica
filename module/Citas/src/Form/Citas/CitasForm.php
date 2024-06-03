<?php

declare(strict_types=1);

namespace Citas\Form\Citas;

use Laminas\Form\Form;
use Laminas\Form\Element;

class CitasForm extends Form
{
	/*idcitas int(11) AI PK 
idPacientes int(11) 
idExpedientes int(11) 
motivo varchar(155) 
observaciones text 
ubicacion varchar(45) 
estado tinyint(4) 
fecha datetime 
fechaCaptura timestamp*/

	public function __construct($name = null)
	{
		parent::__construct('new-familiares');
		$this->setAttribute('method', 'post');

		# idcitas input field
		$this->add([
			'type' => Element\Hidden::class,
			'name' => 'idcitas'
		]);
		# idPacientes input field
		$this->add([
			'type' => Element\Hidden::class,
			'name' => 'idPacientes'
		]);
		# idExpedientes input field
		$this->add([
			'type' => Element\Hidden::class,
			'name' => 'idExpedientes'
		]);
		# motivo input field
		$this->add([
			'type' => Element\Textarea::class,
			'name' => 'motivo',
			'options' => [
				'label' => 'Motivo de Cita:'
			],
			'attributes' => [
				'required' => true,
				'size' => 255,
				'maxlength' => 255,
				'pattern' => '^[0-9Aa-Zz]+$',  # enforcing what type of data we accept
				'data-toggle' => 'tooltip',
				'class' => 'form-control',   # styling the text field
				'title' => 'Motivos de la cita o consulta',
				'placeholder' => 'Motivos de la cita o consulta'
			]
		]);
		# observaciones input field
		$this->add([
			'type' => Element\Textarea::class,
			'name' => 'observaciones',
			'options' => [
				'label' => 'Observaciones de Cita:'
			],
			'attributes' => [
				'required' => true,
				'size' => 255,
				'maxlength' => 255,
				'pattern' => '^[0-9Aa-Zz]+$',  # enforcing what type of data we accept
				'data-toggle' => 'tooltip',
				'class' => 'form-control',   # styling the text field
				'title' => 'Observación de la cita',
				'placeholder' => 'Observación de la cita o consulta'
			]
		]);
		# observaciones input field
		$this->add([
			'type' => Element\Text::class,
			'name' => 'ubicacion',
			'options' => [
				'label' => 'Ubicación de Cita:'
			],
			'attributes' => [
				'required' => true,
				'size' => 255,
				'maxlength' => 255,
				'pattern' => '^[0-9Aa-Zz]+$',  # enforcing what type of data we accept
				'data-toggle' => 'tooltip',
				'class' => 'form-control',   # styling the text field
				'title' => 'Ubicación de la cita',
				'placeholder' => 'Ubicación de la cita o consulta'
			]
		]);
		#<input type="text" class="form-control datetimepicker-input" data-target="#reservationdatetime">
		# fecha input field
		$this->add([
			'type' => Element\Text::class,
			'name' => 'fecha',
			'options' => [
				'label' => 'fecha de la Cita:'
			],
			'attributes' => [
				'required' => true,
				'size' => 255,
				'maxlength' => 255,
				'pattern' => '^[0-9Aa-Zz]+$',  # enforcing what type of data we accept
				'data-target' => '#reservationdatetime',
				'data-toggle' => 'tooltip',
				'class' => 'form-control datetimepicker-input',   # styling the text field
				'title' => 'Selecciona una fecha y hora',
				'placeholder' => 'Selecciona una fecha y hora'
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