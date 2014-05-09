<?php namespace App\Modules\Permisos\Models;

use DB, Validator;

class Permiso extends \Eloquent{
	protected $fillable = array('idusuario','idpermiso','visible');
	protected $table = "permisos";

	public function isValid($data){
		$rules = array(
			'idusuario' => 'required'
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

	public function getPermiso($id, $idpermiso){
		return DB::table('permisos')
			->where('idusuario','=',$id)
			->where('idpermiso','=',$idpermiso,'AND')
			->get();
	}
}
