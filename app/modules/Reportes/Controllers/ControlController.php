<?php namespace App\Modules\Reportes\Controllers;

use DB;
use App\Modules\Reportes\Models\Control;
use App\Modules\Reportes\Servicios\ImpresionControl;


class ControlController extends \BaseController{
	public function inf_anual_fuente(){
		$datos = new Control;
		$impresion = new ImpresionControl;

		$totales = $datos->getInvAnual('true');

		return $impresion->printInversionAnual($datos->getInvAnual(), $totales);

	}


}
