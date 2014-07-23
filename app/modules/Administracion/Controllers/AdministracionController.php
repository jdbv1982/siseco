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
		$tipos = array("1"=>"ESTATAL","2"=>"FEDERAL");
		$tclc = array("1"=>"ADMINISTRACION DIRECTA","2"=>"CONTRATO","3"=>"ANTICIPO");
		$facturas = $this->getFacturas($id);
		$fianzas = DB::table('fianzas')
			->select('numfianza')
			->where('idobra','=',$id)
			->get();
			$numfianzas = '';
			for ($i=0; $i < count($fianzas) ; $i++) {
				$numfianzas .= $fianzas[$i]->numfianza .',';
			}
			$numfianzas = substr($numfianzas, 0, -1);
		if(is_null($planeacion)){
			App::abort(404);
		}

		$this->layout->contenido = View::make('Administracion::nuevo', compact('planeacion','tipos','tclc','numfianzas','facturas'));
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
		$tipos = array("1"=>"ESTATAL","2"=>"FEDERAL");
		$tclc = array("1"=>"ADMINISTRACION DIRECTA","2"=>"CONTRATO","3"=>"ANTICIPO");
		$fianzas = DB::table('fianzas')
			->select('numfianza')
			->where('idobra','=',$administracion->idobra)
			->get();
			$numfianzas = '';
			for ($i=0; $i < count($fianzas) ; $i++) {
				$numfianzas .= $fianzas[$i]->numfianza .',';
			}
			$numfianzas = substr($numfianzas, 0, -1);
		if(is_null($administracion)){
			App::abort(404);
		}

		$this->layout->contenido = View::make('Administracion::editar', compact('administracion','tipos','tclc','numfianzas'));
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

	function getFacturas($id){
		$sql = "SELECT f.*
			FROM facturas f
			INNER JOIN estimaciones e ON e.id = f.idestimacion
			WHERE e.idobra = $id AND f.id NOT IN (SELECT numfactura FROM administracion WHERE idobra = $id )
			";

		$datos = DB::select( DB::raw($sql));
		return $datos;
	}
}
