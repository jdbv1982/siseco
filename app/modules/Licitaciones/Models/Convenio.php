<?php namespace App\Modules\Licitaciones\Models;

use Validator;

class Convenio extends \Eloquent{
	public $errores;
	protected $fillable = array('idobra','numconvenio','fechaconvenio','tipoconvenio','cantidad','finicio','ffinal');
	protected $table = 'convenios';

	public function isValid($data){
		$rules = array(
			'numconvenio' => 'required'
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
