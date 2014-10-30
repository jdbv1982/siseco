<?php namespace App\Modules\Graficas\Controllers;

use View, DB, Input;
use App\Modules\Reportes\Models\Contratadas;

use App\Modules\Graficas\Repositories\GraficasRepo;

class GraficaController extends \BaseController{
	protected $layout = "layouts.layout";

	protected $graficasRepo;

	public function __construct(GraficasRepo $graficasRepo){
		$this->graficasRepo = $graficasRepo;
	}

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

	public function captura(){
		$años = $this->graficasRepo->getAños();
		$this->layout->contenido = View::make('Graficas::captura', compact('años'));
	}

	public function graficaCaptura(){

		$titulo = "PORCENTAJE DE CAPTURA POR AREA";
		$tituloy = "PORCENTAJE DE CAPTURA";
		$titulox = "AREAS (PLANEACION - LICITACIONES - OBRAS - ADMINISTRACION)";

		$datos = $this->graficasRepo->getTotales(Input::get('regla'), Input::get('year'));
		$planeacion = $datos[0];
		$licitaciones = $datos[1];
		$obras = $datos[2];
		$administracion = $datos[3];
		$afisico = $datos[4];
		return View::make('Graficas::grafica_captura',compact('titulo','tituloy','titulox','planeacion', 'licitaciones', 'obras','administracion','afisico'));
	}

}
