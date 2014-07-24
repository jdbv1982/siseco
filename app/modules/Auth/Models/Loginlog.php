<?php namespace App\Modules\Auth\Models;

use Validator;

class Loginlog extends \Eloquent{
	public $errores;
	protected $fillable = array('idusuario', 'ipfisica');
	protected $table = 'loginlog';

	public function isValid($data){
		$rules = array(
			'idusuario' => 'required'
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
