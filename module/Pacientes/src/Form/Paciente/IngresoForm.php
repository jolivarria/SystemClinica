<?php

declare(strict_types=1);

namespace Pacientes\Form\Paciente;

use Laminas\Form\Form;
use Laminas\Form\Element;

class IngresoForm extends Form
{
	public function __construct($name = null)
	{
		parent::__construct('new-ingreso');
		$this->setAttribute('method', 'post');

		# nombreCompleto input field
		$this->add([
			'type' => Element\Hidden::class,
			'name' => 'idPacientes'
		]);

		# nombreCompleto input field
		$this->add([
			'type' => Element\Hidden::class,
			'name' => 'idIngresos'
		]);
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
		# birth day select field
		$this->add([
			'type' => Element\DateSelect::class,
			'name' => 'fechaNac',
			'options' => [
				'label' => 'Selecciona la fecha de nacimiento:',
				'create_empty_option' => true,
				'max_year' => date('Y') - 13, # here we want users over the age of 13 only
				'render_delimiters' => false,
				'year_attributes' => [
					'class' => 'custom-select w-30'
				],
				'month_attributes' => [
					'class' => 'custom-select w-30'
				],
				'day_attributes' => [
					'class' => 'custom-select w-30',
					'id' => 'day'
				],
			],
			'attributes' => [
				'required' => true
			]
		]);
		
		# gender select field
		$this->add([
			'type' => Element\Select::class,
			'name' => 'sexo',
			'options' => [
				'label' => 'Genero:',
				'empty_option' => 'Seleccione sexo...',
				'value_options' => [
					'Femenino' => 'Femenino',
					'Masculino' => 'Masculino',
					'Otro' => 'Otro'
				],
			],
			'attributes' => [
				'required' => true,
				'class' => 'custom-select', # styling
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
				'pattern' => '^[.a-zA-ZÀ-ÿñÑ0-9.]+( [a-zA-ZÀ-ÿñÑ0-9.]+)*$',  # enforcing what type of data we accept
				'data-toggle' => 'tooltip',
				'class' => 'form-control',   # styling the text field
				'title' => 'La Dirección debe constar de solo caracteres alfanumericos',
				'placeholder' => 'Ingresa la Dirección'
			]
		]);
		# escolardad input field
		$this->add([
			'type' => Element\Text::class,
			'name' => 'escolardiad',
			'options' => [
				'label' => 'Escolaridad:'
			],
			'attributes' => [
				'required' => true,
				'size' => 40,
				'maxlength' => 40,
				'pattern' => '^[a-zA-ZÀ-ÿñÑ]+( [a-zA-ZÀ-ÿñÑ]+)*$',  # enforcing what type of data we accept
				'data-toggle' => 'tooltip',
				'class' => 'form-control',   # styling the text field
				'title' => 'El Responsable debe constar de solo caracteres',
				'placeholder' => 'Ingresa la escolaridad'
			]
		]);

		# nombreResposable input field
		$this->add([
			'type' => Element\Text::class,
			'name' => 'ocupacion',
			'options' => [
				'label' => 'Ocupacion:'
			],
			'attributes' => [
				'required' => true,
				'size' => 40,
				'maxlength' => 40,
				'pattern' => '^[a-zA-ZÀ-ÿñÑ]+( [a-zA-ZÀ-ÿñÑ]+)*$',  # enforcing what type of data we accept
				'data-toggle' => 'tooltip',
				'class' => 'form-control',   # styling the text field
				'title' => 'La ocupación debe constar de solo caracteres',
				'placeholder' => 'Ingresa la ocupación'
			]
		]);
		#estadoCivil input field
		$this->add([
			'type' => Element\Select::class,
			'name' => 'estadoCivil',
			'options' => [
				'label' => 'Estado Civil:',
				'empty_option' => 'Selecciona el estado civil...',
				'value_options' => [
					'Casado' => 'Casado',
					'Separado' => 'Separado',
					'Soltero' => 'Soltero',
					'Divorciado' => 'Divorciado'
				],
			],
			'attributes' => [
				'required' => true,
				'class' => 'custom-select', # styling
			]
		]);
		# nacionalidad input field
		$this->add([
			'type' => Element\Text::class,
			'name' => 'nacionalidad',
			'options' => [
				'label' => 'Nacionalidad:'
			],
			'attributes' => [
				'required' => true,
				'size' => 40,
				'maxlength' => 25,
				'pattern' => '^[a-zA-Z]+$',  # enforcing what type of data we accept
				'data-toggle' => 'tooltip',
				'class' => 'form-control',   # styling the text field
				'title' => 'La nacionalidad debe constar de solo números',
				'placeholder' => 'Eje. Méxicano'
			]
		]);
		# estado input field
		$this->add([
			'type' => Element\Text::class,
			'name' => 'estado',
			'options' => [
				'label' => 'Estado:'
			],
			'attributes' => [
				'required' => true,
				'size' => 40,
				'maxlength' => 25,
				'pattern' => '^[a-zA-Z0-9]+$',  # enforcing what type of data we accept
				'data-toggle' => 'tooltip',
				'class' => 'form-control',   # styling the text field
				'title' => 'El estado debe constar de solo caracteres alfanumericos',
				'placeholder' => 'Ejemplo Sonora'
			]
		]);
		# $municipio input field
		$this->add([
			'type' => Element\Text::class,
			'name' => 'municipio',
			'options' => [
				'label' => 'Municipio:'
			],
			'attributes' => [
				'required' => true,
				'size' => 15,
				'maxlength' => 15,
				'pattern' => '^[a-zA-Z]+$',  # enforcing what type of data we accept
				'data-toggle' => 'tooltip',
				'class' => 'form-control',   # styling the text field
				'title' => 'El costo debe constar de solo numeros',
				'placeholder' => 'Ejemplo: Herosillo'
			]
		]);
		# $codigoPostal input field
		$this->add([
			'type' => Element\Text::class,
			'name' => 'codigoPostal',
			'options' => [
				'label' => 'Código Postal:'
			],
			'attributes' => [
				'required' => true,
				'size' => 3,
				'maxlength' => 3,
				'pattern' => '^[0-9]+$',  # enforcing what type of data we accept
				'data-toggle' => 'tooltip',
				'class' => 'form-control',   # styling the text field
				'title' => 'El código postal debe constar de solo numeros',
				'placeholder' => 'Ejmplo: 83290'
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
		#$serviciosMedicos input field
		$this->add([
			'type' => Element\Select::class,
			'name' => 'serviciosMedicos',
			'options' => [
				'label' => 'Servicio Medicos:',
				'empty_option' => 'Select...',
				'value_options' => [
					'1' => 'Si',
					'0' => 'No',
				],
			],
			'attributes' => [
				'required' => true,
				'class' => 'custom-select', # styling
			]
		]);
		#$tipoServicioMedico input field
		$this->add([
			'type' => Element\Text::class,
			'name' => 'tipoServicioMedico',
			'options' => [
				'label' => 'Tipo de Servicos Medicos:'
			],
			'attributes' => [
				'required' => true,
				'size' => 3,
				'maxlength' => 3,
				'pattern' => '^[0-9]+$',  # enforcing what type of data we accept
				'data-toggle' => 'tooltip',
				'class' => 'form-control',   # styling the text field
				'title' => 'El tipo de servicios medicos de trabajo debe constar de solo numeros',
				'placeholder' => 'Ingresa el Costo del Traslado'
			]
		]);




		#tipoIngreso input field
		$this->add([
			'type' => Element\Select::class,
			'name' => 'tipoIngreso',
			'options' => [
				'label' => 'Tipo de Ingreso:',
				'empty_option' => 'Selecciona el Ingreso...',
				'value_options' => [
					'Voluntario' => 'Voluntario',
					'Involuntario' => 'Involuntario',
					'Obligatorio' => 'Obligatorio',
				],
			],
			'attributes' => [
				'required' => true,
				'class' => 'custom-select', # styling
			]
		]);
		#$referencia input field
		$this->add([
			'type' => Element\Select::class,
			'name' => 'referencia',
			'options' => [
				'label' => 'Tipo de Referencia:',
				'empty_option' => 'Selecciona el referencia...',
				'value_options' => [
					'Domicilio Particular' => 'Domicilio Particular',
					'Institucion Publica' => 'Institucion Publica',
					'Institución Privada' => 'Institución Privada',
					'Hospital Psiquiátrico' => 'Hospital Psiquiátrico',
					'Centro De Readaptación Social ' => 'Centro De Readaptación Social ',
				],
			],
			'attributes' => [
				'required' => true,
				'class' => 'custom-select', # styling
			]
		]);
		#acude input field
		$this->add([
			'type' => Element\Select::class,
			'name' => 'acude',
			'options' => [
				'label' => 'Como acude:',
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
/*
Tabla familairaes 
*/
		#familiares
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
				'title' => 'El Nombre debe constar únicamente de caracteres',
				'placeholder' => 'Ingrese el Nombre del Familiar..'
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
				'pattern' => '^[a-zA-ZÀ-ÿñÑ]+( [a-zA-ZÀ-ÿñÑ]+)*$',  # enforcing what type of data we accept
				'data-toggle' => 'tooltip',
				'class' => 'form-control',   # styling the text field
				'title' => 'La Dirección debe constar de solo caracteres alfanumericos',
				'placeholder' => 'Ingresa la Colonia'
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
				'pattern' => '^[a-zA-ZÀ-ÿñÑ0-9.]+( [a-zA-ZÀ-ÿñÑ0-9.]+)*$',  # enforcing what type of data we accept
				'data-toggle' => 'tooltip',
				'class' => 'form-control',   # styling the text field
				'title' => 'La Dirección debe constar de solo caracteres alfanumericos',
				'placeholder' => 'Ingresa la Dirección'
			]
		]);
		#$telefonoF
		$this->add([
			'type' => Element\Text::class,
			'name' => 'telefonoF',
			'options' => [
				'label' => 'Teléfono casa:'
			],
			'attributes' => [
				'required' => true,
				'size' => 20,
				'maxlength' => 20,
				'pattern' => '^[0-9]+$',  # enforcing what type of data we accept
				'data-toggle' => 'tooltip',
				'class' => 'form-control',   # styling the text field
				'title' => 'El telefono de trabajo debe constar de solo numeros',
				'placeholder' => 'Telefono Familiar'
			]
		]);
		#celularF
		$this->add([
			'type' => Element\Text::class,
			'name' => 'celularF',
			'options' => [
				'label' => 'Celular Familiar:'
			],
			'attributes' => [
				'required' => true,
				'size' => 20,
				'maxlength' => 20,
				'pattern' => '^[0-9]+$',  # enforcing what type of data we accept
				'data-toggle' => 'tooltip',
				'class' => 'form-control',   # styling the text field
				'title' => 'El telefono de trabajo debe constar de solo numeros',
				'placeholder' => 'Telefono Familiar'
			]
		]);
		#$telefonoTrabajoF
		$this->add([
			'type' => Element\Text::class,
			'name' => 'telefonoTrabajoF',
			'options' => [
				'label' => 'Teléfono de trabajo familiar:'
			],
			'attributes' => [
				'required' => true,
				'size' => 20,
				'maxlength' => 20,
				'pattern' => '^[0-9]+$',  # enforcing what type of data we accept
				'data-toggle' => 'tooltip',
				'class' => 'form-control',   # styling the text field
				'title' => 'El telefono de trabajo debe constar de solo numeros',
				'placeholder' => 'Telefono Familiar'
			]
		]);
		/*
	Tabla Familiares
	Pacientes_idPacientes int(11) 
	nombreCompleto varchar(45) 
	domicilio varchar(45) 
	colonia varchar(45) 
	telefono varchar(45) 
	celular varchar(45) 
	telefonoTrabajo varchar(45)

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

	/*public function getTrasladoFormFilter()
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
	}*/
}
