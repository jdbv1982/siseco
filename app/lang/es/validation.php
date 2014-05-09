<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| The following language lines contain the default error messages used by
	| the validator class. Some of these rules have multiple versions such
	| such as the size rules. Feel free to tweak each of these messages.
	|
	*/

	"accepted"         => ":attribute debe ser aceptado.",
    "active_url"       => ":attribute no es una URL válida.",
    "after"            => ":attribute debe ser una fecha posterior a :date.",
    "alpha"            => ":attribute sólo debe contener letras.",
    "alpha_dash"       => ":attribute sólo debe contener letras, números y guiones.",
    "alpha_num"        => ":attribute sólo debe contener letras y números.",
    "array"            => ":attribute debe ser un conjunto.",
    "before"           => ":attribute debe ser una fecha anterior a :date.",
    "between"          => array(
        "numeric" => ":attribute tiene que estar entre :min - :max.",
        "file"    => ":attribute debe pesar entre :min - :max kilobytes.",
        "string"  => ":attribute tiene que tener entre :min - :max caracteres.",
        "array"   => ":attribute tiene que tener entre :min - :max ítems.",
    ),
    "confirmed"        => "La confirmación de :attribute no coincide.",
    "date"             => ":attribute no es una fecha válida.",
    "date_format"      => ":attribute no corresponde al formato :format.",
    "different"        => ":attribute y :other deben ser diferentes.",
    "digits"           => ":attribute debe tener :digits digitos.",
    "digits_between"   => ":attribute debe tener entre :min y :max digitos.",
    "email"            => ":attribute no es un e-mail válido",
    "exists"           => ":attribute es inválido.",
    "image"            => ":attribute debe ser una imagen.",
    "in"               => ":attribute es inválido.",
    "integer"          => ":attribute debe ser un número entero.",
    "ip"               => ":attribute debe ser una dirección IP válida.",
    "max"              => array(
        "numeric" => ":attribute no debe ser mayor a :max.",
        "file"    => ":attribute no debe ser mayor que :max kilobytes.",
        "string"  => ":attribute no debe ser mayor que :max characters.",
        "array"   => ":attribute no debe tener más de :max ítems.",
    ),
    "mimes"            => ":attribute debe ser un archivo con formato: :values.",
    "min"              => array(
        "numeric" => "El tamaño de :attribute debe ser de al menos :min.",
        "file"    => "El tamaño de :attribute debe ser de al menos :min kilobytes.",
        "string"  => ":attribute debe contener al menos :min caracteres.",
        "array"   => ":attribute debe tener al menos :min ítems.",
    ),
    "not_in"           => ":attribute es inválido.",
    "numeric"          => ":attribute debe ser numérico.",
    "regex"            => "El formato de :attribute es inválido.",
    "required"         => "El campo :attribute es obligatorio.",
    "required_if"      => "El campo :attribute es obligatorio cuando :other es :value.",
    "required_with"    => "El campo :attribute es obligatorio cuando :values está presente.",
    "required_without" => "El campo :attribute es obligatorio cuando :values no está presente.",
    "same"             => ":attribute y :other deben coincidir.",
    "size"             => array(
        "numeric" => "El tamaño de :attribute debe ser :size.",
        "file"    => "El tamaño de :attribute debe ser :size kilobytes.",
        "string"  => ":attribute debe contener :size caracteres.",
        "array"   => ":attribute debe contener :size ítems.",
    ),
    "unique"           => ":attribute ya ha sido registrado.",
    "url"              => "El formato :attribute es inválido.",

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Here you may specify custom validation messages for attributes using the
	| convention "attribute.rule" to name the lines. This makes it quick to
	| specify a specific custom language line for a given attribute rule.
	|
	*/

	'custom' => array(),

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Attributes
	|--------------------------------------------------------------------------
	|
	| The following language lines are used to swap attribute place-holders
	| with something more reader friendly such as E-Mail Address instead
	| of "email". This simply helps us make messages a little cleaner.
	|
	*/

	'attributes' => array(
        'password'          => 'Contraseña',
        'autorizacion'      => 'Oficio de Autorizacion',
        'ftto'              => 'Fuente de Financiemiento',
        'inv_aut'           => 'Inversion Autorizada',
        'n_obra'            => 'Numero de Obra',
        'd_obra'            => 'Nombre de la Obra',
        'l_idadjudicacion'  => 'Tipo de Adjudicacion',
        'a_afinanciero'     => 'Avance Financiero',
        'd_nombredoc'       => 'Nombre del Archivo',
        'd_urldoc'          => 'Archivo',
        'nombreoficio'      => 'Nombre del Oficio',
        'idobra'            => 'Numero de Obra',
        'l_contrato'        => 'Contrato',
        'numfianza'         => 'Numero de Fianza',
        'numconvenio'       => 'Numero de Convenio',
        'nombreadendo'      => 'Nombre del Adendo',
        'razsoc'            => 'Razon Social o Nombre'
    ),

);
