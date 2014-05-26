<?php namespace App\Modules\Calendarizacion\Controllers;

use View, Input, Redirect;

use App\Modules\Calendarizacion\Models\Calendarizacion;

class CalenController extends \BaseController{
	protected $layout = "layouts.layout";

	public function listado(){
		$calen = Calendarizacion::all();
		$this->layout->contenido = View::make('Calendarizacion::listado', compact('calen') );
	}

	public function getCalendario($id){
		$calen = Calendarizacion::find($id);
		if(is_null($calen)){
			App::abort(404);
		}

		$this->layout->contenido = View::make('Calendarizacion::editar', compact('calen'));
	}

	public function setCalendario($id){
		$data = Input::all();
		$calen = Calendarizacion::find($id);
		if(is_null($calen)){
			App::abort(404);
		}

		if($calen->validAndSave($data)){
			return Redirect::to('calendarizacion/listado');
		}else{
			return Redirect::back()->withErrors($calen->errores)->withInput();
		}
	}
}
