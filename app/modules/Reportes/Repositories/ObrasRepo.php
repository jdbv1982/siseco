<?php namespace App\Modules\Reportes\Repositories;

use DB;

class ObrasRepo {

	public function getAvances(){
		$sql = "SELECT p.id, p.numeroobra, p.nombreobra, p.ejercicio,
			(SELECT nombre_region FROM regiones WHERE id = p.idregion ) AS region,
			(SELECT nombre_municipio FROM municipios WHERE id = p.idmunicipio ) AS municipio,
			(SELECT nombre FROM residencias WHERE id = idresidencia) AS residencia,
			COUNT(p.id) as num_avances ,SUM(a.afisico) AS fisico, SUM(a.afinanciero) AS financiero
			FROM planeacion p
			INNER JOIN avances a ON p.id = a.idobra
			GROUP BY p.id";
		return DB::select(DB::raw($sql));
	}

	public function getEstimaciones(){
		$sql = "SELECT p.id, p.numeroobra,p.nombreobra,p.ejercicio,
			(SELECT fuentegeneral FROM fuentegeneral WHERE id = p.idfgeneral ) AS fuente,
			(SELECT nombre_region FROM regiones WHERE id = p.idregion ) AS region,
			(SELECT nombre_municipio FROM municipios WHERE id = p.idmunicipio ) AS municipio,
			(SELECT nombre FROM residencias WHERE id = idresidencia) AS residencia,
			COUNT(DISTINCT(e.numestimacion)) AS num_estimaciones, ROUND(SUM(DISTINCT(e.importe)), 2) AS importe
			FROM estimaciones e
			INNER JOIN planeacion p ON p.id = e.idobra
			GROUP BY idobra";

		return DB::select(DB::raw($sql));
	}

	public function getClcs(){
		$sql = "SELECT p.id,p.numeroobra,p.nombreobra,p.ejercicio,
		(SELECT fuentegeneral FROM fuentegeneral WHERE id = p.idfgeneral ) AS fuente,
		(SELECT nombre_region FROM regiones WHERE id = p.idregion ) AS region,
		(SELECT nombre_municipio FROM municipios WHERE id = p.idmunicipio ) AS municipio,
		(SELECT nombre FROM residencias WHERE id = idresidencia) AS residencia,
		oc.idobra, COUNT(DISTINCT(c.no_afectacion)) AS num_clcs, ROUND(SUM(c.total * c.signo),2) AS importe
		FROM obra_clc oc
		INNER JOIN clcs c ON oc.no_afectacion = c.no_afectacion
		INNER JOIN planeacion p ON p.id = oc.idobra
		GROUP BY oc.idobra";

		return DB::select(DB::raw($sql));
	}
}
