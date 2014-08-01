<?php namespace App\Modules\Clcs\Models;

use Validator;

class UpdateObraClc extends \Eloquent{
	public $errores;
	protected $fillable = array('concepto','id_status');
	protected $table = 'obra_clc';

	public function isValid($data){
		$rules = array(
			'id_status'=> 'required'
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

