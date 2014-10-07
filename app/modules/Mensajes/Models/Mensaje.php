<?php namespace App\Modules\Mensajes\Models;

use Validator;

class Mensaje extends \Eloquent{
	public $errores;
	protected $fillable = array('mensaje_id','destinatario','mensaje','remitente','status');
	protected $table = 'mensajes';

	public function isValid($data){
		$rules = array(
			'destinatario' => 'required',
			'mensaje' => 'required',
			'remitente' => 'required'
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
