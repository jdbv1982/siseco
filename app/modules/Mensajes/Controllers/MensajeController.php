<?php namespace App\Modules\Mensajes\Controllers;

use Auth, View;

use App\Modules\Mensajes\Models\Mensaje;
use App\Modules\Mensajes\Repositories\MensajesRepo;

class MensajeController extends \BaseController{

    protected $mensajesRepo;
    protected $layout = "layouts.layout";

    public function __construct(MensajesRepo $mensajesRepo){
        $this->mensajesRepo = $mensajesRepo;
    }

	public function addMensaje(){
		$remitente = Auth::User()->id;
		$destinatario = $_POST['id'];
		$msg = $_POST['mensaje'];
        		$mensaje_id = $_POST['mensaje_id'];

		$data = array(
				'mensaje_id'	=> $mensaje_id,
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

	public function listMensajes(){
		return Auth::User()->id;
	}


	public function vistaMensaje($id){
		$mensajes = $this->mensajesRepo->getMensajes($id);
		$this->layout->contenido = View::make('Mensajes::mensaje', compact('mensajes'));
	}

    public function changeStatus($id){
        $mensaje = Mensaje::find($id);

        if($mensaje->status == 0){
            $mensaje->status = 1;
        }else{
            $mensaje->status = 0;
        }

        $mensaje->save();
        $mensaje = Mensaje::find($id);
        return $mensaje->status;

    }

    public function listAllMensajes(){
    	$mensajes = $this->mensajesRepo->getAllMessages(Auth::User()->id);
    	$this->layout->contenido = View::make('Mensajes::list_all_mensajes', compact('mensajes'));
    }
}
