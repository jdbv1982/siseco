<?php namespace App\Modules\Obras\Controllers;

use View;

use App\Modules\Obras\Repositories\ObrasInfoRepo;
use App\Modules\Planeacion\Models\Planeacion;
use App\Modules\Licitaciones\Models\Licitaciones;


class ListadoController extends \BaseController{

	protected $obrasInfoRepo;
	protected $layout = "layouts.layout";

	public function __construct(ObrasInfoRepo $obrasInfoRepo){
		$this->obrasInfoRepo = $obrasInfoRepo;
	}

	public function listadoAD(){
		$obras = $this->obrasInfoRepo->getObras(2);
		$this->layout->contenido = View::make('Obras::listadoad', compact('obras'));
	}

	public function updateAD($id){
		$obra = Planeacion::find($id);
		$licitaciones = Licitaciones::find($id);
		$monto = $this->obrasInfoRepo->getMontoAutorizado($id);

		$this->layout->contenido = View::make('Obras::update_ad', compact('obra','licitaciones','monto'));
	}


}
