<?php namespace App\Modules\Obras\Models;

use Validator;

class Residencia extends \Eloquent{
	public $errores;
	protected $fillable = array('idresidencia');
	protected $table = 'planeacion';

	public function isValid($data){
		$rules = array(
			'idresidencia'	=> 'required'
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
