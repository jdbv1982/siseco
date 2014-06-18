<?php namespace App\Modules\Facturas\Models;

use Validator, DB;

class Factura extends \Eloquent{
	public $errores;
	protected $fillable = array('idestimacion', 'folio', 'fechaexp', 'subtotal', 'amtzxant','supervision','secodam','cmic', 'liquido', 'finieje', 'ffineje', 'observaciones', 'idusuario');
	protected $table = 'facturas';

	public function isValid($data){
		return $data;
		$rules = array(
			'idestimacion' => 'required'
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

	public function getFacturas($id){
		return DB::table('estimaciones as es')
			->leftjoin('facturas as f','f.idestimacion','=','es.id')
			->where('es.idobra','=',$id)
			->select('es.id','es.nombre', 'f.idestimacion', 'f.folio', 'f.fechaexp', 'f.subtotal', 'f.amtzxant', 'f.liquido', 'f.finieje', 'f.ffineje', 'f.observaciones')
			->get();

	}

}
