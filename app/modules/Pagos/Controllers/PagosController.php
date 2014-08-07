<?php namespace App\Modules\Pagos\Controllers;

use View, DB, Response, Input, Redirect;

use App\Modules\Clcs\Models\Obraclc;

use App\Modules\Planeacion\Models\Planeacion;
use App\Modules\Licitaciones\Models\Licitaciones;
use App\Modules\Contratistas\Models\Contratista;
use App\Modules\Pagos\Models\Pago;

class PagosController extends \BaseController{

	protected $layout = "layouts.layout";

	public function nueva($id){
		$clc = Obraclc::find($id);
		$obra = Planeacion::find($clc->idobra);
		$factura = $this->getNumeroFactura($clc->no_afectacion);
		$beneficiario = $this->getNombreBeneficiario($clc->idobra);
		$ejercicios = DB::table('ejercicios')->lists('nombre','id');
		$bancos = DB::table('bancos')->lists('nombre','id');
		$cuentas = DB::table('cuentas')->lists('nombre','id');
		$status = DB::table('status_clc')->lists('nombre','id');

		try{
			$orden = Pago::where('clc_id','=',$id)->get();
			$orden= $orden[0];
		}catch(\Exception $e){
			$orden = [];
		}

		if(empty($orden)){
			$this->layout->contenido = View::make('Pagos::nueva', compact('clc','obra','factura','beneficiario','ejercicios','bancos','cuentas','status'));
		}else{
			$this->layout->contenido = View::make('Pagos::editar', compact('orden','clc','obra','factura','beneficiario','ejercicios','bancos','cuentas','status'));
		}


		$this->layout->js = 'assets/js/clc_ajax.js';
	}


	public function guardar(){
		$data = Input::all();
		$pago = new Pago;

		if($pago->validAndSave($data)){
			$this->updateStatusClc( $data['clc_id'], $data['id_status']);
			return Redirect::to('clc/listado');
		}else{
			return Redirect::back()->withErrors($pago->errores)->withInput();
		}
	}


	public function editar($id){
		$data = Input::all();

		$orden = Pago::find($id);

		if(is_null($orden)){
			App::abort(404);
		}

		if($orden->validAndSave($data)){
			$this->updateStatusClc( $data['clc_id'], $data['id_status']);
   			return Redirect::to('clc/listado');
		}else{
			return Redirect::back()->withErrors($orden->errores)->withInput();
   		}

	}

	public function updateStatusClc($id, $status){
		$clc = Obraclc::find($id);

		if( ! is_null($clc)){
			$data = [
				'idobra' => $clc->idobra,
				'no_afectacion' => $clc->no_afectacion,
				'concepto' => $clc->concepto,
				'id_status' => $status
			];

			$clc->validAndSave($data);
		}
	}

	public function getNumeroFactura($numero){
		$sql = "SELECT referencia
			FROM clcs
			WHERE no_afectacion = ". $numero ." LIMIT 1";
		$referencia = DB::select( DB::raw($sql));
		return $referencia[0]->referencia;
	}

	public function getNombreBeneficiario($id){
		$l = Licitaciones::find($id);

		if(is_null($l)){
			return "";
		}

		$beneficiario = Contratista::find($l->l_idempresa);
		return $beneficiario->razsoc;
	}

	public function getCuentas(){
		$ejercicio = $_POST['ejercicio'];
		$banco = $_POST['banco'];

		$data = DB::table('cuentas')
			->where('ejercicio_id','=',$ejercicio)
			->where('banco_id','=',$banco)
			->lists('id','nombre');

		return Response::json($data);
	}
}
