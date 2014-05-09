<?php namespace App\Modules\Avances\Controllers;

use View, Input, Redirect, DB;

use App\Modules\Planeacion\Models\Planeacion;
use App\Modules\Avances\Models\Avance;

class AvanceController extends \BaseController{
	protected $layout = "layouts.layout";

	public function getNuevo($id){
		$obra = Planeacion::find($id);
		$this->layout->contenido = View::make('Avances::nuevo', compact('obra'));
	}

	public function uploadAvance($id){
		$destino = '../../avances/';
		$foto1 = '';
		$foto2 = '';
		$foto3 = '';
		$avance = new Avance;

		$foto1 = Input::file('foto1');
		$fotoname1 = $foto1->getClientOriginalName();
		$foto2 = Input::file('foto2');
		$fotoname2 = $foto2->getClientOriginalName();
		$foto3 = Input::file('foto3');
		$fotoname3 = $foto3->getClientOriginalName();

		$data = array(
			'idobra' => Input::get("idobra") ,
			'afisico' => Input::get("afisico"),
			'afinanciero' => Input::get("afinanciero"),
			'observaciones' => Input::get("observaciones"),
			'foto1' => $destino . $fotoname1,
			'foto2' => $destino . $fotoname2,
			'foto3' => $destino . $fotoname3
		);

		if($avance->validAndSave($data)){
			$foto1->move($destino, $fotoname1);
			$foto2->move($destino, $fotoname2);
			$foto3->move($destino, $fotoname3);
			return Redirect::to('obras/listado/'.Input::get('idfgeneral'));
		}else{
			return Redirect::back()->withErrors($acance->errores)->withInput();
		}

	}


	public function getTimeline($id){
		$obra = Planeacion::find($id);
		$time = DB::table('avances')->get();
		$this->layout->contenido = View::make('Avances::timeline', compact('time','obra'));
	}

}
