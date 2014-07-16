<?php namespace App\Modules\Reportes\Models;

use DB;

class Control extends \Eloquent{
	public function getInvAnual($totales = false){
		$sql = "SELECT p.idfgeneral,(SELECT fuentegeneral FROM fuentegeneral WHERE id = p.idfgeneral) AS fuentegeneral,
			COUNT(DISTINCT(p.id)) AS numobras,
			ROUND(((SUM(c.enero) * 100) / SUM(c.totalcal)), 2) AS enero,
			ROUND(((SUM(c.febrero) * 100) / SUM(c.totalcal)), 2) AS febrero,
			ROUND(((SUM(c.marzo) * 100) / SUM(c.totalcal)), 2) AS marzo,
			ROUND(((SUM(c.abril) * 100) / SUM(c.totalcal)), 2) AS abril,
			ROUND(((SUM(c.mayo) * 100) / SUM(c.totalcal)), 2) AS mayo,
			ROUND(((SUM(c.junio) * 100) / SUM(c.totalcal)), 2) AS junio,
			ROUND(((SUM(c.julio) * 100) / SUM(c.totalcal)), 2) AS julio,
			ROUND(((SUM(c.agosto) * 100) / SUM(c.totalcal)), 2) AS agosto,
			ROUND(((SUM(c.septiembre) * 100) / SUM(c.totalcal)), 2) AS septiembre,
			ROUND(((SUM(c.octubre) * 100) / SUM(c.totalcal)), 2) AS octubre,
			ROUND(((SUM(c.noviembre) * 100) / SUM(c.totalcal)), 2) AS noviembre,
			ROUND(((SUM(c.diciembre) * 100) / SUM(c.totalcal)), 2) AS diciembre,
			ROUND(SUM(c.totalcal), 2) AS total
			FROM planeacion p
			LEFT JOIN calendarizacion c ON c.idobra = p.id ";
			if ($totales == false){
				$sql .= "GROUP BY p.idfgeneral";
			}
		$datos = DB::select( DB::raw($sql));
		return $datos;
	}
}
