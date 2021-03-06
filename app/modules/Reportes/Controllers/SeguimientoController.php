<?php namespace App\Modules\Reportes\Controllers;

setlocale(LC_ALL,'es_ES');

use Input;

use App\Modules\Reportes\Servicios\AnexoVI;
use App\Modules\Reportes\Models\Anexos;

class SeguimientoController extends \BaseController{
	public function AnexoVI($id){
		$fecha_anexo = Input::get('fecha-anexo');
		$anexo = new AnexoVI;
		$info = new Anexos;

		$datos = $info->get_anexo6($id);
		$datos_reporte =  $info->get_datos_reporte(1);
		$estructura = $info->get_estructura($id);
		$programado = $info->get_programado($id);
		$fisico = $info->get_real($id,'afisico');
		$financiero = $info->get_real($id,'afinanciero');
		$prorrogas = $info->get_prorrogas($id);




		return $anexo->printInformacion($datos,$datos_reporte, $estructura, $programado, $fisico, $financiero, $prorrogas, $fecha_anexo);
	}

	public function invFuenteClasificacion(){

	}

}
