<?php

declare(strict_types=1);

namespace Prestamos\Form\Prestamos;

use Laminas\Form\Form;
use Laminas\Form\Element;

class PrestamosForm extends Form
{
	/*idprestamos int(11) PK 
	idExpedientes int(11) 
	idIngresos int(11) 
	idPacientes int(11) 
	prestamo_monto double 
	taza_interes varchar(45) 
	plazo enum('Semanal','Quincenal') 
	amortización varchar(45) 
	concepto varchar(60) 
	status enum('Pendiente','Pagado') 
	fecha_prestamo timestamp*/

	public function __construct($name = null)
	{
		parent::__construct('new-familiares');
		$this->setAttribute('method', 'post');

		# idcitas input field
		$this->add([
			'type' => Element\Hidden::class,
			'name' => 'idprestamos'
		]);
		# idExpedientes input field
		$this->add([
			'type' => Element\Hidden::class,
			'name' => 'idExpedientes'
		]);
		# idIngresos input field
		$this->add([
			'type' => Element\Hidden::class,
			'name' => 'idIngresos'
		]);
		# idPacientes input field
		$this->add([
			'type' => Element\Hidden::class,
			'name' => 'idPacientes'
		]);
		# prestamo_monto input field
		$this->add([
			'type' => Element\Text::class,
			'name' => 'prestamo_monto',
			'options' => [
				'label' => 'Monto Prestamo:'
			],
			'attributes' => [
				'required' => true,
				'size' => 255,
				'maxlength' => 255,
				'pattern' => '^[0-9Aa-Zz]+$',  # enforcing what type of data we accept
				'data-toggle' => 'tooltip',
				'class' => 'form-control',   # styling the text field
				'title' => 'Monto del Prestamo',
				'placeholder' => '$00.00'
			]
		]);
		# taza_interes input field
		$this->add([
			'type' => Element\Text::class,
			'name' => 'taza_interes',
			'options' => [
				'label' => 'Taza de Interes:'
			],
			'attributes' => [
				'required' => true,
				'size' => 255,
				'maxlength' => 255,
				'pattern' => '^[0-9Aa-Zz]+$',  # enforcing what type of data we accept
				'data-toggle' => 'tooltip',
				'class' => 'form-control',   # styling the text field
				'title' => 'Interes',
				'placeholder' => '0%'
			]
		]);
		#plazo input field
		$this->add([
			'type' => Element\Select::class,
			'name' => 'plazo',
			'options' => [
				'label' => 'Plazo:',
				'empty_option' => 'Selecciona como acude...',
				'value_options' => [
					'Semanal' => 'Semanal',
					'Quincenal' => 'Quincenal',
				],
			],
			'attributes' => [
				'required' => true,
				'class' => 'custom-select', # styling
			]
		]);
		# amortización input field
		$this->add([
			'type' => Element\Select::class,
			'name' => 'amortización',
			'options' => [
				'label' => 'Amortización:'
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
		# concepto input field
		$this->add([
			'type' => Element\Textarea::class,
			'name' => 'concepto',
			'options' => [
				'label' => 'Concepto:'
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