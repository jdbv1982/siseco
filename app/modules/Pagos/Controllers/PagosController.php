<?php namespace App\Modules\Pagos\Controllers;

use View, DB, Response, Input, Redirect;

use App\Modules\Clcs\Models\Obraclc;
use App\Modules\Clcs\Controllers\ClcController;


use App\Modules\Planeacion\Models\Planeacion;
use App\Modules\Licitaciones\Models\Licitaciones;
use App\Modules\Contratistas\Models\Contratista;
use App\Modules\Pagos\Models\Pago;

class PagosController extends \BaseController{

	protected $layout = "layouts.layout";

	public function lista($id){
		$clc = Obraclc::find($id);
		$ordenes =DB::table('pagos as p')
				->select('p.id','p.folio','p.beneficiario','p.observaciones','p.concepto','p.total','sc.nombre')
				->join('status_clc as sc','sc.id','=','p.status_id')
				->where('clc_id','=',$id)
				->get();
		$monto_total = $this->getImporteClc($clc->no_afectacion);
		$monto_ordenado = $this->getImporteOrdenado($id);
		$this->layout->contenido = View::make('Pagos::lista', compact('ordenes','id','monto_total','monto_ordenado'));
	}

	public function nueva($id){
		$clc = Obraclc::find($id);
		$monto_total = $this->getImporteClc($clc->no_afectacion);
		$monto_ordenado = $this->getImporteOrdenado($id);
		$obra = Planeacion::find($clc->idobra);
		$factura = $this->getNumeroFactura($clc->no_afectacion);
		$beneficiario = $this->getNombreBeneficiario($clc->idobra);
		$ejercicios = DB::table('ejercicios')->lists('nombre','id');
		$bancos = DB::table('bancos')->lists('nombre','id');
		$cuentas = DB::table('cuentas')->lists('nombre','id');
		$status = DB::table('status_clc')->lists('nombre','id');

		$this->layout->contenido = View::make('Pagos::nueva', compact('clc','obra','factura','beneficiario','ejercicios','bancos','cuentas','status','monto_total','monto_ordenado'));

		$this->layout->js = 'assets/js/clc_ajax.js';
	}


	public function guardar(){
		$data = Input::all();
		$pago = new Pago;

		if($pago->validAndSave($data)){
			$clcCtl = new ClcController;
			$clcCtl->setStatusHistorial($data['clc_id'], $data['status_id'],'Nueva Orden de Pago');
			return Redirect::to('clc/listado');
		}else{
			return Redirect::back()->withErrors($pago->errores)->withInput();
		}
	}

	public function getEditar($id){
		$clc = Obraclc::find($id);
		$orden = Pago::find($id);
		$monto_total = $this->getImporteClc($clc->no_afectacion);
		$monto_ordenado = $this->getImporteOrdenado($id);
		$obra = Planeacion::find($clc->idobra);
		$factura = $this->getNumeroFactura($clc->no_afectacion);
		$beneficiario = $this->getNombreBeneficiario($clc->idobra);
		$ejercicios = DB::table('ejercicios')->lists('nombre','id');
		$bancos = DB::table('bancos')->lists('nombre','id');
		$cuentas = DB::table('cuentas')->lists('nombre','id');
		$status = DB::table('status_clc')->lists('nombre','id');

		$this->layout->contenido = View::make('Pagos::editar', compact('orden','clc','obra','factura','beneficiario','ejercicios','bancos','cuentas','status','monto_total','monto_ordenado'));

		$this->layout->js = 'assets/js/clc_ajax.js';
	}

	public function editar($id){
		$data = Input::all();
		$orden = Pago::find($id);

		if(is_null($orden)){
			App::abort(404);
		}

		if($orden->validAndSave($data)){
			$clcCtl = new ClcController;
			$clcCtl->setStatusHistorial($data['clc_id'], $data['id_status'],'Edicion de ordenes de Pago');
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

	public function getImporteClc($id){
		$sql = "SELECT ROUND(SUM(total * signo),2) AS total
			FROM clcs
			WHERE no_afectacion = $id";

		$total = DB::select( DB::raw($sql));
		return $total[0]->total;
	}

	public function getImporteOrdenado($id){
		$sql = "SELECT CASE WHEN SUM(total) IS NULL THEN 0 ELSE SUM(total) END AS pagado
			FROM pagos
			WHERE clc_id = $id";
		$total = DB::select( DB::raw($sql));
		return $total[0]->pagado;
	}

	public function getImportePagado($id){
		$sql = "SELECT CASE WHEN SUM(total) IS NULL THEN 0 ELSE SUM(total) END AS pagado
			FROM pagos
			WHERE clc_id = $id and status_id = 4";
		$total = DB::select( DB::raw($sql));
		return $total[0]->pagado;
	}

}
