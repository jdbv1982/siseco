<?php namespace App\Modules\Planeacion\Controllers;

use View, DB, Input, Redirect, Response, Auth, Mail;
use App\Modules\Planeacion\Models\Planeacion;
use App\Modules\Oficios\Models\Oficios;
use App\Modules\Estructura\Models\Estructura;
use App\Modules\Calendarizacion\Models\Calendarizacion;
use App\Modules\Notificaciones\Models\Notificacion as Noti;


class PlaneacionController extends \BaseController{
	protected $layout = "layouts.layout";

	public function setNuevo(){
		$regiones = DB::table('regiones')->lists('nombre_region','id');
		$distritos = DB::table('distritos')->where('idregion','=',1)->lists('nombre','id');
		$municipios = DB::table('municipios')->where('iddistrito','=',1)->lists('nombre_municipio','id');
		$localidades = DB::table('localidades')->where('idmunicipio','=',1)->lists('nombre_localidad','id');
		$fuentes = DB::table('fuentes')->lists('nombre_fuente','id');
		$subfuentes = DB::table('subfuentes')->lists('nombresubfuente','id');
		$origen = DB::table('origenes')->lists('nombreorigen','id');
		$suborigen = DB::table('suborigen')->lists('nombresuborigen','id');
		$clasificacion = DB::table('classuborigen')->lists('nombreclasificacion','id');
		$financiamiento = DB::table('financiamiento')->lists('nombrefinanciamiento','id');
		$medidas = DB::table('medidas')->lists('nombremedida','id');
		$programa = DB::table('programas')->lists('nombreprograma','id');
		$subprograma = DB::table('subprogramas')->lists('nombresubprograma','id');
		$tipoprograma = DB::table('tipoprogramas')->lists('nombretipo','id');
		$modalidad = DB::table('modalidad')->lists('nombremodalidad','id');
		$situacion = DB::table('situacion')->lists('nombresituacion','id');
		$tipos_obra = DB::table('tipo_obra')->lists('nombre','id');
		$tipo_atencion = DB::table('tipo_atencion')->lists('nombre','id');
		$metas = DB::table('metas')->lists('nombremeta','id');
		$tpoblacion = DB::table('poblacion')->lists('nombrepoblacion','id');
		$fgeneral = DB::table('fuentegeneral')->lists('fuentegeneral','id');
		$status_id = DB::table('status_obras')->lists('nombre','id');
		$this->layout->contenido = View::make('Planeacion::nuevo',
			compact('regiones','distritos','municipios','localidades','fuentes','subfuentes',
					'origen','suborigen','clasificacion','financiamiento','medidas','programa',
					'subprograma','tipoprograma','modalidad','situacion','metas','tpoblacion','fgeneral','tipos_obra','tipo_atencion','status_id'));
	}

	public function AddObra(){
		$noti = new Noti;
		$planeacion = new Planeacion;
		if($planeacion->validAndSave(Input::all())){
			$oficio = new Oficios;
			$data = array(
				'idobra' => $planeacion->id,
				'nombreoficio' => Input::get('nombreoficio'),
				'numerooficio' => Input::get('numerooficio'),
				'fechaoficio' => Input::get('fechaoficio'),
				'fecharecibido' => Input::get('fecharecibido')
			);
			$oficio->validAndSave($data);

			$concepto	=Input::get('concepto');
			$total 		= Input::get('total');
			$invfederal = Input::get('invfederal');
			$investatal = Input::get('investatal');
			$invmunicipal = Input::get('invmunicipal');
			$invparticipantes = Input::get('invparticipantes');
			for ($i=0; $i<=count($concepto)-1; $i++) {
				$datae = array(
					'idobra' => $planeacion->id,
					'concepto' => $concepto[$i],
					'total' => $total[$i],
					'invfederal' => $invfederal[$i],
					'investatal' => $investatal[$i],
					'invmunicipal' => $invmunicipal[$i],
					'invparticipantes' => $invparticipantes[$i],
					'status'	=> 1
				);
				$estructura = new Estructura;
				$estructura->validAndSave($datae);
			}

				$conceptocal = Input::get('conceptocal');
				$porcentaje = Input::get('porcentaje');
				$totalcal = Input::get('totalcal');
				$enero = Input::get('enero');
				$febrero = Input::get('febrero');
				$marzo = Input::get('marzo');
				$abril = Input::get('abril');
				$mayo = Input::get('mayo');
				$junio = Input::get('junio');
				$julio = Input::get('julio');
				$agosto = Input::get('agosto');
				$septiembre = Input::get('septiembre');
				$octubre = Input::get('octubre');
				$noviembre = Input::get('noviembre');
				$diciembre = Input::get('diciembre');
			for ($i=0; $i<=count($conceptocal)-1; $i++) {
				$datac = array(
					'idobra'	=> $planeacion->id,
					'conceptocal' => $conceptocal[$i],
					'porcentaje' => $porcentaje[$i],
					'totalcal' => $totalcal[$i],
					'enero' => $enero[$i],
					'febrero' => $febrero[$i],
					'marzo' => $marzo[$i],
					'abril' => $abril[$i],
					'mayo' => $mayo[$i],
					'junio' => $junio[$i],
					'julio' => $julio[$i],
					'agosto' => $agosto[$i],
					'septiembre' => $septiembre[$i],
					'octubre' => $octubre[$i],
					'noviembre' => $noviembre[$i],
					'diciembre' => $diciembre[$i],
					'status'	=> 1
					);

				$cale = new Calendarizacion;
				$cale->validAndSave($datac);
			}

			$envios = $noti->getDatos(1);
			for ($j = 0; $j < count($envios); $j++){
				$datan = array(
					'idremitente'	=> Auth::user()->id,
					'iddestino'		=> $envios[$j]->destinatario,
					'titulo'		=> 'Nueva Obra',
					'mensaje'		=> 'SE HA AGREGADO UNA NUEVA OBRA CON NUMERO '. Input::get('numeroobra') .' Y NOMBRE '.Input::get('nombreobra').''
				);

				$correo =$envios[$j]->email;
				$nombre = Auth::user()->nombre;
				$numeroobra = Input::get('numeroobra');
				$nombreobra = Input::get('nombreobra');

				Mail::send('Planeacion::notificacionobra',array('numeroobra'=>$numeroobra, 'nombreobra'=>$nombreobra), function($message) use ($correo, $nombre) {
			   		$message->to($correo, $nombre)->subject('Nueva Obra');
				});

				$noti = new Noti;
				$noti->validAndSave($datan);

			}


			return Redirect::to('/inicio');
		}else{
			return Redirect::back()->with('menaje', 'Datos incorrectos, vuelve a intentarlo.')->withErrors($planeacion->errores)->withInput();
		}
	}

	public function getPlaneacion($id){
		$obra = Planeacion::find($id);
		$estructura = DB::table('estructura')
			->groupBy('concepto')
			->where('idobra','=',$id)
			->get(array(
				'concepto',
				DB::raw( 'SUM(total) AS total' ),
				DB::raw( 'SUM(invfederal) AS invfederal' ),
				DB::raw( 'SUM(investatal) AS investatal' ),
				DB::raw( 'SUM(invmunicipal) AS invmunicipal' ),
				DB::raw( 'SUM(invparticipantes) AS invparticipantes' )
			));
       		$calen = DB::table('calendarizacion')
       			->groupBy('conceptocal')
       			->where('idobra','=',$id)
       			->get(array(
       				'conceptocal',
       				DB::raw( 'SUM(porcentaje) AS porcentaje' ),
       				DB::raw( 'SUM(totalcal) AS totalcal' ),
       				DB::raw( 'SUM(enero) AS enero' ),
       				DB::raw( 'SUM(febrero) AS febrero' ),
       				DB::raw( 'SUM(marzo) AS marzo' ),
       				DB::raw( 'SUM(abril) AS abril' ),
       				DB::raw( 'SUM(mayo) AS mayo' ),
       				DB::raw( 'SUM(junio) AS junio' ),
       				DB::raw( 'SUM(julio) AS julio' ),
       				DB::raw( 'SUM(agosto) AS agosto' ),
       				DB::raw( 'SUM(septiembre) AS septiembre' ),
       				DB::raw( 'SUM(octubre) AS octubre' ),
       				DB::raw( 'SUM(noviembre) AS noviembre' ),
       				DB::raw( 'SUM(diciembre) AS diciembre' )
       			));

		$oficios = DB::table('oficios')->where('idobra','=',$id)->get();
		$regiones = DB::table('regiones')->lists('nombre_region','id');
		$distritos = DB::table('distritos')->where('idRegion','=',$obra->idregion)->lists('nombre','id');
		$municipios = DB::table('municipios')->where('idDistrito','=',$obra->iddistrito)->lists('nombre_municipio','id');
		$localidades = DB::table('localidades')->where('idMunicipio','=',$obra->idmunicipio)->lists('nombre_localidad','id');
		$fuentes = DB::table('fuentes')->lists('nombre_fuente','id');
		$subfuentes = DB::table('subfuentes')->lists('nombresubfuente','id');
		$medidas = DB::table('medidas')->lists('nombremedida','id');
		$programa = DB::table('programas')->lists('nombreprograma','id');
		$subprograma = DB::table('subprogramas')->lists('nombresubprograma','id');
		$tipoprograma = DB::table('tipoprogramas')->lists('nombretipo','id');
		$modalidad = DB::table('modalidad')->lists('nombremodalidad','id');
		$situacion = DB::table('situacion')->lists('nombresituacion','id');
		$origen = DB::table('origenes')->lists('nombreorigen','id');
		$suborigen = DB::table('suborigen')->lists('nombresuborigen','id');
		$clasificacion = DB::table('classuborigen')->lists('nombreclasificacion','id');
		$financiamiento = DB::table('financiamiento')->lists('nombrefinanciamiento','id');
		$fgeneral = DB::table('fuentegeneral')->lists('fuentegeneral','id');
		$metas = DB::table('metas')->lists('nombremeta','id');
		$tpoblacion = DB::table('poblacion')->lists('nombrepoblacion','id');
		$tipos_obra = DB::table('tipo_obra')->lists('nombre','id');
		$tipo_atencion = DB::table('tipo_atencion')->lists('nombre','id');
		$status_id = DB::table('status_obras')->lists('nombre','id');
		$this->layout->contenido = View::make('Planeacion::editar',
			compact('regiones','distritos','municipios','localidades','fuentes',
				'estructura','oficios','calen','medidas','programa','subprograma',
				'tipoprograma','modalidad','situacion','subfuentes','origen','suborigen',
				'clasificacion','financiamiento','fgeneral','metas','tpoblacion','tipos_obra','tipo_atencion','status_id'))
		->with('obra', $obra);


	}

	public function updatePlaneacion($id){

		$data = Input::all();
		if(!Input::has('idobra')){
			Input::merge(array('idobra'=>$id));
		}
		$data = Input::all();

		//return $data;

		$planeacion = Planeacion::find($id);
		if(is_null($planeacion)){
			App::abort(404);
		}

		$data = Input::all();
		if($planeacion->validAndSave($data)){
			return Redirect::to('obras/resumen/'.$id);
		}else{
			return Redirect::back()->with('menaje', 'Datos incorrectos, vuelve a intentarlo.')->withErrors($planeacion->errores)->withInput();
		}
	}

	public function updateResidencia($id){
		$p = Planeacion::find($id);
		if(!is_null($p)){
			$p->idresidencia = Input::get('idresidencia');
			$p->save();
			return Redirect::to('obras/estatus/'.$id);
		}
	}


	public function getDistritos($id){
	    $data = DB::table('distritos')->where('idRegion','=',$id)->lists('id','nombre');
		return Response::json($data);
	}

	public function getMunicipios($id){
	    $data = DB::table('municipios')->where('idDistrito','=',$id)->lists('id','nombre_municipio');
		return Response::json($data);
	}

	public function getLocalidades($id){
	    $data = DB::table('localidades')->where('idMunicipio','=',$id)->lists('id','nombre_localidad');
		return Response::json($data);
	}

	public function getSubprogramas($id){
	    $data = DB::table('subprogramas')->where('cveprograma','=',$id)->lists('id','nombresubprograma');
		return Response::json($data);
	}

	public function getTipoProgramas($id){
	    $data = DB::table('tipoprogramas')->where('cveprograma','=',$id)->lists('id','nombretipo');
		return Response::json($data);
	}

	public function getDescripcion($valor){
	    $data = DB::table('ppi')->where('cveppi','=',$valor)->lists('nombreppi','id' );
		return Response::json($data);
	}

	public function getSubFuentes($id){
	    $data = DB::table('subfuentes')->where('idfuente','=',$id)->lists('id','nombresubfuente');
		return Response::json($data);
	}

	public function getOrigenes($id){
	    $data = DB::table('origenes')->where('idsubfuente','=',$id)->lists('id','nombreorigen');
		return Response::json($data);
	}

	public function getSubOrigenes($id){
	    $data = DB::table('suborigen')->where('idorigen','=',$id)->lists('id','nombresuborigen');
		return Response::json($data);
	}

	public function getClasificacion($id){
	    $data = DB::table('classuborigen')->where('idsuborigen','=',$id)->lists('id','nombreclasificacion');
		return Response::json($data);
	}

	public function getFinanciero($id){
	    $data = DB::table('financiamiento')->where('idclasificacion','=',$id)->lists('id','nombrefinanciamiento');
		return Response::json($data);
	}

	public function getMetas($id){
	    $data = DB::table('metas')->where('idmedida','=',$id)->lists('id','nombremeta');
		return Response::json($data);
	}









}
