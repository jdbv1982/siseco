<?php namespace App\Modules\Contratistas\Controllers;


use App\Modules\Contratistas\Models\Contratista;
use App\Modules\Contratistas\Servicios\ContratistasReportes;

class RcController extends \BaseController{
	public function listadoContratistas(){
		$datos = Contratista::all();
		$rep = new ContratistasReportes;
		return $rep->listado($datos);
	}

}
