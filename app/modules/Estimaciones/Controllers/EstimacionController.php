<?php namespace App\Modules\Estimaciones\Controllers;

use Input, DB, Response, View, Redirect;
use App\Modules\Estimaciones\Models\Estimacion;
use App\Modules\Estimaciones\Models\FechasEstimacion as Fechas;
use App\Modules\Obras\Models\Obras;
use App\Modules\Planeacion\Models\Planeacion;
use App\Modules\Facturas\Models\Factura;
use App\Modules\Residencias\Models\Residencias;

class EstimacionController extends \BaseController{
	protected $layout = "layouts.layout";

	public function getListado(){
		$est = new Estimacion;
		$datos = $est->getEstimaciones();
		$this->layout->contenido = View::make('Estimaciones::listado', compact('datos'));
	}

	public function setNuevo($id){
		$obra = Planeacion::find($id);
		$residencia = Residencias::find($obra->idresidencia);
		$estatus = DB::table('eststatus')->lists('nombre','id');
		$this->layout->contenido = View::make('Estimaciones::nuevo', compact('obra','estatus','residencia'));
	}

	public function postNuevo($id){
		$data = Input::all();

		$estimacion = new Estimacion;
		if($estimacion->validAndSave($data)){
			return Redirect::to('estimaciones/listado');
		}else{
			return Redirect::back()->withErrors($estimacion->errores)->withInput();
		}
	}//funcion para guardar la estimacion

	public function setEditar($id, $idestimacion){
		$est = Estimacion::find($idestimacion);
		$obra = Planeacion::find($id);
		$estatus = DB::table('eststatus')->lists('nombre','id');
		$this->layout->contenido = View::make('Estimaciones::editar', compact('est', 'obra','estatus'));
	}

	public function postEditar($id){
		$data = Input::all();
		$estimacion = Estimacion::find($id);
		if($estimacion->validAndSave($data)){
			return Redirect::to('estimaciones/listado');
		}else{
			return Redirect::back()->withErrors($estimacion->errores)->withInput();
		}

	}

	public function setFechas($idobra, $id){
		$est = Estimacion::find($id);
		$obra = Planeacion::find($idobra);
		$fechas = Fechas::find($id);
		if(is_null($fechas)){
			$this->layout->contenido = View::make('Estimaciones::fechas', compact('obra','est'));
		}else{
			$this->layout->contenido = View::make('Estimaciones::actualizafechas', compact('obra','est','fechas'));
		}
	}

	public function postFechas($id){
		$data = Input::all();
		$fechas = Fechas::find($id);
		if(is_null($fechas)){
			$fechas = new Fechas;
		}

		if($fechas->validAndSave($data)){
			return Redirect::to('estimaciones/listado');
		}else{
			return Redirect::back()->withErrors($fechas->errores)->withInput();
		}
	}

	public function listadoFacturas($id){
		$facturas = new Factura;
		$datos = $facturas->getFacturas($id);
		$this->layout->contenido = View::make('Estimaciones::factura', compact('datos'));
	}


	public function agregaEstimacion($id){
		$data = Input::all();

		$estimacion = new Estimacion;
		if($estimacion->validAndSave($data)){
			Input::merge(array('id' => $estimacion->id));
			$data = Input::all();
			$fechas = new Fechas;
			$fechas->validAndSave($data);
			return 'true';
		}else{
			return $estimacion->errores;
		}
	}

	public function getEstimaciones($id){
		$obras = new Obras;

	    $data = $obras->getEstimaciones($id);
		return Response::json($data);
	}



}
