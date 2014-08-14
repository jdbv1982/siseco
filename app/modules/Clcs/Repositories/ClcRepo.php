<?php namespace App\Modules\Clcs\Repositories;

use DB;

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
		return $estimacion[0];
	}

	public function getDocumentacion($clc, $tipo){
		$sql = "SELECT d.id, d.cve, d.documento,
		(SELECT presenta FROM rel_doc WHERE id = id AND clc_id = $clc) AS presenta,
		(SELECT faltante FROM rel_doc WHERE id = id AND clc_id = $clc) AS faltante,
		(SELECT no_aplica FROM rel_doc WHERE id = id AND clc_id = $clc) AS no_aplica
		FROM cat_doc_contratos d
		WHERE d.tipo = $tipo";

		$datos = DB::select( DB::raw($sql));
		return $datos;
	}
}
