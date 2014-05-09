<?php namespace App\Modules\Documentacion\Models;

use Validator;

class Documentacion extends \Eloquent{
	public $errores;
	protected $fillable = array('idobra', 'd_nombredoc', 'd_urldoc', 'id_usuario');
	protected $table = 'documentacion';

	public function isValid($data){
		$rules = array(
			'idobra' 		=> 'required',
			'd_nombredoc'	=> 'required',			
			'd_urldoc'		=> 'required',
			'id_usuario'	=> 'required'
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

