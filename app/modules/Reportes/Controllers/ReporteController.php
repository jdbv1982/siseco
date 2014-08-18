<?php namespace App\Modules\Reportes\Controllers;

use View, DB, Input;

class ReporteController extends \BaseController{
	protected $layout = "layouts.layout";
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

	public function getObrasAut(){
		$regiones = $this->regiones;
		$distritos = $this->distritos;
		$municipios = $this->municipios;
		$localidades = $this->localidades;
		return View::make('Reportes::obrasaut', compact('regiones','distritos','municipios','localidades'));
	}

	public function getObrasCont(){
		$fuentes = $this->fuentes;
		$regiones = $this->regiones;
		$distritos = $this->distritos;
		$municipios = $this->municipios;
		$localidades = $this->localidades;
		return View::make('Reportes::obrascont', compact('regiones','distritos','municipios','localidades','fuentes'));
	}

	public function formResumen(){
		$fuentes = $this->fuentes;
		$regiones = $this->regiones;
		$distritos = $this->distritos;
		$municipios = $this->municipios;
		$localidades = $this->localidades;
		$residencias = $this->residencias;
		$this->layout->contenido = View::make('Reportes::verresumen',compact('regiones','distritos','municipios','localidades','fuentes','residencias'));
	}
}

