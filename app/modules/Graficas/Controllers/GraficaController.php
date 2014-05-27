<?php namespace App\Modules\Graficas\Controllers;

use View, DB;
use App\Modules\Reportes\Models\Contratadas;


class GraficaController extends \BaseController{
	protected $layout = "layouts.layout";

public function graficas(){
	$this->layout->contenido = View::make('Graficas::graficas');
}

public function porFuente(){
	$obras = new Contratadas;
	$titulo = "Resumen de Obras por Fuente de Financiamiento";
	$titulopie = "Numero de Obras:";
	$datos = $obras->getResumenInfo(["idfgeneral"]);
	return View::make('Graficas::fuente', compact('datos','titulo', 'titulopie'));
}

public function graficaBarras(){
	$titulo = "Resumen de Obras por Fuente de Financiamiento";
	$obras = new Contratadas;
	$tituloy = "NUMERO DE OBRAS";
	$titulox = "OBRAS 2014";
	$datos = $obras->getResumenInfo(["idfgeneral"]);

	return View::make('Graficas::barras',compact('titulo','tituloy','titulox','datos'));
}

}
