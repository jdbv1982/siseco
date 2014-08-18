<?php namespace App\Modules\Reportes\Controllers;

use DB, Input;
use App\Modules\Reportes\Models\Contratadas;
use App\Modules\Reportes\Servicios\Reportes;

use App\Modules\Reportes\Models\ObrasAutorizadas;

use App\Modules\Contratistas\Servicios\ContratistasReportes;
use App\Modules\Contratistas\Models\Contratista;

class ContratadasController extends \BaseController{
		public function verObrasAut(){
		$rep = new Reportes;
		$datos = Input::all();
		$obra = new ObrasAutorizadas;

		if(Input::has('chkregion')){$r = Input::get('idregion');}else{$r = 0;}
		if(Input::has('chkdistrito')){$d = Input::get('iddistrito');}else{$d = 0;}
		if(Input::has('chkmunicipio')){$m = Input::get('idmunicipio');}else{$m = 0;}
		if(Input::has('chklocalidad')){$l = Input::get('idlocalidad');}else{$l = 0;}

		$obras = $obra->getObrasAut($r, $d, $m, $l);

		return $rep->printObrasAutorizadas($obras);

	}

	public function verObrasContratadas(){
		$datos = Input::all();
		$obra = new Contratadas;
		$rep = new Reportes;

		if(Input::has('chkfgeneral')){$f = Input::get('idfgeneral');}else{$f = 0;}
		if(Input::has('chkregion')){$r = Input::get('idregion');}else{$r = 0;}
		if(Input::has('chkdistrito')){$d = Input::get('iddistrito');}else{$d = 0;}
		if(Input::has('chkmunicipio')){$m = Input::get('idmunicipio');}else{$m = 0;}
		if(Input::has('chklocalidad')){$l = Input::get('idlocalidad');}else{$l = 0;}

		$obrascon = $obra->getObrasContratadas($f, $r, $d, $m, $l);

		return $rep->printReporte($obrascon);

	}

	public function verResumen(){
		$opcion = Input::get('filtro');

		$rep = new Reportes;
		$obras = new Contratadas;
		$datos = $obras->getResumenInfo($opcion);
		$totales = $obras->getTotalesResumen();

		if( $opcion == ["idfgeneral"]){$filtro = 'FUENTE DE FINANCIAMIENTO';}
		if( $opcion == ["idregion"]){$filtro = 'REGION';}
		if( $opcion == ["iddistrito"]){$filtro = 'DISTRITO';}
		if( $opcion == ["idmunicipio"]){$filtro = 'MUNICIPIO';}
		if( $opcion == ["idlocalidad"]){$filtro = 'LOCALIDAD';}
		if( $opcion == ["idresidencia"]){$filtro = 'RESIDENCIA';}


		return $rep->printResumen($datos, $totales, $filtro);
	}
}
