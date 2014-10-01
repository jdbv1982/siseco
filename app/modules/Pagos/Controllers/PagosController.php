<?php namespace App\Modules\Pagos\Controllers;

use View, DB, Response, Input, Redirect;

use App\Modules\Clcs\Models\Obraclc;
use App\Modules\Clcs\Controllers\ClcController;


use App\Modules\Planeacion\Models\Planeacion;
use App\Modules\Licitaciones\Models\Licitaciones;
use App\Modules\Contratistas\Models\Contratista;
use App\Modules\Pagos\Models\Pago;

use App\Modules\Clcs\Models\UpdateObraClc;

use App\Modules\Pagos\Servicios\OrdenPago;

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



		$sql = "SELECT no_afectacion, referencia,proveedor, SUM(total * signo) AS total FROM clcs
		WHERE no_afectacion = $clc->no_afectacion AND referencia NOT IN (SELECT clc_referencia FROM orden_clc WHERE no_afectacion = $clc->no_afectacion)
		GROUP BY no_afectacion, referencia";

		$facturas = DB::select( DB::raw($sql));

		$this->layout->contenido = View::make('Pagos::nueva', compact('clc','obra','factura','beneficiario','ejercicios','bancos','cuentas','status','monto_total','monto_ordenado','facturas'));

		$this->layout->js = 'assets/js/clc_ajax.js';
	}


	public function guardar(){
		$facturas = Input::get('factura');
		$data = Input::all();
		$pago = new Pago;

		$obra_clc = UpdateObraClc::find($data['clc_id']);
		$obra = Planeacion::find($obra_clc->idobra);

		if($pago->validAndSave($data)){
			if($pago->folio == 0){
				$pago->folio = $pago->id;
				$pago->save();
			}
			$clcCtl = new ClcController;
			$clcCtl->setStatusHistorial($data['clc_id'], $data['status_id'],'Nueva Orden de Pago');
			$clcCtl->setOrdenClc($pago->id, $obra_clc->no_afectacion,$facturas);

			return Redirect::to('clc/listado/'.$obra->idfgeneral);
		}else{
			return Redirect::back()->withErrors($pago->errores)->withInput();
		}
	}

	public function getEditar($id){
		$orden = Pago::find($id);
		$clc = Obraclc::find($orden->clc_id);
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
		$obra_clc = UpdateObraClc::find($data['clc_id']);
		$obra = Planeacion::find($obra_clc->idobra);
		if(is_null($orden)){
			App::abort(404);
		}

		if($orden->validAndSave($data)){
			$clcCtl = new ClcController;
			$clcCtl->setStatusHistorial($data['clc_id'], $data['status_id'],'Edicion de ordenes de Pago');
   			return Redirect::to('pagos/lista/'.$orden->clc_id);
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

	public function Impresion($id){
		$impresion = new OrdenPago;
		$orden = Pago::find($id);
		$cuenta = DB::table('cuentas')
			->select('nombre')
			->where('id','=',$orden->cuenta_id)->get();

		$cuenta = $cuenta[0]->nombre;

		$impresion->orden($orden, $cuenta);
	}

}
