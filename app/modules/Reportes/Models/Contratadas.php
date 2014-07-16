<?php namespace App\Modules\Reportes\Models;

use DB;

class Contratadas extends \Eloquent{
	protected $whereok;
	public function getObrasContratadas($f, $r, $d, $m, $l){



		$sql = "SELECT
			(SELECT nombre_region FROM regiones WHERE id = p.idregion) AS nombre_region,
			(SELECT nombre_fuente FROM fuentes WHERE id = p.idfuente) AS fuentegeneral,
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
		}


		$sql = "SELECT f.".$campo." AS nombre,
			COUNT(DISTINCT(p.id)) AS autorizadas,
			SUM(es.invfederal) + SUM(es.investatal) + SUM(es.invmunicipal) + SUM(es.invparticipantes) AS montoautorizado,
			COUNT(DISTINCT(l.id)) AS contratadas,
			SUM(l.l_montocontratado) AS montocontratado
			FROM planeacion AS p
			INNER JOIN ".$tabla." AS f ON f.id = p.".$key."
			INNER JOIN estructura AS es ON p.id = es.idobra
			LEFT JOIN licitaciones AS l ON p.id = l.id
			GROUP BY f.id, p.ejercicio
			ORDER BY p.ejercicio, f.id";

		$datos = DB::select( DB::raw($sql));
		return $datos;
	}

	public function getTotalesResumen(){

		$sql = "SELECT f.fuentegeneral AS nombre,
			COUNT(DISTINCT(p.id)) AS autorizadas,
			SUM(es.invfederal) + SUM(es.investatal) + SUM(es.invmunicipal) + SUM(es.invparticipantes) AS montoautorizado,
			COUNT(DISTINCT(l.id)) AS contratadas,
			SUM(l.l_montocontratado) AS montocontratado
			FROM planeacion AS p
			INNER JOIN fuentegeneral AS f ON f.id = p.idfgeneral
			INNER JOIN estructura AS es ON p.id = es.idobra
			LEFT JOIN licitaciones AS l ON p.id = l.id ";

		$datos = DB::select( DB::raw($sql));
		return $datos;
	}
}
