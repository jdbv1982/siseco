<?php namespace App\Modules\Notificaciones\Models;

use Validator, DB;

class Notificacion extends \Eloquent{
	public $errores;
	protected $fillable = array('idremitente','iddestino','titulo','mensaje');
	protected $table = 'notificaciones';

	public function isValid($data){
		$rules = array(
			'idremitente' 	=> 'required',
			'iddestino'	=> 'required',
			'titulo' => 'required',
			'mensaje' => 'required'
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

	public function getDatos($clave){
		return DB::table('correos')
				->join('users','users.id','=','correos.destinatario')
				->select('correos.destinatario','users.email')
				->where('correos.clave','=', $clave)
				->get();
	}

	public function getTodas($id){
		return DB::table('notificaciones')
			->join('users','users.id','=','notificaciones.iddestino')
			->where('iddestino','=',$id)
			->select('notificaciones.id','notificaciones.titulo','notificaciones.mensaje','users.nombre')
			->get();
	}
}
