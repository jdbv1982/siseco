<?php namespace App\Modules\Administracion\Controllers;

use View, DB, Input, Redirect, App;
use App\Modules\Administracion\Models\Administracion;
use App\Modules\Planeacion\Models\Planeacion;

class AdministracionController extends \BaseController{
	protected $layout = "layouts.layout";

	public function getListado($id){
		$adms = Administracion::where('idobra','=',$id)->get();
		$planeacion  = Planeacion::find($id);
		$this->layout->contenido = View::make('Administracion::listado', compact('adms','planeacion'));
	}

	public function getNuevo($id){
		$planeacion = Planeacion::find($id);
		if(is_null($planeacion)){
			App::abort(404);
		}

		$this->layout->contenido = View::make('Administracion::nuevo', compact('planeacion'));
	}

	public function setNuevo(){
		$administracion = new Administracion;

		$data = Input::all();
		if($administracion->validAndSave($data)){
			return Redirect::to('administracion/listado/'.Input::get('idobra'));
		}else{
			return Redirect::back()->with('menaje', 'Datos incorrectos, vuelve a intentarlo.')->withErrors($administracion->errores)->withInput();
		}	
	}

	public function getAdministracion($id){
		$administracion = Administracion::find($id);
		if(is_null($administracion)){
			App::abort(404);
		}

		$this->layout->contenido = View::make('Administracion::editar', compact('administracion'));
	}

	public function updateAdministracion($id){
		$administracion = Administracion::find($id);
		if(is_null($administracion)){
			App:abort(404);
		}

		$data = Input::all();
		if($administracion->validAndSave($data)){
			return Redirect::to('administracion/listado/'.$administracion->idobra);
		}else{
			return Redirect::back()->with('menaje', 'Datos incorrectos, vuelve a intentarlo.')->withErrors($administracion->errores)->withInput();
		}	
	}
}
