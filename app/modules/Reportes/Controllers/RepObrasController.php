<?php namespace App\Modules\Reportes\Controllers;

use App\Modules\Reportes\Repositories\ObrasRepo;
use App\Modules\Reportes\Servicios\Avances;


class RepObrasController extends \BaseController{

	protected $obrasRepo;
	protected $avances;

	public function __construct(ObrasRepo $obrasRepo, Avances $avances){
		$this->obrasRepo = $obrasRepo;
		$this->avances = $avances;
	}

	public function obrasFisico(){
		$datos = $this->obrasRepo->getAvances();
		return $this->avances->printInformacion($datos);
	}
}
