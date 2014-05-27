<?php namespace App\Modules\Facturas\Controllers;

use View, Input, Redirect, Response, Auth;

use App\Modules\Facturas\Models\Factura;

class FacturaController extends \BaseController{
		protected $layout = "layouts.layout";

		public function setNuevo($id){
			$factura = Factura::where('idestimacion','=',$id)->get();

			if(sizeof($factura) == 0){
				$this->layout->contenido = View::make('Facturas::nuevo',compact('id'));
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
