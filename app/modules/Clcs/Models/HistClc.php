<?php namespace App\Modules\Clcs\Models;

use Validator;

class HistClc extends \Eloquent{
	public $errores;
	protected $fillable = array('clc_id','status_id','actualizado_por');
	protected $table = 'historialclc';

	public function isValid($data){
		$rules = array(
			'clc_id' 	=> 'required'
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

