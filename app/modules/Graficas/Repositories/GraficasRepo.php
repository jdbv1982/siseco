<?php namespace App\Modules\Graficas\Repositories;

use DB;

Class GraficasRepo {
	public function getAños(){
		$sql = "SELECT DISTINCT(ejercicio) FROM planeacion
			ORDER BY ejercicio desc";
		$datos = array();

		$años = DB::select(DB::raw($sql));
		foreach ($años as $value) {
			$datos[$value->ejercicio] = $value->ejercicio;
		}
		return $datos;
	}

	public function getTotales($regla, $year){

		$datos = array();

		$sql = "SELECT COUNT(id) as planeacion
			FROM planeacion p
			WHERE p.ejercicio $regla $year";
		$planeacion = DB::select(DB::raw($sql));

		$sql = "SELECT COUNT(l.id) as licitaciones
			FROM licitaciones l
			INNER JOIN planeacion p ON l.id = p.id
			WHERE p.ejercicio $regla $year";

		$licitaciones = DB::select(DB::raw($sql));

		$sql = "SELECT COUNT(DISTINCT(e.idobra)) as obras
			FROM estimaciones e
			INNER JOIN planeacion p ON p.id = e.idobra
			WHERE p.ejercicio $regla $year";
		$obras = DB::select(DB::raw($sql));

		$sql = "SELECT COUNT(DISTINCT(c.id)) as administracion
			FROM obra_clc c
			INNER JOIN planeacion p ON p.id = c.idobra
			WHERE p.ejercicio $regla $year";
		$admin = DB::select(DB::raw($sql));

		array_push($datos, $planeacion[0]->planeacion);
		array_push($datos, $licitaciones[0]->licitaciones);
		array_push($datos, $obras[0]->obras);
		array_push($datos, $admin[0]->administracion);


		return $datos;

	}
}

