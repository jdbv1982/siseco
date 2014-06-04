<?php namespace App\Modules\Estimaciones\Models;

use Validator, DB;

class Estimacion extends \Eloquent{
	public $errores;
	protected $fillable = array('idobra','nombre','numrevision','numestimacion','festimacion','observacion','fdevolucion','importe','estatus','finicio_est','ftermino_est','recibido_por','nombreobra_ori');
	protected $table = 'estimaciones';

	public function isValid($data){
		$rules = array(
			'idobra' => 'required',
			'nombre' => 'required',
			'importe' => 'required'
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

	public function getEstimaciones(){
		return DB::table('planeacion as p')
			->leftjoin('estimaciones as es','es.idobra','=','p.id')
			->leftjoin('eststatus as e','es.estatus','=','e.id')
			->select('p.id','p.numeroobra','p.nombreobra', 'es.nombre', 'es.numrevision','es.numestimacion','es.festimacion','es.observacion','es.fdevolucion','es.importe','es.finicio_est','es.ftermino_est', 'es.estatus','e.nombre as estatus','es.id as idestimacion')
			->get();
	}
}
