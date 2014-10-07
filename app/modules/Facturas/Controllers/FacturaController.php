<?php namespace App\Modules\Facturas\Controllers;

use View, Input, Redirect, Response, Auth;

use App\Modules\Facturas\Models\Factura;
use App\Modules\Estimaciones\Models\Estimacion;
use App\Modules\Licitaciones\Models\Licitaciones;

class FacturaController extends \BaseController{

		protected $layout = "layouts.layout";

		public function setNuevo($id){
			$factura = Factura::where('idestimacion','=',$id)->get();
			$estimacion = Estimacion::find($id);

			$valor = $estimacion->importe / 1.16;
			$valor = round($valor, 2);
			$contrato = $this->getMontoContrato($estimacion->idobra);


			if(sizeof($factura) == 0){
					$anticipo = round($estimacion->importe * .30, 2);
					$supervision = round($contrato *  .015,2);
					$secodam = round($valor * .005,2);
					$cmic = round($valor * .002, 2);
					$liquido = $estimacion->importe - $anticipo - $supervision - $secodam - $cmic;
				$this->layout->contenido = View::make('Facturas::nuevo',compact('id', 'estimacion','anticipo','supervision','secodam','cmic','liquido', 'contrato', 'valor'));
			}else{
				$factura = $factura[0];
				$this->layout->contenido = View::make('Facturas::editar', compact('factura'));
			}
		}

		public function postnuevo(){
			$data = Input::all();
			$factura = new Factura;
			if($factura->validAndSave($data)){
				return Redirect::to('estimaciones/listado');
			}else{
				return Redirect::back()->withErrors($factura->errores)->withInput();
			}
		}

		public function postEditar($id){
			Input::merge(array('id' => $id, 'idusuario' => Auth::user()->id));
			$data = Input::all();
			$factura = Factura::find($id);

			if(!is_null($factura)){
				if($factura->validAndSave($data)){
					return Redirect::to('estimaciones/listado');
				}else{
					return Redirect::back()->withErrors($factura->errores)->withInput();
				}
			}
		}

		public function listado(){
			$datos = Factura::all();
			$this->layout->contenido = View::make('Facturas::listado', compact('datos'));
		}

		public function getMontoContrato($id){
			$l = Licitaciones::find($id);
			return $l->l_montocontratado;
		}

}
