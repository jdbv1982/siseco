<?php namespace App\Modules\Licitaciones\Controllers;

use View, DB, Input, Redirect, App;
use App\Modules\Licitaciones\Models\Licitaciones;
use App\Modules\Planeacion\Models\Planeacion;
use App\Modules\Licitaciones\Models\Fianzas;
use App\Modules\Licitaciones\Models\Convenio;
use App\Modules\Licitaciones\Models\Adendo;
use App\Modules\Licitaciones\Models\Diferimiento;



class LicitacionesController extends \BaseController{
	protected $layout = "layouts.layout";

	public function getNuevo($id){
		$id = $id;
		$planeacion = Planeacion::find($id);
		$licitacion = Licitaciones::find($id);
		$empresas = DB::table('contratistas')->lists('razsoc','id');
		$estados = DB::table('estados')->lists('nombre','id');
		$tconvenio = DB::table('ctipos')->where('tipo','=','2')->lists('nombre','id');
		$tfianza = DB::table('ctipos')->where('tipo','=','1')->lists('nombre','id');
		$afianzadoras = DB::table('afianzadoras')->lists('nombreafianzadora','id');


		$fianzas = DB::table('fianzas as f')
		->join('ctipos as t','f.tipofianza','=','t.id')
		->select('f.id','f.numfianza','f.montofianza','fechafianza','t.nombre','f.numfactura','montofactura')
		->where('idobra','=',$id)->get();

		$convenios = DB::table('convenios as c')
		->join('ctipos as t','c.tipoconvenio','=','t.id')
		->select('c.id','c.numconvenio','c.fechaconvenio','t.nombre','c.cantidad','c.finicio','c.ffinal')
		->where('idobra','=',$id)->get();

		$adendos = DB::table('adendos')->where('idobra','=',$id)->get();

		$diferimientos = DB::table('diferimientos')->where('idobra','=',$id)->get();


		if(is_null($planeacion)){
			App::abort(404);
		}

		if(is_null($licitacion)){
			$this->layout->contenido = View::make('Licitaciones::nuevo', compact('empresas','estados','id','planeacion'));
		}else{
			$this->layout->contenido = View::make('Licitaciones::editar', compact('empresas','estados','id','fianzas','tfianza','afianzadoras','tconvenio','convenios','adendos','planeacion','diferimientos'))->with('licitacion',$licitacion);
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

	public function getConvenio($id){
		$conv = Convenio::find($id);
		$tconvenio = DB::table('ctipos')->where('tipo','=','2')->lists('nombre','id');
		if(is_null($conv)){
			App::abort(404);
		}

		$this->layout->contenido = View::make('Licitaciones::editarconvenio', compact('conv','tconvenio'));
	}

	public function setConvenio($id){
		$conv = Convenio::find($id);
		if(is_null($conv)){
			App::abort(404);
		}

		$data = Input::all();
		if($conv->validAndSave($data)){
			return Redirect::to('licitaciones/nuevo/'.$conv->idobra);
		}else{
			return Redirect::back()->with('menaje', 'Datos incorrectos, vuelve a intentarlo.')->withErrors($conv->errores)->withInput();
		}
	}

	public function getFianza($id){
		$fianza = Fianzas::find($id);
		$tfianza = DB::table('ctipos')->where('tipo','=','1')->lists('nombre','id');
		$afianzadoras = DB::table('afianzadoras')->lists('nombreafianzadora','id');

		if(is_null($fianza)){
			App::abort(404);
		}

		$this->layout->contenido = View::make('Licitaciones::editarfianza', compact('fianza','tfianza','afianzadoras'));
	}

	public function setFianza($id){
		$fianza = Fianzas::find($id);
		if(is_null($fianza)){
			App::abort(404);
		}

		$data = Input::all();
		if($fianza->validAndSave($data)){
			return Redirect::to('licitaciones/nuevo/'.$fianza->idobra);
		}else{
			return Redirect::back()->with('menaje', 'Datos incorrectos, vuelve a intentarlo.')->withErrors($fianza->errores)->withInput();
		}
	}

	public function getNuevaFianza($id){
		$tfianza = DB::table('ctipos')->where('tipo','=','1')->lists('nombre','id');
		$afianzadoras = DB::table('afianzadoras')->lists('nombreafianzadora','id');

		$this->layout->contenido = View::make('Licitaciones::nuevafianza', compact('id','tfianza','afianzadoras'));
	}

	public function setNuevaFianza(){
		$data = Input::all();
		$fianza = new Fianzas;

		if($fianza->validAndSave($data)){
			return Redirect::to('obras/resumen/'.Input::get('idobra'));
		}else{
			return Redirect::back()->with('menaje', 'Datos incorrectos, vuelve a intentarlo.')->withErrors($fianza->errores)->withInput();
		}

	}


	public function getDiferimiento($id){
		$diferimiento = Diferimiento::find($id);

		if(is_null($diferimiento)){
			App::abort(404);
		}

		$this->layout->contenido = View::make('Licitaciones::editardiferimiento', compact('diferimiento'));
	}

	public function setDiferimiento($id){
		$data = Input::all();
		$diferimiento = Diferimiento::find($id);
		if(is_null($diferimiento)){
			App::abort(404);
		}

		if($diferimiento->validAndSave($data)){
			return Redirect::to('licitaciones/nuevo/'.$diferimiento->idobra);
		}else{
			return Redirect::back()->with('menaje', 'Datos incorrectos, vuelve a intentarlo.')->withErrors($diferimiento->errores)->withInput();
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

	public function agregaDiferimiento($id){
		$data = Input::all();
		$diferimiento = new Diferimiento;
		if($diferimiento->validAndSave($data)){
			return 'true';
		}else{
			return $diferimiento->errores;
		}
	}
}
