<?php namespace App\Modules\Residencias\Models;

use Validator;

class Residencias extends \Eloquent{
	public $errores;
	protected $fillable = array('clave', 'nombre');
	protected $table = 'residencias';

	public function isValid($data){
		$rules = array(
			'nombre'	=> 'required'
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
