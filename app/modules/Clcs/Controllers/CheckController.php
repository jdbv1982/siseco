<?php namespace App\Modules\Clcs\Controllers;

use DB, View, Input;

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
		return Input::all();
	}













}
