<?php namespace App\Modules\Estructura\Controllers;

use View, Input, Redirect;

use App\Modules\Estructura\Models\Estructura;

class EstructuraController extends \BaseController{
	protected $layout = "layouts.layout";

	public function listado(){
		$estructura = Estructura::all();
		$this->layout->contenido = View::make('Estructura::listado', compact('estructura') );
	}

	public function getEstructura($id){
		$estructura = Estructura::find($id);
		if(is_null($estructura)){
			App::abort(404);
		}

		$this->layout->contenido = View::make('Estructura::editar', compact('estructura'));
	}

	public function setEstructura($id){
		$data = Input::all();
		$estructura = Estructura::find($id);
		if(is_null($estructura)){
			App::abort(404);
		}

		if($estructura->validAndSave($data)){
			return Redirect::to('estructura/listado');
		}else{
			return Redirect::back()->withErrors($estructura->errores)->withInput();
		}
	}
}
