<?php namespace App\Modules\Licitaciones\Controllers;

use View, DB, Input, Redirect, App;
use App\Modules\Licitaciones\Models\Licitaciones;
use App\Modules\Planeacion\Models\Planeacion;
use App\Modules\Licitaciones\Models\Fianzas;
use App\Modules\Licitaciones\Models\Convenio;
use App\Modules\Licitaciones\Models\Adendo;



class LicitacionesController extends \BaseController{
	protected $layout = "layouts.layout";

	public function getNuevo($id){
		$id = $id;
		$planeacion = Planeacion::find($id);
		$licitacion = Licitaciones::find($id);
		$empresas = DB::table('contratistas')->lists('razsoc','id');
		$estados = DB::table('estados')->lists('nombre','id');		
		$tfianza = DB::table('ctipos')->where('tipo','=','1')->lists('nombre','id');
		$tconvenio = DB::table('ctipos')->where('tipo','=','2')->lists('nombre','id');
		$afianzadoras = DB::table('afianzadoras')->lists('nombreafianzadora','id');


		$fianzas = DB::table('fianzas')
		->join('ctipos','fianzas.tipofianza','=','ctipos.id')
		->where('idobra','=',$id)->get();

		$convenios = DB::table('convenios')
		->join('ctipos','convenios.tipoconvenio','=','ctipos.id')
		->where('idobra','=',$id)->get();

		$adendos = DB::table('adendos')->where('idobra','=',$id)->get();


		if(is_null($planeacion)){
			App::abort(404);
		}

		if(is_null($licitacion)){
			$this->layout->contenido = View::make('Licitaciones::nuevo', compact('empresas','estados','id','planeacion'));			
		}else{
			$this->layout->contenido = View::make('Licitaciones::editar', compact('empresas','estados','id','fianzas','tfianza','afianzadoras','tconvenio','convenios','adendos','planeacion'))->with('licitacion',$licitacion);
		}
	}

	public function setNuevo($id){
		$licitacion = new Licitaciones;

		$data = Input::all();
		if(!Input::has('l_cmic')){
			Input::merge(array('l_cmic' => '0'));
		}

		$data = Input::all();


		if($licitacion->validAndSave($data)){
			return Redirect::to('obras/resumen/'.Input::get('id'));
		}else{
			return Redirect::back()->with('menaje', 'Datos incorrectos, vuelve a intentarlo.')->withErrors($licitacion->errores)->withInput();
		}			
	}

	public function updateLicitaciones($id){		
		$licitacion = Licitaciones::find($id);
		if(is_null($licitacion)){
			App::abort(404);
		}


		$data = Input::all();
		if(!Input::has('l_cmic')){
			Input::merge(array('l_cmic' => '0'));
		}

		$data = Input::all();
		
		if($licitacion->validAndSave($data)){
			return Redirect::to('obras/resumen/'.Input::get('id'));
		}else{
			return Redirect::back()->with('menaje', 'Datos incorrectos, vuelve a intentarlo.')->withErrors($licitacion->errores)->withInput();
		}
	}

	public function agregaFianza($id){
		$data = Input::all();
		$fianza = new Fianzas;
		if($fianza->validAndSave($data)){
			return 'true';
		}else{
			return $fianza->errores;
		}
	}

	public function agregaConvenio($id){
		$data = Input::all();
		$convenio = new Convenio;
		if($convenio->validAndSave($data)){
			return 'true';
		}else{
			return $convenio->errores;
		}
	}


	public function agregaAdendo($id){
		$data = Input::all();
		$adendo = new Adendo;
		if($adendo->validAndSave($data)){
			return 'true';
		}else{
			return $adendo->errores;
		}
	}
}
