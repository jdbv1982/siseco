<?php namespace App\Modules\Avances\Models;

use Validator;

class Avance extends \Eloquent{
	public $errores;
	protected $fillable = array('idobra','afisico','afinanciero','observaciones','foto1','foto2','foto3');
	protected $table = 'avances';

	public function isValid($data){
		$rules = array(
			'idobra' => 'required',
			'afisico' => 'required',
			'foto1' => 'required'
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
