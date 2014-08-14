<?php namespace App\Modules\Pagos\Models;

use Validator;

class Pago extends \Eloquent{
	public $errores;
	protected $fillable = array('clc_id','folio','beneficiario','observaciones','ejercicio_id','banco_id','cuenta_id','concepto','deducciones','aditivas','importe','total','status_id');
	protected $table = 'pagos';


	public function isValid($data){
		$rules = array(
			'clc_id' => 'required',
			'folio' => 'required',
			'beneficiario' => 'required',
			'importe'	=> 'required'
		);

		if($this->exists){
			$rules['folio'] .= ',folio,' . $this->id;
		}else{
			$rules['folio'] .= '|required';
		}

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
