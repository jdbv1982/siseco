<?php namespace App\Modules\Planeacion\Models;

use Validator;

class Seguimiento extends \Eloquent{
	public $errores;
	protected $fillable = array('comentarios','concejecutar','observaciones','codigoaccion','observacionesseg','ninforme');
	protected $table = 'planeacion';

	public function isValid($data){
		$rules = array(
			'ninforme'	=> 'required'
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
