<?php

declare(strict_types=1);

namespace Pacientes\Form\Traslado;

use Laminas\Form\Form;
use Laminas\Form\Element;

class TrasladoForm extends Form
{
	public function __construct($name = null)
	{
		parent::__construct('new-traslado');
		$this->setAttribute('method', 'post');

		# nombreCompleto input field
		$this->add([
			'type' => Element\Hidden::class,
			'name' => 'idsolicitudRescate'
		]);

		# nombreCompleto input field
		$this->add([
			'type' => Element\Text::class,
			'name' => 'nombreCompleto',
			'options' => [
				'label' => 'Nombre Paciente:'
			],
			'attributes' => [
				'required' => true,
				'size' => 40,
				'maxlength' => 40,
				'pattern' => '^[a-zA-ZÀ-ÿñÑ]+( [a-zA-ZÀ-ÿñÑ]+)*$',  # enforcing what type of data we accept
				'data-toggle' => 'tooltip',
				'class' => 'form-control',   # styling the text field
				'title' => 'El Nombre debe constar únicamente de caracteres',
				'placeholder' => 'Ingrese su Nombre Completo..'
			]
		]);
		# edad input field
		$this->add([
			'type' => Element\Text::class,
			'name' => 'edad',
			'options' => [
				'label' => 'Edad:'
			],
			'attributes' => [
				'required' => true,
				'size' => 2,
				'maxlength' => 2,
				'pattern' => '^[0-9]+$',  # enforcing what type of data we accept
				'data-toggle' => 'tooltip',
				'class' => 'form-control',   # styling the text field
				'title' => 'La Edad debe constar de solo números',
				'placeholder' => 'Ingresa su Edad'
			]
		]);
		# parentesco input field
		$this->add([
			'type' => Element\Text::class,
			'name' => 'parentesco',
			'options' => [
				'label' => 'Parentesco:'
			],
			'attributes' => [
				'required' => true,
				'size' => 40,
				'maxlength' => 25,
				'pattern' => '^[a-zA-Z]+$',  # enforcing what type of data we accept
				'data-toggle' => 'tooltip',
				'class' => 'form-control',   # styling the text field
				'title' => 'El Parentesco debe constar de solo caracteres',
				'placeholder' => 'Ingesa Parentesco del Paciente'
			]
		]);
		# dirección input field
		$this->add([
			'type' => Element\Text::class,
			'name' => 'direccion',
			'options' => [
				'label' => 'Dirección:'
			],
			'attributes' => [
				'required' => true,
				'size' => 255,
				'maxlength' => 255,
				'pattern' => '^[a-zA-ZÀ-ÿñÑ]+( [a-zA-ZÀ-ÿñÑ]+)*$',  # enforcing what type of data we accept
				'data-toggle' => 'tooltip',
				'class' => 'form-control',   # styling the text field
				'title' => 'La Dirección debe constar de solo caracteres alfanumericos',
				'placeholder' => 'Ingresa la Dirección'
			]
		]);
		# nombreResposable input field
		$this->add([
			'type' => Element\Text::class,
			'name' => 'nombreResposable',
			'options' => [
				'label' => 'Responsable:'
			],
			'attributes' => [
				'required' => true,
				'size' => 40,
				'maxlength' => 40,
				'pattern' => '^[a-zA-ZÀ-ÿñÑ]+( [a-zA-ZÀ-ÿñÑ]+)*$',  # enforcing what type of data we accept
				'data-toggle' => 'tooltip',
				'class' => 'form-control',   # styling the text field
				'title' => 'El Responsable debe constar de solo caracteres',
				'placeholder' => 'Ingresa el Responsable'
			]
		]);
		# nombreResposable input field
		$this->add([
			'type' => Element\Text::class,
			'name' => 'celular',
			'options' => [
				'label' => 'Celular:'
			],
			'attributes' => [
				'required' => true,
				'size' => 11,
				'maxlength' => 11,
				'pattern' => '^(\(\+?\d{2,3}\)[\*|\s|\-|\.]?(([\d][\*|\s|\-|\.]?){6})(([\d][\s|\-|\.]?){2})?|(\+?[\d][\s|\-|\.]?){8}(([\d][\s|\-|\.]?){2}(([\d][\s|\-|\.]?){2})?)?)$/',  # enforcing what type of data we accept
				'data-toggle' => 'tooltip',
				'class' => 'form-control',   # styling the text field
				'title' => 'El Celular debe constar de solo numeros',
				'placeholder' => 'Ingrese el Celular'
			]
		]);
		# folio input field
		$this->add([
			'type' => Element\Text::class,
			'name' => 'folio',
			'options' => [
				'label' => 'Folio 911:'
			],
			'attributes' => [
				'required' => true,
				'size' => 40,
				'maxlength' => 25,
				'pattern' => '^[a-zA-Z0-9]+$',  # enforcing what type of data we accept
				'data-toggle' => 'tooltip',
				'class' => 'form-control',   # styling the text field
				'title' => 'El folio debe constar de solo números',
				'placeholder' => 'Ingresa el Folio del 911'
			]
		]);
		# operadora input field
		$this->add([
			'type' => Element\Text::class,
			'name' => 'operadora',
			'options' => [
				'label' => 'Operadora 911:'
			],
			'attributes' => [
				'required' => true,
				'size' => 40,
				'maxlength' => 25,
				'pattern' => '^[a-zA-Z0-9]+$',  # enforcing what type of data we accept
				'data-toggle' => 'tooltip',
				'class' => 'form-control',   # styling the text field
				'title' => 'La Operadora debe constar de solo caracteres alfanumericos',
				'placeholder' => 'Ingresa Operadora 911'
			]
		]);
		# operadora input field
		$this->add([
			'type' => Element\Text::class,
			'name' => 'costo',
			'options' => [
				'label' => 'Costo:'
			],
			'attributes' => [
				'required' => true,
				'size' => 3,
				'maxlength' => 3,
				'pattern' => '^[0-9]+$',  # enforcing what type of data we accept
				'data-toggle' => 'tooltip',
				'class' => 'form-control',   # styling the text field
				'title' => 'El costo debe constar de solo numeros',
				'placeholder' => 'Ingresa el Costo del Traslado'
			]
		]);

		# cross-site-request forgery (csrf) field
		/*$this->add([
			'type' => Element\Csrf::class,
			'name' => 'csrf',
			'options' => [
				'csrf_options' => [
					'timeout' => 600,  # 5 minutes
				]
			]
		]);*/

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

