<?php namespace App\Modules\Reportes\Controllers;

use App\Modules\Reportes\Repositories\ObrasRepo;
use App\Modules\Reportes\Servicios\Avances;
use App\Modules\Reportes\Servicios\EstimacionesRep;
use App\Modules\Reportes\Servicios\ClcsRep;



class RepObrasController extends \BaseController{

	protected $obrasRepo;
	protected $avances;
	protected $estimacionesRep;
	protected $clcsRep;

	public function __construct(ObrasRepo $obrasRepo, Avances $avances, EstimacionesRep $estimacionesRep, ClcsRep $clcsRep){
		$this->obrasRepo = $obrasRepo;
		$this->avances = $avances;
		$this->estimacionesRep = $estimacionesRep;
		$this->clcsRep = $clcsRep;
	}

	public function obrasFisico(){
		$datos = $this->obrasRepo->getAvances();
		return $this->avances->printInformacion($datos);
	}

	public function obrasEstimaciones(){
		 $datos = $this->obrasRepo->getEstimaciones();
		 return $this->estimacionesRep->printInformacion($datos);
	}

	public function obrasClcs(){
		$datos = $this->obrasRepo->getClcs();
		return $this->clcsRep->printInformacion($datos);
	}
}
