<?php namespace App\Modules\Obras\Controllers;

use View, DB, User, Input, Redirect;

use App\Modules\Planeacion\Models\Planeacion;
use App\Modules\Licitaciones\Models\Licitaciones;
use App\Modules\Contratistas\Models\Contratistas;
use App\Modules\Administracion\Models\Administracion;
use App\Modules\Obras\Models\Obras;

class ObrasController extends \BaseController{
	protected $layout = "layouts.layout";

	public function getListado($id){
		$obras = DB::table('planeacion')
			->join('fuentes','planeacion.idfuente','=','fuentes.id')
			->join('regiones','planeacion.idRegion','=','regiones.id')
			->join('oficios','planeacion.id','=','oficios.idobra')
			->leftjoin('licitaciones','planeacion.id','=','licitaciones.id')
			->select('planeacion.*','fuentes.nombre_fuente','regiones.nombre_region','oficios.numerooficio','oficios.nombreoficio','licitaciones.l_contrato')
			->where('idfgeneral','=',$id)
			->where('nombreoficio','=','AUTORIZACION', 'AND')
			->get();
		$this->layout->contenido = View::make('Obras::listado', compact('obras'));
	}

	public function getResumen(){
		//opotenemos los datos de planeacion
		$planeacion = DB::table('planeacion')
            ->join('fuentes', 'planeacion.idfuente', '=', 'fuentes.id')
            ->groupBy('planeacion.idfuente')
            ->get( array(
            		'fuentes.nombre_fuente',
			        DB::raw( 'COUNT(planeacion.id) AS numobras' ),
			        DB::raw( 'SUM(planeacion.inv_aut) AS monto' ),
			    ));
         $totplan = DB::table('planeacion')->get(array(
         	DB::raw( 'COUNT(planeacion.id) AS plantotobras' ),
			DB::raw( 'SUM(planeacion.inv_aut) AS plantotmonto' ),
         ));

         //optenemos los datos de licitaciones
         $licitaciones = DB::table('licitaciones')
         	->join('planeacion', 'planeacion.id','=','licitaciones.id')
         	->join('fuentes','planeacion.idfuente','=','fuentes.id')
         	->groupBy('planeacion.idfuente')
         	->get(array(
         			'fuentes.nombre_fuente',
         			DB::raw( 'COUNT(planeacion.id) AS licnumobras' ),
					DB::raw( 'SUM(licitaciones.l_montocontratado) AS licmonto' ),
         		));

         	$totlic = DB::table('licitaciones')
         	->join('planeacion', 'planeacion.id','=','licitaciones.id')
         	->join('fuentes','planeacion.idfuente','=','fuentes.id')
         	->get(array(
         			DB::raw( 'COUNT(planeacion.id) AS lictotobras' ),
					DB::raw( 'SUM(licitaciones.l_montocontratado) AS lictotmonto' ),
         		));
         //falta optener y definir los datos de OBRAS

        //optenemos los datos de Administracion
		$administracion = DB::table('administracion')
         	->join('planeacion', 'planeacion.id','=','administracion.id')
         	->join('fuentes','planeacion.idfuente','=','fuentes.id')
         	->groupBy('planeacion.idfuente')
         	->get(array(
         			'fuentes.nombre_fuente',
         			DB::raw( 'COUNT(planeacion.id) AS admnumobras' ),
					DB::raw( 'SUM(administracion.a_afinanciero) AS admmonto' ),
         		));

         	$totadm = DB::table('administracion')
         	->join('planeacion', 'planeacion.id','=','administracion.id')
         	->join('fuentes','planeacion.idfuente','=','fuentes.id')
         	->get(array(
         			DB::raw( 'COUNT(planeacion.id) AS admtotobras' ),
					DB::raw( 'SUM(administracion.a_afinanciero) AS admtotmonto' ),
         		));



		$this->layout->contenido = View::make('Obras::resumen', compact('planeacion', 'totplan','licitaciones','totlic','administracion','totadm'));
	}

	public function getResumenObra($id){
		$planeacion = Planeacion::find($id);
		if(is_null($planeacion)){
			App::abort(404);
		}

		$licitaciones = Licitaciones::find($id);
		if(is_null($licitaciones)){
			$empresa = DB::table('contratistas')->get();
		}else{
			$empresa = Contratistas::find($licitaciones->l_idempresa);

			if($licitaciones->l_tipoemp == 1){
				$tipoempresa = 'Local';
			}else{
				$tipoempresa = 'Foranea';
			}

			if($licitaciones->l_cmic == 1){
				$cmic = 'SI';
			}else{
				$cmic = 'NO';
			}
		}

		$obras = Obras::find($id);
		$administracion = DB::table('administracion')
			->where('idobra','=',$id)
			->where('montopagado','=',0,'AND')
			->get();

		$estimaciones = DB::table('estimaciones')
			->where('idobra','=',$id)
			->get();

		$oficio = DB::table('oficios')->where('idobra','=',$id)->first();

		$mobras = new Obras;
        $avances = $mobras->getAvance($id);
		$this->layout->contenido = View::make('Obras::resumenobra', compact('licitaciones','empresa', 'tipoempresa','cmic','administracion','oficio','obras','avances','estimaciones'))->with('planeacion', $planeacion);
	}

	public function getNuevo($id){
		$data = new Obras;
		$obra = $data->getInfoObras($id);
		$estimaciones = $data->getEstimaciones($id);
		$avances = $data->getAvance($id);
		$estatus = DB::table('eststatus')->lists('nombre','id');
		$evento = DB::table('eventos')->lists('nombre','id');

		$obraexiste = Obras::find($id);

		if(is_null($obraexiste)){
			$this->layout->contenido = View::make('Obras::nuevo',compact('obra','autorizado','estimaciones','estatus','evento', 'avances'));
		}else{
			$this->layout->contenido = View::make('Obras::editar',compact('obra','autorizado','estimaciones','estatus','evento','obraexiste','avances'));
		}

	}

	public function updateObra($id){
		$obra = Obras::find($id);
		if(is_null($obra)){
			App::abort(404);
		}

		$data = Input::all();
		if($obra->validAndSave($data)){
			return Redirect::to('obras/resumen/'.Input::get('id'));
		}else{
			return Redirect::back()->with('menaje', 'Datos incorrectos, vuelve a intentarlo.')->withErrors($obra->errores)->withInput();
		}

	}

	public function setNuevo($id){
		$data = Input::all();
		$obra = new Obras;
		if($obra->validAndSave($data)){
			return Redirect::to('obras/resumen/'.Input::get('id'));
		}else{
			return Redirect::back()->with('menaje', 'Datos incorrectos, vuelve a intentarlo.')->withErrors($obra->errores)->withInput();
		}

	}

	public function verEstatus($id){
		$planeacion = DB::table('planeacion')
			->join('fuentes','planeacion.idfuente','=','fuentes.id')
			->join('regiones','planeacion.idRegion','=','regiones.id')
			->join('oficios','planeacion.id','=','oficios.idobra')
			->leftjoin('licitaciones as l','planeacion.id','=','l.id')
			->select('planeacion.*','fuentes.nombre_fuente','regiones.nombre_region','oficios.numerooficio','oficios.nombreoficio',
				'l.l_procedimiento', 'l.l_contrato','l.l_montocontratado','l.l_anticipo',
				'l.l_ndias')
			->where('planeacion.id','=',$id)
			->where('nombreoficio','=','AUTORIZACION', 'AND')
			->get();
		$residencias = DB::table('residencias')->lists('nombre','id');
		$this->layout->contenido = View::make('Obras::estatus', compact('planeacion','residencias'));
	}

}
