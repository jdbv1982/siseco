<?php namespace App\Modules\Licitaciones\Models;

use Validator;

class Adendo extends \Eloquent{
	public $errores;
	protected $fillable = array('idobra','nombreadendo','descadendo','obsadendo');
	protected $table = 'adendos';

	public function isValid($data){
		$rules = array(
			'nombreadendo' => 'required'
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
