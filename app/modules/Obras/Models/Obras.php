<?php namespace App\Modules\Obras\Models;

use DB, Response, Validator;

use App\Modules\Avances\Models\Avance;

class Obras extends \Eloquent{
	public $errores;
	protected $fillable = array('id', 'poa', 'idevento', 'observaciones');
	protected $table = 'obras';

	public function isValid($data){
		$rules = array(
			'poa' => 'required'
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


	public function getInfoObras($id){
		$datos = db::table('planeacion as p')
			->leftjoin('residencias as r','p.idresidencia','=','r.id')
			->join('estructura as es', 'p.id','=','es.idobra')
			->leftjoin('licitaciones as l','p.id','=','l.id')
			->leftjoin('contratistas as c','l.l_idempresa','=','c.id')
			->where('p.id','=',$id)
			->get(array('p.id','r.nombre as nombreresidencia','l.l_contrato',
				'l_fecha','p.nombreobra','l.l_montocontratado','c.razsoc',
				'l.l_finicio','l.l_ffinal',
				DB::raw( 'SUM(es.invfederal) + SUM(es.investatal) +
         			 SUM(es.invmunicipal) AS autorizado' )
				));
		return json_decode(json_encode($datos));
	}

	public function getEstimaciones($id){
		$datos = DB::table('estimaciones as e')
			->join('eststatus as es','es.id','=','e.estatus')
			->leftjoin('fechaestimaciones as f','f.id','=','e.id')
			->select('e.*','es.clave','es.nombre as nestatus','f.*')
			->where('e.idobra','=',$id)
			->get();

		return json_decode(json_encode($datos));
	}

	public function getAvance($id){
		return  Avance::orderBy('id', 'DESC')->first();
	}

}
