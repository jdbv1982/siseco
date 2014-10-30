<?php namespace App\Modules\Obras\Controllers;

use View, DB, User, Input, Redirect;

use App\Modules\Planeacion\Models\Planeacion;
use App\Modules\Licitaciones\Models\Licitaciones;
use App\Modules\Contratistas\Models\Contratistas;
use App\Modules\Administracion\Models\Administracion;
use App\Modules\Obras\Models\Obras;
use App\Modules\Reportes\Models\Informacion;
use App\Modules\Planeacion\Models\Seguimiento;
use App\Modules\Obras\Models\Residencia;
use App\Modules\Residencias\Models\Residencias as re;

class ObrasController extends \BaseController{
	protected $layout = "layouts.layout";

	public function getListado($id){
		$sql ="SELECT p.id,
			(SELECT numerooficio FROM oficios WHERE idobra = p.id AND nombreoficio = 'AUTORIZACION') AS numerooficio,
			(SELECT nombre_fuente FROM fuentes WHERE id = p.idfuente) AS nombre_fuente,
			(SELECT nombre_region FROM regiones WHERE id = p.idregion) AS nombre_region,
			(SELECT nombre FROM tipo_obra WHERE id = p.tipo_obra_id ) AS tipo_obra,
			(SELECT nombre FROM residencias WHERE id = p.idresidencia) AS residencia,
			(SELECT nombre FROM status_obras WHERE id = p.status_id) AS status_obra,
			p.numeroobra, p.nombreobra, l.l_contrato
			FROM planeacion AS p
			LEFT JOIN licitaciones AS l ON p.id = l.id
			WHERE p.idfgeneral = $id";
		$obras = DB::select( DB::raw($sql));
		$this->layout->contenido = View::make('Obras::listado', compact('obras'));
	}

	public function getTodas(){
		$sql = "SELECT p.id,
			(SELECT numerooficio FROM oficios WHERE idobra = p.id AND nombreoficio = 'AUTORIZACION') AS numerooficio,
			(SELECT nombre_fuente FROM fuentes WHERE id = p.idfuente) AS nombre_fuente,
			(SELECT nombre_region FROM regiones WHERE id = p.idregion) AS nombre_region,
			(SELECT nombre FROM tipo_obra WHERE id = p.tipo_obra_id ) AS tipo_obra,
			(SELECT nombre FROM residencias WHERE id = p.idresidencia) AS residencia,
			(SELECT nombre FROM status_obras WHERE id = p.status_id) AS status_obra,
			p.nombreobra, l.l_contrato
			FROM planeacion AS p
			LEFT JOIN licitaciones AS l ON p.id = l.id";

		$obras = DB::select( DB::raw($sql));

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
		$obra = new Informacion;
		$planeacion = $obra->getInformacionId($id);
		$clasificadores = DB::table('classeguimiento')->lists('nombre','id');
		$subclasificadores = DB::table('subclasseguimiento')->lists('nombre','id');
		$residencias = DB::table('residencias')->lists('nombre','id');
		$this->layout->contenido = View::make('Obras::estatus', compact('planeacion','residencias','clasificadores','subclasificadores'));
	}

	public function seguimiento(){
		$data = Input::all();
		$seguimiento = Seguimiento::find($data['id']);
		if(is_null($seguimiento)){
			App::abort(404);
		}

		if($seguimiento->validAndSave($data)){
			return 'true';
		}else{
			return $evento->errores;
		}
	}

	public function residencia(){
		$data = Input::all();
		$residencia = Residencia::find($data['id']);
		if(is_null($residencia)){
			App::abort(404);
		}

		if($residencia->validAndSave($data)){
			return 'true';
		}else{
			return $evento->errores;
		}
	}

	public function getNombreResidencia($id){
		$residencia = re::find($id);
		if(is_null($residencia)){
			return '';
		}else{
			return $residencia->nombre;
		}
	}

}
