<?php namespace App\Modules\Clcs\Repositories;

use DB;

use App\Modules\Clcs\Models\Reldoc;

class ClcRepo {

	public function getDatosObra($id){
		$sql = "SELECT idmodalidad,
			(SELECT nombremodalidad FROM modalidad where id = p.idmodalidad) as ejecucion,
			(SELECT nombre FROM residencias WHERE id = p.idresidencia) AS residencia,
			(SELECT razsoc FROM contratistas WHERE id=l.l_idempresa) AS contratista,
			p.nombreobra,l.l_contrato AS contrato, l.l_fecha as fecha
			FROM planeacion p
			INNER JOIN licitaciones l ON l.id = p.id
			WHERE p.id=$id";

		$datos =DB::select( DB::raw($sql));
		return $datos[0];

	}

	public function getEstimacion($id, $folio){
		$sql = "SELECT CONCAT(e.nombre,' ',e.numestimacion) AS nombre, e.festimacion,e.importe,CONCAT('del ',e.finicio_est,' al ',e.ftermino_est) AS periodo
			FROM estimaciones e
			INNER JOIN facturas f ON f.idestimacion = e.id
			WHERE idobra = $id AND folio = (SELECT referencia
			FROM clcs
			WHERE no_afectacion = $folio LIMIT 1)";

		$estimacion = DB::select( DB::raw($sql));
		if(! empty($estimacion)){
			return $estimacion[0];
		}else{
			return [];
		}
	}

	public function getDocumentacion($clc, $tipo){
		$sql = "SELECT d.id, d.cve, d.documento,
		(SELECT presenta FROM rel_doc WHERE doc_id = d.id AND clc_id = $clc) AS presenta,
		(SELECT faltante FROM rel_doc WHERE doc_id = d.id AND clc_id = $clc) AS faltante,
		(SELECT no_aplica FROM rel_doc WHERE doc_id = d.id AND clc_id = $clc) AS no_aplica,
		(SELECT observaciones FROM rel_doc WHERE doc_id = d.id AND clc_id = $clc) AS observaciones
		FROM cat_doc_contratos d
		WHERE d.tipo = $tipo";

		$datos = DB::select( DB::raw($sql));
		return $datos;
	}

	public function setDocumentacion($clc_id, $doc_id, $valor, $observaciones){
		$presenta = 0;
		$faltante = 0;
		$no_aplica = 0;

		if($valor == 1){
			$presenta = 1;
		}elseif ($valor == 2) {
			$faltante = 1;
		}else{
			$no_aplica = 1;
		}

		$docto = $this->getRelDocto($clc_id, $doc_id);
		if(empty($docto)){
			$rel_doc = new Reldoc;

			$data = [
				'clc_id' => $clc_id,
				'doc_id' => $doc_id,
				'presenta' => $presenta,
				'faltante' => $faltante,
				'no_aplica' => $no_aplica,
				'observaciones' => $observaciones
			];
			$rel_doc->validAndSave($data);
		}else{
			$rel_doc = Reldoc::find($docto[0]->id);
			$rel_doc->presenta = $presenta;
			$rel_doc->faltante = $faltante;
			$rel_doc->no_aplica = $no_aplica;
			$rel_doc->observaciones = $observaciones;
			$rel_doc->save();
		}

	}

	public function getRelDocto($clc_id, $doc_id){
		$docto = DB::table('rel_doc')
			->where('clc_id','=',$clc_id)
			->where('doc_id','=',$doc_id, 'AND')
			->get();

		return $docto;

	}
}
