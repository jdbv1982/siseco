<?php namespace App\Modules\Reportes\Models;

use DB;

class Contratadas extends \Eloquent{
	protected $whereok;
	public function getObrasContratadas($f, $r, $d, $m, $l){
		$sql = "SELECT
			(SELECT nombre_region FROM regiones WHERE id = p.idregion) AS nombre_region,
			(SELECT fuentegeneral FROM fuentegeneral WHERE id = p.idfgeneral) AS fuentegeneral,
			(SELECT nombre FROM distritos WHERE id = p.iddistrito) AS nombre_distrito,
			(SELECT nombre_municipio FROM municipios WHERE id = p.idmunicipio) AS nombre_municipio,
			(SELECT nombre_localidad FROM localidades WHERE id = p.idlocalidad) AS nombre_localidad,
			(SELECT razsoc FROM contratistas WHERE id = l.l_idempresa) AS razsoc,
			p.nombreobra, l.l_contrato, SUM(es.investatal) AS monto, l.l_montocontratado
			FROM planeacion AS p
			INNER JOIN estructura AS es ON p.id = es.idobra
			LEFT JOIN licitaciones AS l ON l.id = p.id ";
		$this->whereok = False;
		$sql .= $this->getWhere($f, 'p.idfgeneral');
		$sql .= $this->getWhere($r, 'p.idregion');
		$sql .= $this->getWhere($d, 'p.iddistrito');
		$sql .= $this->getWhere($m, 'p.idmunicipio');
		$sql .= $this->getWhere($l, 'p.idlocalidad');
		$sql .= "GROUP BY nombre_region, p.nombreobra, fuentegeneral, nombre_distrito, nombre_municipio, nombre_localidad, l.l_contrato ";
		$datos = DB::select( DB::raw($sql));
		return $datos;

	}

	public function getWhere($valor, $campo){
		if($valor != 0){
			if($this->whereok == False){
				$this->whereok = True;
				return "Where ".$campo." = $valor ";
			}else{
				return "AND ".$campo." = $valor ";
			}
		}else{
			return "";
		}
	}

	public function getResumenInfo($op){
		if($op == ["idfgeneral"]){
			$campo = 'fuentegeneral';
			$tabla = 'fuentegeneral';
			$key = 'idfgeneral';
		}elseif ($op == ['idregion']) {
			$campo = 'nombre_region';
			$tabla = 'regiones';
			$key = 'idregion';
		}elseif ($op == ['iddistrito']) {
			$campo = 'nombre';
			$tabla = 'distritos';
			$key = 'iddistrito';
		}elseif ($op == ['idmunicipio']) {
			$campo = 'nombre_municipio';
			$tabla = 'municipios';
			$key = 'idmunicipio';
		}elseif ($op == ['idlocalidad']) {
			$campo = 'nombre_localidad';
			$tabla = 'localidades';
			$key = 'idlocalidad';
		}elseif ($op == ['idresidencia']) {
			$campo = 'nombre';
			$tabla = 'residencias';
			$key = 'idresidencia';
		}


		$sql = "SELECT (SELECT ".$campo." FROM ".$tabla." WHERE id = ".$key.") AS nombre,
			ejercicio,
			COUNT(autorizadas) AS autorizadas,
			ROUND(SUM(inversion),2) AS montoautorizado,
			COUNT(contratadas) AS contratadas,
			ROUND(SUM(contratado),2) AS montocontratado FROM (
			SELECT ".$key.",p.ejercicio,p.id AS autorizadas,
			(SELECT SUM(invfederal) + SUM(investatal) + SUM(invmunicipal) + SUM(invparticipantes) FROM estructura WHERE idobra = p.id) AS inversion,
			(SELECT id FROM licitaciones WHERE id = p.id) AS contratadas,
			(SELECT l_montocontratado FROM licitaciones WHERE id = p.id) AS contratado
			FROM planeacion p) AS tb1
			GROUP BY ".$key.", ejercicio
			ORDER BY ejercicio, ".$key."
		";

		$datos = DB::select( DB::raw($sql));
		return $datos;
	}

	public function getTotalesResumen(){

		$sql = "SELECT (SELECT fuentegeneral FROM fuentegeneral WHERE id = idfgeneral) AS nombre,
			ejercicio,
			COUNT(autorizadas) AS autorizadas,
			ROUND(SUM(inversion),2) AS montoautorizado,
			COUNT(contratadas) AS contratadas,
			ROUND(SUM(contratado),2) AS montocontratado FROM (
			SELECT p.idfgeneral,p.ejercicio,p.id AS autorizadas,
			(SELECT SUM(invfederal) + SUM(investatal) + SUM(invmunicipal) + SUM(invparticipantes) FROM estructura WHERE idobra = p.id) AS inversion,
			(SELECT id FROM licitaciones WHERE id = p.id) AS contratadas,
			(SELECT l_montocontratado FROM licitaciones WHERE id = p.id) AS contratado
			FROM planeacion p) AS tb1
			 ";

		$datos = DB::select( DB::raw($sql));
		return $datos;
	}
}
