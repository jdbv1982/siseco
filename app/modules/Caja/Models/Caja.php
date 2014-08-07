<?php namespace App\Modules\Caja\Models;

use Validator;

class Caja extends \Eloquent{
	public $errores;
	protected $fillable = array('no_cheque','fecha','beneficiario','importe','concepto','recibido_por','orden_id');
	protected $table = 'caja';

	public function isValid($data){
		$rules = array(
			'no_cheque' 	=> 'required',
			'fecha'		=> 'required',
			'beneficiario'	=> 'required',
			'importe'	=> 'required',
			'recibido_por'	=> 'required'
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





