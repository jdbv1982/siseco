<?php namespace App\Modules\Obras\Repositories;

use DB;

class ObrasInfoRepo {
	public function getObras($adjudicacion = 0){
		$sql = "SELECT p.id,
			(SELECT numerooficio FROM oficios WHERE idobra = p.id AND nombreoficio = 'AUTORIZACION') AS numerooficio,
			(SELECT nombre_fuente FROM fuentes WHERE id = p.idfuente) AS nombre_fuente,
			(SELECT nombre_region FROM regiones WHERE id = p.idregion) AS nombre_region,
			(SELECT nombre FROM tipo_obra WHERE id = p.tipo_obra_id ) AS tipo_obra,
			(SELECT nombre FROM residencias WHERE id = p.idresidencia) AS residencia,
			(SELECT nombre FROM status_obras WHERE id = p.status_id) AS status_obra,
			p.numeroobra, p.nombreobra, l.l_contrato
			FROM planeacion AS p
			LEFT JOIN licitaciones AS l ON p.id = l.id
			where p.ejercicio = 2014";

	if($adjudicacion != 0){
		$sql .= " and p.idmodalidad = $adjudicacion ";
	}


	$obras = DB::select( DB::raw($sql));
	return $obras;
	}

	public function getMontoAutorizado($id){
		$sql = "SELECT ROUND( SUM(invfederal) + SUM(investatal) + SUM(invmunicipal) + SUM(invparticipantes) ,2) AS monto
			FROM estructura
			WHERE idobra = $id";
		$dato = DB::select(DB::raw($sql));
		return $dato[0]->monto;
	}
}
