<?php namespace App\Modules\Pagos\Controllers;

use View, DB, Response, Input;

use App\Modules\Clcs\Models\Obraclc;

use App\Modules\Planeacion\Models\Planeacion;

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
		$this->layout->contenido = View::make('Pagos::nueva', compact('clc','obra','factura','beneficiario','ejercicios','bancos','cuentas'));
		$this->layout->js = 'assets/js/clc_ajax.js';
	}

	public function guardar(){
		return Input::all();
	}













	public function getNumeroFactura($numero){
		$sql = "SELECT referencia
			FROM clcs
			WHERE no_afectacion = ". $numero ." LIMIT 1";
		$referencia = DB::select( DB::raw($sql));
		return $referencia[0]->referencia;
	}

	public function getNombreBeneficiario($id){
		$sql = "SELECT c.razsoc
			FROM licitaciones l
			INNER JOIN contratistas c ON c.id = l.l_idempresa
			WHERE l.id = ".$id."";
		$beneficiario = DB::select( DB::raw($sql));
		return $beneficiario[0]->razsoc;
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
