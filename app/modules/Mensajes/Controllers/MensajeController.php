<?php namespace App\Modules\Mensajes\Controllers;

use Auth;
use App\Modules\Mensajes\Models\Mensaje;

class MensajeController extends \BaseController{

	public function addMensaje(){
		$remitente = Auth::User()->id;
		$destinatario = $_POST['id'];
		$msg = $_POST['mensaje'];

		$data = array(
				'mensaje_id'	=> 0,
				'destinatario'	=> $destinatario,
				'mensaje'	=> $msg,
				'remitente'	=> $remitente,
				'status'		=> 1
			);

		$m = new Mensaje;
		if($m->validAndSave($data)){
			if($m->mensaje_id == 0){
				$m->mensaje_id = $m->id;
				$m->save();
			}
			return 'true';
		}else{
			return $m->errores;
		}

	}
}
