<?php namespace App\Modules\Planeacion\Models;

use Validator;

class Planeacion extends \Eloquent{
	public $errores;
	protected $fillable = array('ppi','nombreppi','idregion','iddistrito','idmunicipio','idlocalidad','idprograma','idsubprograma','idtipo','numeroobra','nombreobra','idfuente',
			'idsubfuente','idorigen','idsuborigen','idclassuborigen','idcvefin','ejercicio','idramo','idfondo','idsituacion','depejecutora','nombreaccion','idunidadmedida',
			'idmeta', 'cantidad','idpoblacion', 'bmujeres','bhombres','bjornales','caracteristicas','idmodalidad','comentarios','concejecutar','observaciones','codigoaccion','observacionesseg',
			'ninforme','idfgeneral','idresidencia','tipo_obra_id','tipo_atn_id','status_id');
	protected $table = 'planeacion';

	public function isValid($data){
		$rules = array(
			'idregion'	=> 'required',
			'iddistrito'	=> 'required',
			'idmunicipio'	=> 'required',
			'idlocalidad'	=> 'required',
			'idprograma'	=> 'required',
			'idsubprograma'=> 'required',
			'idtipo'		=> 'required',
			'numeroobra'	=> 'required',
			'nombreobra'	=> 'required'
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
