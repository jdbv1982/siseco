<?php namespace App\Modules\Reportes\Models;

use DB;

use App\Modules\Reportes\Models\Contratadas;

class Resumen_Planeacion extends \Eloquent{
	public function get_Resumen_Planeacion($op){
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
		}


		$sql = "SELECT f.".$campo." AS nombre, p.ejercicio,
			COUNT(DISTINCT(p.id)) AS autorizadas,
			SUM(es.total) AS total,
			SUM(es.invfederal) AS federal,
			SUM(es.investatal) AS estatal,
			SUM(es.invmunicipal) AS municipal,
			SUM(es.invparticipantes) AS participantes
			FROM planeacion AS p
			INNER JOIN ".$tabla." AS f ON f.id = p.".$key."
			INNER JOIN estructura AS es ON p.id = es.idobra
			LEFT JOIN licitaciones AS l ON p.id = l.id
			GROUP BY f.id, p.ejercicio
			ORDER BY f.id, p.ejercicio";

		$datos = DB::select( DB::raw($sql));
		return $datos;
	}

	public function get_Totales_resumen(){
		$sql = "SELECT f.fuentegeneral AS nombre, p.ejercicio,
			COUNT(DISTINCT(p.id)) AS autorizadas,
			SUM(es.total) AS total,
			SUM(es.invfederal) AS federal,
			SUM(es.investatal) AS estatal,
			SUM(es.invmunicipal) AS municipal,
			SUM(es.invparticipantes) AS participantes
			FROM planeacion AS p
			INNER JOIN fuentegeneral AS f ON f.id = p.idfgeneral
			INNER JOIN estructura AS es ON p.id = es.idobra
			LEFT JOIN licitaciones AS l ON p.id = l.id ";
		$datos = DB::select(DB::raw($sql));
		return $datos;
	}


}




