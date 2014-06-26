<?php namespace App\Modules\Reportes\Models;

use DB;

class ObrasAutorizadas extends \Eloquent{
	public function getObrasAut($r, $d, $m, $l){
		$sql = "SELECT p.id, p.nombreobra, finan.nombrefinanciamiento, of.numerooficio, of.fechaoficio, SUM(est.investatal) AS monto
				FROM planeacion AS p
				INNER JOIN financiamiento AS finan ON p.idcvefin = finan.id
				INNER JOIN oficios AS of ON p.id = of.idobra
				INNER JOIN estructura AS est ON p.id = est.idobra ";
		$sql .= "WHERE of.nombreoficio = 'AUTORIZACION' ";

		if($r != 0){$sql .= "AND p.idregion = $r ";}
		if($d != 0){$sql .= "AND p.iddistrito = $d ";}
		if($m != 0){$sql .= "AND p.idmunicipio = $m ";}
		if($l != 0){ $sql .= "AND p.idlocalidad = $l ";}

		$sql .= "GROUP BY p.id, p.nombreobra, finan.nombrefinanciamiento, of.numerooficio, of.fechaoficio";
		$datos = DB::select( DB::raw($sql));
		return $datos;
	}
}
