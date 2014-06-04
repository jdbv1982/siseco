<?php namespace App\Modules\Licitaciones\Models;

use Validator;

class Diferimiento extends \Eloquent{
	public $errores;
	protected $fillable = array('idobra','numdiferimiento','fechadiferimiento','cantidad','finiciodiferimiento','ffinaldiferimiento','observ_diferimiento');
	protected $table = 'diferimientos';

	public function isValid($data){
		$rules = array(
			'numdiferimiento' => 'required'
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
