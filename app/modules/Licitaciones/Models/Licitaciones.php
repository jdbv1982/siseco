<?php namespace App\Modules\Licitaciones\Models;

use Validator;

class Licitaciones extends \Eloquent{
	public $errores;
	protected $fillable = array('id','l_procedimiento','l_contrato','l_montocontratado','l_anticipo','l_fecha','l_ndias','l_finicio','l_ffinal','l_idempresa','l_tipoemp','l_origen','l_cmic','l_modcontrato');
	protected $table = 'licitaciones';

	public function isValid($data){		
		$rules = array(
			'l_contrato' => 'required'
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
