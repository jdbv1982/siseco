<?php namespace App\Modules\Reportes\Controllers;

use App\Modules\Reportes\Repositories\ObrasRepo;
use App\Modules\Reportes\Servicios\Avances;
use App\Modules\Reportes\Servicios\EstimacionesRep;
use App\Modules\Reportes\Servicios\ClcsRep;
use App\Modules\Reportes\Servicios\StatusRep;



class RepObrasController extends \BaseController{

	protected $obrasRepo;
	protected $avances;
	protected $estimacionesRep;
	protected $clcsRep;
	protected $statusRep;

	public function __construct(ObrasRepo $obrasRepo, Avances $avances, EstimacionesRep $estimacionesRep, ClcsRep $clcsRep, StatusRep $statusRep){
		$this->obrasRepo = $obrasRepo;
		$this->avances = $avances;
		$this->estimacionesRep = $estimacionesRep;
		$this->clcsRep = $clcsRep;
		$this->statusRep = $statusRep;
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

	public function obrasEstatus(){
		$datos = $this->obrasRepo->getObrasEstatus();
		return $this->statusRep->printInformacion($datos);
	}
}
