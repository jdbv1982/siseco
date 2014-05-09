<?php namespace App\Modules\Eventos\Controllers;

use Input, DB, Response;
use App\Modules\Eventos\Models\Evento;

class EventoController extends \BaseController{
	public function agregaEvento(){
		$data = Input::all();
		$evento = new Evento;
		if($evento->validAndSave($data)){
			return 'true';
		}else{
			return $evento->errores;
		}
	}

	public function getEventos(){
		$data = DB::table('eventos')->lists('id','nombre');
		return Response::json($data);
	}
}
