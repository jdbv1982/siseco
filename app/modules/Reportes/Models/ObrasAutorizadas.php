<?php namespace App\Modules\Reportes\Models;

use DB;

class ObrasAutorizadas extends \Eloquent{
	public function getObrasAut($r, $d, $m, $l){
		$sql = "SELECT p.id,p.ejercicio,p.numeroobra, p.nombreobra, fg.fuentegeneral AS nombrefinanciamiento, of.numerooficio, of.fechaoficio, SUM(est.invfederal)+ SUM(est.investatal) + SUM(est.invmunicipal) + SUM(est.invparticipantes) AS monto
				FROM planeacion AS p
				INNER JOIN fuentegeneral AS fg ON fg.id = p.idfgeneral
				INNER JOIN oficios AS of ON p.id = of.idobra
				INNER JOIN estructura AS est ON p.id = est.idobra ";
		$sql .= "WHERE of.nombreoficio = 'AUTORIZACION' ";

		if($r != 0){$sql .= "AND p.idregion = $r ";}
		if($d != 0){$sql .= "AND p.iddistrito = $d ";}
		if($m != 0){$sql .= "AND p.idmunicipio = $m ";}
		if($l != 0){ $sql .= "AND p.idlocalidad = $l ";}

		$sql .= "GROUP BY p.id, p.nombreobra, fg.fuentegeneral, of.numerooficio, of.fechaoficio ";
		$sql .= "ORDER BY p.ejercicio";
		$datos = DB::select( DB::raw($sql));
		return $datos;
	}
}
