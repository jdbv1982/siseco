<?php namespace App\Modules\Contratistas\Models;

use Validator;

class Contratista extends \Eloquent{
	public $errores;
	protected $fillable = array('numero','rfc','razsoc','domicilio','repleg','telefonos','correo','celular','tipoid','idusuario');
	protected $table = 'contratistas';

	public function isValid($data){
		$rules = array(
			'razsoc' 		=> 'required'
		);

		$validar = Validator::make($data, $rules);
		if($validar->passes()){
			return true;
		}

		$this->errores = $validar->errors();
		return false;
	}

	public function validAndSave($data){
		if($this->isValid($data)){
			$this->fill($data);
			$this->save();
			return true;
		}
		return false;
	}
}
