<?php namespace App\Modules\Clcs\Models;

use Validator;

class Obraclc extends \Eloquent{
	public $errores;
	protected $fillable = array('idobra','no_afectacion','concepto','id_status','num_spei','folio');
	protected $table = 'obra_clc';

	public function isValid($data){
		$rules = array(
			'idobra'		=> 'required',
			'no_afectacion' => 'required|unique:obra_clc'
		);

		if($this->exists){
			$rules['no_afectacion'] .= ',no_afectacion,' . $this->id;
		}else{
			$rules['no_afectacion'] .= '|required';
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

