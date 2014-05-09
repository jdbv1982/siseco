<?php namespace App\Modules\Reportes\Models;

use DB;

class Contratadas extends \Eloquent{
	public function getObrasContratadas($f, $r, $d, $m, $l){
		if(($f == 0) and ($r == 0) and ($d == 0) and ($m == 0) and ($l == 0)){
			return DB::table('planeacion as p')
				->join('regiones as r','r.id','=','p.idregion')
				->join('fuentegeneral as f','f.id','=','p.idfgeneral')
				->join('distritos as d','d.id','=','p.iddistrito')
				->join('municipios as m','m.id','=','p.idmunicipio')
				->join('localidades as lo','lo.id','=','p.idlocalidad')
				->join('estructura as es','p.id','=','es.idobra')
				->leftjoin('licitaciones as l','l.id','=','p.id')
				->leftjoin('contratistas as c','c.id','=','l.l_idempresa')
				->groupBy('r.nombre_region','p.nombreobra','f.fuentegeneral','d.nombre','m.nombre_municipio','lo.nombre_localidad','l.l_contrato')
				->get(array(
		            'r.nombre_region','p.nombreobra', 'f.fuentegeneral','d.nombre as nombre_distrito','m.nombre_municipio','lo.nombre_localidad','l.l_contrato',
					DB::raw( 'SUM(es.investatal) AS monto' ),'l.l_montocontratado','c.razsoc'
				));
		}
	}

	public function getResumenInfo($op){
		if( $op == ["idfgeneral"]){
			return DB::table('planeacion as p')
				->join('fuentegeneral as f','f.id','=','p.idfgeneral')
				->join('estructura as es','p.id','=','es.idobra')
				->leftjoin('licitaciones as l','p.id','=','l.id')
				->groupBy('f.fuentegeneral')
				->get(array(
					'f.fuentegeneral as nombre' ,
					DB::raw( 'COUNT(DISTINCT(p.id)) AS autorizadas' ),
					DB::raw( 'SUM(es.investatal) AS montoautorizado' ),
					DB::raw( 'COUNT(l.id) AS contratadas' ),
					DB::raw( 'SUM(l.l_montocontratado) AS montocontratado' )
			));
		}

		if( $op == ["idregion"]){
			return DB::table('planeacion as p')
				->join('regiones as r','r.id','=','p.idregion')
				->join('estructura as es','p.id','=','es.idobra')
				->leftjoin('licitaciones as l','p.id','=','l.id')
				->groupBy('r.id')
				->get(array(
					'r.nombre_region as nombre' ,
					DB::raw( 'COUNT(DISTINCT(p.id)) AS autorizadas' ),
					DB::raw( 'SUM(es.investatal) AS montoautorizado' ),
					DB::raw( 'COUNT(l.id) AS contratadas' ),
					DB::raw( 'SUM(l.l_montocontratado) AS montocontratado' )

			));
		}

		if( $op == ["iddistrito"]){
			return DB::table('planeacion as p')
				->join('distritos as d','d.id','=','p.iddistrito')
				->join('estructura as es','p.id','=','es.idobra')
				->leftjoin('licitaciones as l','p.id','=','l.id')
				->groupBy('d.id')
				->get(array(
					'd.nombre as nombre' ,
					DB::raw( 'COUNT(DISTINCT(p.id)) AS autorizadas' ),
					DB::raw( 'SUM(es.investatal) AS montoautorizado' ),
					DB::raw( 'COUNT(l.id) AS contratadas' ),
					DB::raw( 'SUM(l.l_montocontratado) AS montocontratado' )
			));
		}

		if( $op == ["idmunicipio"]){
			return DB::table('planeacion as p')
				->join('municipios as m','m.id','=','p.idmunicipio')
				->join('estructura as es','p.id','=','es.idobra')
				->leftjoin('licitaciones as l','p.id','=','l.id')
				->groupBy('m.id')
				->get(array(
					'm.nombre_municipio as nombre' ,
					DB::raw( 'COUNT(DISTINCT(p.id)) AS autorizadas' ),
					DB::raw( 'SUM(es.investatal) AS montoautorizado' ),
					DB::raw( 'COUNT(l.id) AS contratadas' ),
					DB::raw( 'SUM(l.l_montocontratado) AS montocontratado' )
			));
		}

		if( $op == ["idlocalidad"]){
			return DB::table('planeacion as p')
				->join('localidades as lo','lo.id','=','p.idmunicipio')
				->join('estructura as es','p.id','=','es.idobra')
				->leftjoin('licitaciones as l','p.id','=','l.id')
				->groupBy('lo.id')
				->get(array(
					'lo.nombre_localidad as nombre' ,
					DB::raw( 'COUNT(DISTINCT(p.id)) AS autorizadas' ),
					DB::raw( 'SUM(es.investatal) AS montoautorizado' ),
					DB::raw( 'COUNT(l.id) AS contratadas' ),
					DB::raw( 'SUM(l.l_montocontratado) AS montocontratado' )
			));
		}



	}

	public function getTotalesResumen(){
		return DB::table('planeacion as p')
			->join('fuentegeneral as f','f.id','=','p.idfgeneral')
			->join('estructura as es','p.id','=','es.idobra')
			->leftjoin('licitaciones as l','p.id','=','l.id')
			//->groupBy('f.fuentegeneral')
			->get(array(
				'f.fuentegeneral' ,
				DB::raw( 'COUNT(DISTINCT(p.id)) AS autorizadas' ),
				DB::raw( 'SUM(es.investatal) AS montoautorizado' ),
				DB::raw( 'COUNT(l.id) AS contratadas' ),
				DB::raw( 'SUM(l.l_montocontratado) AS montocontratado' )

			));
	}
}
