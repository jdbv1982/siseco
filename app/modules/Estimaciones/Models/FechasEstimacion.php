<?php namespace App\Modules\Estimaciones\Models;

use Validator;

class FechasEstimacion extends \Eloquent{
	public $errores;
	protected $fillable = array('id','fecha1','fecha2','fecha3','fecha4','fecha5','fecha6','fecha7','fecha8','fecha9','fecha10');
	protected $table = 'fechaestimaciones';

	public function isValid($data){
		$rules = array(			
			'id' => 'required'
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
