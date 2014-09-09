<?php namespace App\Modules\Clcs\Models;

use Validator;

class Clc extends \Eloquent{
	public $errores;
	protected $fillable = array('no_afectacion','no_control','cve_presupuestal','descripcion','referencia','fecha_ref','proveedor','rfc','importe','iva','total','signo','folio');
	protected $table = 'clcs';

	public function isValid($data){
		$rules = array(
			'no_afectacion' 	=> 'required'
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

