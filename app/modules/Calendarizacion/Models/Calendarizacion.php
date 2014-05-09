<?php namespace App\Modules\Calendarizacion\Models;

use Validator;

class Calendarizacion extends \Eloquent{
	public $errores;
	protected $fillable = array('idobra','conceptocal','porcentaje','totalcal','enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre','octubre','noviembre','diciembre','status');
	protected $table = 'calendarizacion';

	public function isValid($data){
		$rules = array(
			'idobra' => 'required'
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
