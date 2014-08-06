<?php namespace App\Modules\Caja\Controllers;

use DB, View, Input;

use App\Modules\Pagos\Models\Pago;
use App\Modules\Pagos\Models \NumeroALetras;


class CajaController extends \BaseController{

	protected $layout = "layouts.layout";

	public function listado(){
		$ordenes = $this->getOrdenes();
		$this->layout->contenido = View::make('Caja::listado', compact('ordenes'));
	}

	public function setPago($id){
		$pago = Pago::find($id);
		$letras = new NumeroALetras;
		$cantidad =  strtoupper($letras->num2letras(120.05));
		$this->layout->contenido = View::make('Caja::pago', compact('pago','cantidad'));
		//$this->layout->js = 'assets/js/partials/caja.js';
	}

	public function pagar(){
		dd(Input::all());
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
