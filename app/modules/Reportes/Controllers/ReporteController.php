<?php namespace App\Modules\Reportes\Controllers;

use View, DB, Input;



class ReporteController extends \BaseController{
	protected $layout = "layouts.layout";

	public function getObrasAut(){
		$regiones = DB::table('regiones')->lists('nombre_region','id');
		$distritos = DB::table('distritos')->where('idregion','=',1)->lists('nombre','id');
		$municipios = DB::table('municipios')->where('iddistrito','=',1)->lists('nombre_municipio','id');
		$localidades = DB::table('localidades')->where('idmunicipio','=',1)->lists('nombre_localidad','id');
		$this->layout->contenido = View::make('Reportes::obrasaut', compact('regiones','distritos','municipios','localidades'));
	}

	public function getObrasCont(){
		$regiones = DB::table('regiones')->lists('nombre_region','id');
		$fuentes = DB::table('fuentegeneral')->lists('fuentegeneral','id');
		$distritos = DB::table('distritos')->where('idregion','=',1)->lists('nombre','id');
		$municipios = DB::table('municipios')->where('iddistrito','=',1)->lists('nombre_municipio','id');
		$localidades = DB::table('localidades')->where('idmunicipio','=',1)->lists('nombre_localidad','id');
		$this->layout->contenido = View::make('Reportes::obrascont', compact('regiones','distritos','municipios','localidades','fuentes'));
	}

	public function formResumen(){
		$regiones = DB::table('regiones')->lists('nombre_region','id');
		$fuentes = DB::table('fuentegeneral')->lists('fuentegeneral','id');
		$distritos = DB::table('distritos')->where('idregion','=',1)->lists('nombre','id');
		$municipios = DB::table('municipios')->where('iddistrito','=',1)->lists('nombre_municipio','id');
		$localidades = DB::table('localidades')->where('idmunicipio','=',1)->lists('nombre_localidad','id');
		$this->layout->contenido = View::make('Reportes::verresumen',compact('regiones','distritos','municipios','localidades','fuentes'));
	}
	
}
	
