<?php namespace App\Modules\Notificaciones\Controllers;

use View, Input, DB, Redirect;
use App\Modules\Notificaciones\Models\Notificacion as Noti;


class NotificacionesController extends \BaseController{
	protected $layout = "layouts.layout";

	public function setVista($id){
		$noti = Noti::find($id);
		$noti->estado = 0;
		$noti->save();
		return Redirect::back()->withInput();
	}

	public function verNotificaciones($id){
		$noti = new Noti;
		$notificaciones = $noti->getTodas($id);
		$this->layout->contenido = View::make('Notificaciones::listado',compact('notificaciones'));
	}

	

}
