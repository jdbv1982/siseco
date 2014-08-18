<?php namespace App\Modules\Reportes\Controllers;

use View, DB, Input;

use App\Modules\Reportes\Models\Resumen_Planeacion as rep;
use App\Modules\Reportes\Servicios\Pdf_planeacion as RepPdf;

class PlaneacionController extends \BaseController{
	protected $regiones;
	protected $distritos;
	protected $municipios;
	protected $localidades;
	protected $fuentes;
	protected $residencias;

	public function __construct()
    	{
    		$this->regiones = DB::table('regiones')->lists('nombre_region','id');
		$this->distritos = DB::table('distritos')->where('idregion','=',1)->lists('nombre','id');
		$this->municipios = DB::table('municipios')->where('iddistrito','=',1)->lists('nombre_municipio','id');
		$this->localidades = DB::table('localidades')->where('idmunicipio','=',1)->lists('nombre_localidad','id');
		$this->fuentes = DB::table('fuentegeneral')->lists('fuentegeneral','id');
		$this->residencias = DB::table('residencias')->lists('nombre','id');
    	}

	public function formResumen(){
		$fuentes = $this->fuentes;
		$regiones = $this->regiones;
		$distritos = $this->distritos;
		$municipios = $this->municipios;
		$localidades = $this->localidades;
		$residencias = $this->residencias;
		return View::make('Reportes::planeacion.verresumen',compact('regiones','distritos','municipios','localidades','fuentes','residencias'));
	}

	public function verResumen(){
		$opcion = Input::get('filtro');

		$rep = new Rep;
		$rep_pdf = new RepPdf;
		$datos = $rep->get_Resumen_Planeacion($opcion);
		//$totales = $obras->getTotalesResumen();
		$totales = $rep->get_Totales_resumen();

		if( $opcion == ["idfgeneral"]){$filtro = 'FUENTE DE FINANCIAMIENTO';}
		if( $opcion == ["idregion"]){$filtro = 'REGION';}
		if( $opcion == ["iddistrito"]){$filtro = 'DISTRITO';}
		if( $opcion == ["idmunicipio"]){$filtro = 'MUNICIPIO';}
		if( $opcion == ["idlocalidad"]){$filtro = 'LOCALIDAD';}
		if( $opcion == ["idresidencia"]){$filtro = 'RESIDENCIA';}


		return $rep_pdf->printResumen($datos, $totales, $filtro);
	}
}
