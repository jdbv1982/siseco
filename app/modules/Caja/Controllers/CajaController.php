<?php namespace App\Modules\Caja\Controllers;

use DB, View, Input, Redirect;

use App\Modules\Pagos\Models\Pago;
use App\Modules\Pagos\Models \NumeroALetras;
use App\Modules\Caja\Models\Caja;

use App\Modules\Pagos\Controllers\PagosController;

class CajaController extends \BaseController{

	protected $layout = "layouts.layout";

	public function listado(){
		$ordenes = $this->getOrdenes();
		$this->layout->contenido = View::make('Caja::listado', compact('ordenes'));
	}

	public function setPago($id){
		$pago = Pago::find($id);
		$clc = $this->getStatus($pago->clc_id);
		$letras = new NumeroALetras;
		$cantidad =  strtoupper($letras->num2letras($pago->importe));
		$status = DB::table('status_clc')->lists('nombre','id');

		try{
			$caja = Caja::where('orden_id','=',$id)->get();
			$caja= $caja[0];
		}catch(\Exception $e){
			$caja = [];
		}

		if(empty($caja)){
			$this->layout->contenido = View::make('Caja::pago', compact('pago','cantidad','status','clc'));
		}else{
			$this->layout->contenido = View::make('Caja::editar', compact('caja', 'pago','cantidad','status','clc'));
		}
	}

	public function pagar(){
		$data = Input::all();
		$caja = new Caja;

		if($caja->validAndSave($data)){
			$pago = new PagosController;
			$pago->updateStatusClc($data['clc_id'], $data['id_status']);
			return Redirect::to('caja/listado');
		}else{
			return Redirect::back()->withErrors($caja->errores)->withInput();
		}

	}

	public function editar($id){
		$data = Input::all();

		$caja = Caja::find($id);

		if(is_null($caja)){
			App::abort(404);
		}

		if($caja->validAndSave($data)){
			$pago = new PagosController;
			$pago->updateStatusClc($data['clc_id'], $data['id_status']);
   			return Redirect::to('caja/listado');
		}else{
			return Redirect::back()->withErrors($caja->errores)->withInput();
   		}

	}

	public function impresion($banco_id, $caja_id){
		$caja = Caja::find($caja_id);

		if(is_null($caja)){
			App::abort(404);
		}else{
			$letras = new NumeroALetras;
			$fecha = $letras->getFecha($caja->fecha);
			$importe = $letras->num2letras($caja->importe);
		}


		if($banco_id == 1){
			return View::make('Caja::bancomer', compact('caja','fecha','importe'));
		}elseif ($banco_id == 2) {
			return View::make('Caja::hsbc', compact('caja','fecha','importe'));
		}else{
			return View::make('Caja::banamex', compact('caja','fecha','importe'));
		}
	}

	public function getStatus($id){
		return DB::table('obra_clc')->where('id','=',$id)->get(['id_status']);
	}

	public function getOrdenes(){
		$sql = "SELECT p.id, p.folio, p.beneficiario,c.nombre AS cuenta ,p.observaciones,p.concepto,  p.total, sc.nombre as status
			FROM pagos p
			INNER JOIN cuentas c ON c.id = p.cuenta_id
			INNER JOIN obra_clc oc ON oc.no_afectacion = p.folio
			INNER JOIN status_clc sc ON sc.id = oc.id_status";

		return DB::select( DB::raw($sql));
	}
}
