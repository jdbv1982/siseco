<?php namespace App\Modules\Clcs\Controllers;

use DB, View, Input, Redirect;

use App\Modules\Clcs\Models\Obraclc;
use App\Modules\Planeacion\Models\Planeacion;

use App\Modules\Clcs\Repositories\ClcRepo;

class CheckController extends \BaseController{

	protected $layout = "layouts.layout";
	protected $clcRepo;

	public function __construct(ClcRepo $clcRepo){
		$this->clcRepo = $clcRepo;
	}

	public function checkList($id){
		$obraclc = Obraclc::find($id);
		$obra = $this->clcRepo->getDatosObra($obraclc->idobra);
		$estimacion = $this->clcRepo->getEstimacion($obraclc->idobra, $obraclc->no_afectacion);
		$documentos = $this->clcRepo->getDocumentacion($id, $obra->idmodalidad);

		$this->layout->contenido = View::make('Clcs::checklist', compact('obraclc','obra','estimacion','documentos'));

	}

	public function saveChecklist($id){
		for ($i=1; $i <= 30; $i++) {
			if(Input::has('radio'.$i)){
				$this->clcRepo->setDocumentacion(Input::get('clc_id'), $i, Input::get('radio'.$i), Input::get('obs'.$i));
			}
		}

		return Redirect::to('clc/checklist/'.$id);
	}













}
