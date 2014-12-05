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
		$sql = "SELECT p.id, p.numeroobra, l.l_contrato, p.nombreobra, es.nombre, es.numrevision, es.numestimacion,
			es.festimacion, es.observacion, es.fdevolucion, es.importe, es.finicio_est, es.ftermino_est,
			es.estatus, e.nombre AS estatus, es.id AS idestimacion,
			(SELECT fuentegeneral FROM fuentegeneral WHERE id = p.idfgeneral ) AS fuente
			FROM planeacion AS p
			INNER JOIN licitaciones AS l ON l.id = p.id
			LEFT JOIN estimaciones AS es ON es.idobra = p.id
			LEFT JOIN eststatus AS e ON es.estatus = e.id";
		return DB::select(DB::raw($sql));

	}
}
