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
}
