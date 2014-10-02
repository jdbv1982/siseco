<?php namespace App\Modules\Contratistas\Controllers;

use Input, DB, Response, View, Auth, Redirect;

use App\Modules\Contratistas\Models\Contratista;
use App\Modules\Contratistas\Servicios\ContratistasReportes;

class ContratistaController extends \BaseController{
	protected $layout = "layouts.layout";

	public function listado(){
		$contratistas = Contratista::all();
		$this->layout->contenido = View::make('Contratistas::listado', compact('contratistas'));
	}

	public function nuevo(){
		$this->layout->contenido = View::make('Contratistas::nuevo');
	}

	public function guardar(){
		Input::merge(array('idusuario' => Auth::user()->id));
   		$data = Input::all();
   		$contratista = new Contratista;
   		if($contratista->validAndSave($data)){
   			return Redirect::to('contratistas/listado');
		}else{
			return Redirect::to('contratistas/nuevo')->withErrors($contratista->errores)->withInput();
   		}

	}

	public function editar($id){
		$c = Contratista::find($id);

		if(is_null($c)){
			App::abort(404);
		}

		$this->layout->contenido = View::make('Contratistas::editar', compact('c'));
	}

	public function saveEditar($id){
		$c = Contratista::find($id);
		if(is_null($c)){
			App::abort(404);
		}
		Input::merge(array('idusuario' => Auth::user()->id));
		$data = Input::all();
		if($c->validAndSave($data)){
			return Redirect::to('contratistas/listado');
		}else{
			return Redirect::back()->withErrors($c->errores)->withInput();
		}
	}

	public function agregaContratista(){
		$data = Input::all();
		$contratista = new Contratista;
		if($contratista->validAndSave($data)){
			return 'true';
		}else{
			return $contratista->errores;
		}
	}


	public function getContratistas(){
	    $data = DB::table('contratistas')->lists('id','razsoc');
		return Response::json($data);
	}

}
