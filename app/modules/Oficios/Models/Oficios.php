<?php namespace App\Modules\Oficios\Models;

use Validator;

class Oficios extends \Eloquent{
	public $errores;
	protected $fillable = array('idobra','nombreoficio','numerooficio','fechaoficio','fecharecibido','observacionesoficio');
	protected $table = 'oficios';


	public function isValid($data){
		$rules = array(
			'idobra' => 'required',
			'nombreoficio' => 'required'
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
