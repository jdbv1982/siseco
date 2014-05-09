<?php namespace App\Modules\Licitaciones\Models;

use Validator;

class Fianzas extends \Eloquent{
	public $errores;
	protected $fillable = array('idobra','numfianza','montofianza','idafianzadora','fechafianza','tipofianza','numfactura','montofactura');
	protected $table = 'fianzas';

	public function isValid($data){
		$rules = array(
			'numfianza' => 'required'
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
