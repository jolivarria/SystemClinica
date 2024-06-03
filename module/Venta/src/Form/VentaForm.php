<?php

declare(strict_types=1);

namespace Venta\Form;

use Laminas\Form\Form;
use Laminas\Form\Element;

class VentaForm extends Form
{
	/*
		idventas int(11) AI PK 
		idExpedientes int(11) 
		fecha datetime 
		total decimal(10,2) 
		estado enum('Pendiente','Pagado','Cancelado')
	*/

	public function __construct($name = null)
	{
		parent::__construct('ventaForm');
		$this->setAttribute('method', 'post');

		# idcitas input field
		$this->add([
			'type' => Element\Hidden::class,
			'name' => 'idventas'
		]);

		#acude input field
		$this->add([
			'type' => Element\Select::class,
			'name' => 'idExpedientes',
			'options' => [
				'label' => 'Selecciona el expediente:',
				'empty_option' => 'Selecciona como acude...',
				'value_options' => [
					'Solo' => 'Solo',
					'Amigo' => 'Amigo',
					'Vecino' => 'Vecino',
					'Familiar' => 'Familiar',
					'Parentesco' => 'Parentesco',
				],
			],
			'attributes' => [
				'required' => true,
				'class' => 'custom-select', # styling
			]
		]);
		# nombre input field
		$this->add([
			'type' => Element\Text::class,
			'name' => 'fecha',
			'options' => [
				'label' => 'Producto o Servicio:'
			],
			'attributes' => [
				'required' => true,
				'size' => 255,
				'maxlength' => 255,
				'pattern' => '^[0-9Aa-Zz]+$',  # enforcing what type of data we accept
				'data-toggle' => 'tooltip',
				'class' => 'form-control',   # styling the text field
				'title' => 'Producto o Servicio',
				'placeholder' => 'Producto o Servicio'
			]
		]);
		# descripcion input field
		$this->add([
			'type' => Element\Textarea::class,
			'name' => 'descripcion',
			'options' => [
				'label' => 'Descripcion:'
			],
			'attributes' => [
				'required' => true,
				'size' => 255,
				'maxlength' => 255,
				'pattern' => '^[0-9Aa-Zz]+$',  # enforcing what type of data we accept
				'data-toggle' => 'tooltip',
				'class' => 'form-control',   # styling the text field
				'title' => 'Descripción Producto',
				'placeholder' => 'Descripción Producto'
			]
		]);
		#tipo input field
		$this->add([
			'type' => Element\Select::class,
			'name' => 'tipo',
			'options' => [
				'label' => 'Tipo:',
				'empty_option' => 'Selecciona tipo de producto o servicio...',
				'value_options' => [
					'Producto' => 'Producto',				
					'Servicio' => 'Servicio',
				],
			],
			'attributes' => [
				'required' => true,
				'class' => 'custom-select', # styling
			]
		]);
		# precio input field
		$this->add([
			'type' => Element\Text::class,
			'name' => 'precio',
			'options' => [
				'label' => 'Precio:'
			],
			'attributes' => [
				'required' => true,
				'size' => 6,
				'maxlength' => 6,
				'pattern' => '^[0-9.00]+$',  # enforcing what type of data we accept
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