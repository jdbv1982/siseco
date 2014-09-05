<?php namespace App\Modules\Reportes\Models;

use DB;

class Control extends \Eloquent{
	public function getInvAnual($totales = false){
		$sql = "SELECT p.idfgeneral,
	(SELECT fuentegeneral FROM fuentegeneral WHERE id = p.idfgeneral) AS fuentegeneral,
	p.ejercicio,
			COUNT(DISTINCT(p.id)) AS numobras,
			ROUND(SUM(c.enero) , 2) AS enero,
			ROUND(SUM(c.febrero) , 2) AS febrero,
			ROUND(SUM(c.marzo) , 2) AS marzo,
			ROUND(SUM(c.abril) , 2) AS abril,
			ROUND(SUM(c.mayo) , 2) AS mayo,
			ROUND(SUM(c.junio) , 2) AS junio,
			ROUND(SUM(c.julio) , 2) AS julio,
			ROUND(SUM(c.agosto) , 2) AS agosto,
			ROUND(SUM(c.septiembre) , 2) AS septiembre,
			ROUND(SUM(c.octubre) , 2) AS octubre,
			ROUND(SUM(c.noviembre) , 2) AS noviembre,
			ROUND(SUM(c.diciembre) , 2) AS diciembre,
			ROUND(SUM(c.enero) + SUM(c.febrero) + SUM(c.marzo) + SUM(c.abril) + SUM(c.mayo) + SUM(c.junio) + SUM(c.julio) + SUM(c.agosto) + SUM(c.septiembre) + SUM(c.octubre) + SUM(c.noviembre) + SUM(c.diciembre),2) AS total
			FROM planeacion p
			LEFT JOIN calendarizacion c ON c.idobra = p.id ";
			if ($totales == false){
				$sql .= "GROUP BY p.idfgeneral, p.ejercicio ORDER BY p.ejercicio, p.idfgeneralx";
			}
		$datos = DB::select( DB::raw($sql));
		return $datos;
	}
}
