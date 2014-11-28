<?php namespace App\Modules\Licitaciones\Repositories;

use Redirect;

use App\Modules\Licitaciones\Models\Licitaciones;


class LicitacionRepo {
	public function setAD($id, $data){
		$l = Licitaciones::find($id);
		if(is_null($l)){
			$l = new Licitaciones;
		}
		$l->validAndSave($data);
		return Redirect::to('obras/administracion-directa/');
	}


}
