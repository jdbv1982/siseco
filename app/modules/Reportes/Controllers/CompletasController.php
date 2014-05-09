<?php namespace App\Modules\Reportes\Controllers;

use DB;
use App\Modules\Reportes\Servicios\Completas;
use App\Modules\Reportes\Models\Informacion;


class CompletasController extends \BaseController{
		public function informacion(){
		$rep = new Completas;
		$obra = new Informacion;

		$obras = $obra->getInformacion();

		return $rep->printInformacion($obras);

	}


}
