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

			if(sizeof($factura) == 0){
				$licitacion = Licitaciones::find($estimacion->idobra);
				if ($licitacion->l_anticipo > 0){
					$anticipo = round($estimacion->importe * .30, 2);
					$supervision = 0;
				}else{
					$anticipo = 0;
					$supervision = round($estimacion->importe * 1.5,2);
				}

					$secodam = round($estimacion->importe * .05,2);
					$cmic = round($estimacion->importe * .02, 2);
					$liquido = $estimacion->importe - $anticipo - $supervision - $secodam - $cmic;
				$this->layout->contenido = View::make('Facturas::nuevo',compact('id', 'estimacion','anticipo','supervision','secodam','cmic','liquido'));
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

}
