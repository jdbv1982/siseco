<?php namespace App\Modules\Estructura\Models;

use Validator;

class Estructura extends \Eloquent{
	public $errores;
	protected $fillable = array('idobra','concepto','total','invfederal','investatal','invmunicipal','invparticipantes','status');
	protected $table = 'estructura';

	public function isValid($data){
		$rules = array(
			'idobra' 		=> 'required',
			'concepto'		=> 'required'
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
