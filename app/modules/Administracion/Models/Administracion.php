<?php namespace App\Modules\Administracion\Models;

use Validator;

class Administracion extends \Eloquent{
	public $errores;
	protected $fillable = array('idobra','clc','felab','frecp','numfactura','concepto','fianza','spei','ministrado','porc5','porc2','radicado','orden','numcheque','fcheque','montopagado','amort_cred_pte');
	protected $table = 'administracion';

	public function isValid($data){
		$rules = array(
			'idobra' => 'required',
			'clc' => 'required'
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
