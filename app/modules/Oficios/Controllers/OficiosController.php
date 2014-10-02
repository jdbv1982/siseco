<?php namespace App\Modules\Oficios\Controllers;

use DB, Response, Input, Redirect, View;
use App\Modules\Oficios\Models\Oficios;
use App\Modules\Planeacion\Models\Planeacion;
use App\Modules\Estructura\Models\Estructura;
use App\Modules\Calendarizacion\Models\Calendarizacion;


class OficiosController extends \BaseController{
	protected $layout = "layouts.layout";

	public function agregaOficio($id){
		$data = Input::all();

		$nombreobra = $_POST['nombreobra'];
		$meta = $_POST['metaproyecto'];

		if(Input::has('efin')){
			$efin = $_POST['efin'];
		}else{
			$efin = 0;
		}


		$oficio = new Oficios;

		if($oficio->validAndSave($data)){
			$obra = Planeacion::find($id);
			if($nombreobra <> ''){
				$obra = Planeacion::find($id);
				if(!is_null($obra)){
					$obra->nombreobra = $nombreobra;
					$obra->save();
				}
			}

			if($meta <> ''){
				$obra = Planeacion::find($id);
				if(!is_null($obra)){
					$obra->cantidad = $meta;
					$obra->save();
				}
			}

			$concepto	=Input::get('concepto');
			$total 		= Input::get('total');
			$invfederal = Input::get('invfederal');
			$investatal = Input::get('investatal');
			$invmunicipal = Input::get('invmunicipal');
			$invparticipantes = Input::get('invparticipantes');
			for ($i=0; $i<=count($concepto)-1; $i++) {
				$datae = array(
					'idobra' => $obra->id,
					'concepto' => $concepto[$i],
					'total' => $total[$i],
					'invfederal' => $invfederal[$i],
					'investatal' => $investatal[$i],
					'invmunicipal' => $invmunicipal[$i],
					'invparticipantes' => $invparticipantes[$i],
					'status'	=> 1
				);
				$estructura = new Estructura;
				$estructura->validAndSave($datae);
			}

			$conceptocal = Input::get('conceptocal');
				$porcentaje = Input::get('porcentaje');
				$totalcal = Input::get('totalcal');
				$enero = Input::get('enero');
				$febrero = Input::get('febrero');
				$marzo = Input::get('marzo');
				$abril = Input::get('abril');
				$mayo = Input::get('mayo');
				$junio = Input::get('junio');
				$julio = Input::get('julio');
				$agosto = Input::get('agosto');
				$septiembre = Input::get('septiembre');
				$octubre = Input::get('octubre');
				$noviembre = Input::get('noviembre');
				$diciembre = Input::get('diciembre');
				for ($i=0; $i<=count($conceptocal)-1; $i++) {
				$datac = array(
					'idobra'	=> $obra->id,
					'conceptocal' => $conceptocal[$i],
					'porcentaje' => $porcentaje[$i],
					'totalcal' => $totalcal[$i],
					'enero' => $enero[$i],
					'febrero' => $febrero[$i],
					'marzo' => $marzo[$i],
					'abril' => $abril[$i],
					'mayo' => $mayo[$i],
					'junio' => $junio[$i],
					'julio' => $julio[$i],
					'agosto' => $agosto[$i],
					'septiembre' => $septiembre[$i],
					'octubre' => $octubre[$i],
					'noviembre' => $noviembre[$i],
					'diciembre' => $diciembre[$i],
					'status'	=> 1
					);

				$cale = new Calendarizacion;
				$cale->validAndSave($datac);
			}


			return 'true';
		}else{
			return $oficio->errores;
		}
	}

	public function listadoOfifios(){
		$oficios = Oficios::orderBy('id', 'DESC')->get();
		$this->layout->contenido = View::make('Oficios::listado', compact('oficios'));
	}

	public function editarOficio($id){
		$oficio = Oficios::find($id);
		if(!is_null($oficio)){
			$this->layout->contenido = View::make('Oficios::editar', compact('oficio'));
		}
	}


	public function setEditarOficio($id){
		$oficio = Oficios::find($id);
		if(!is_null($oficio)){
			$data = Input::all();
			if($oficio->validAndSave($data)){
				return Redirect::to('oficios/listado');
			}else{
				return Redirect::back()->withErrors($usuario->errores)->withInput();
			}
		}
	}


}
