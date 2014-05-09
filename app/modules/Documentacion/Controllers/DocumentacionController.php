<?php namespace App\Modules\Documentacion\Controllers;

use View, Input, Redirect, DB;
use App\Modules\Planeacion\Models\Planeacion;
use App\Modules\Documentacion\Models\Documentacion;

class DocumentacionController extends \BaseController{
	protected $layout = "layouts.layout";

	public function getNuevo($id){
		$obra =  Planeacion::find($id);
		$doctos = DB::table('documentacion')->where('idobra','=',$id)->get();
		$this->layout->contenido = View::make('Documentacion::agregar', compact('obra','doctos'));
	}

	public function uploadDoc($id){
		$destino = '../../documentacion/';
		$filename = '';
		$doc = new Documentacion;

		$file = Input::file("d_urldoc");
		$filename = $file->getClientOriginalName();

    	$data = array(
	        "idobra"		=>    Input::get("idobra"),
	        "d_nombredoc"   =>    Input::get("d_nombredoc"),
	        'id_usuario'	=> Input::get('id_usuario'),
	        "d_urldoc"        =>    $destino . $filename//campo foto para validar
	    );

		if($doc->validAndSave($data)){
			$file->move($destino, $filename );
			return Redirect::refresh();
		}else{
			return Redirect::back()->withErrors($doc->errores)->withInput();
		}
	}

}
