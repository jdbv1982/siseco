<?php namespace App\Modules\Permisos\Controllers;

use DB, View, User, Input, Redirect;

use App\Modules\Permisos\Models\Permiso;


class PermisoController extends \BaseController{
	protected $layout = "layouts.layout";

	public function getPermisos($id){	
		$usuario = User::find($id);
		$permisos = DB::select( DB::raw("SELECT c.id, c.nombre,c.descripcion, (SELECT p.visible FROM permisos AS p WHERE p.idpermiso = c.id AND p.idusuario = $id) AS visible FROM catpermisos AS c") );

		$this->layout->contenido = View::make('Permisos::permisos', compact('permisos','usuario'));
	}

	public function updatePermisos($id){
		$p = new Permiso;
		$datos = Input::get('permiso');		
		$permisos = DB::table('catpermisos')
			->select('id')
			->get();

		for ($i=0; $i<=count($permisos)-1; $i++) {
			$px = $p->getPermiso($id, $permisos[$i]->id);
			if(in_array($permisos[$i]->id, $datos)){
				$activo = 1;
			}else{
				$activo = 0;
			}

			$datap = array(
				'idusuario'=> $id,
				'idpermiso'=>$permisos[$i]->id,
				'visible'=> $activo
			);

			if(empty($px)){
				$px = new Permiso;
			}else{
				$px = Permiso::find($px[0]->id);
			}

			$px->validAndSave($datap);
		}

		return Redirect::to('usuarios/permisos/'.$id);

	}
}
