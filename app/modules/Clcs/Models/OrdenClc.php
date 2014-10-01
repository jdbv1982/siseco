<?php namespace App\Modules\Clcs\Models;

use Validator;

class OrdenClc extends \Eloquent{
	public $errores;
	protected $fillable = array('orden_id','no_afectacion','clc_referencia');
	protected $table = 'orden_clc';

	public function isValid($data){
		$rules = array(
			'orden_id' 	=> 'required'
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

