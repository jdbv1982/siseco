<?php namespace App\Modules\Clcs\Controllers;

use view, Input, DB, Response, Redirect;

use App\Modules\Clcs\Models\Clc;
use App\Modules\Clcs\Models\Obraclc;
use App\Modules\Clcs\Models\UpdateObraClc;
use App\Modules\Clcs\Models\HistClc;
use App\Modules\Clcs\Models\OrdenClc;

use App\Modules\Planeacion\Models\Planeacion;

use App\Modules\Clcs\Repositories\ImportacionRepo;


class ClcController extends \BaseController{
	protected $layout = "layouts.layout";
	protected $importacionRepo;
	protected $archivo;

	public function __construct(ImportacionRepo $importacionRepo){
		$this->importacionRepo = $importacionRepo;
	}

	public function importar(){
		$this->layout->contenido = View::make('Clcs::importar_clc');
	}

	public function getRegistro($name){
	        $archivo = '../tmp/' . $name . '.xlsx';
	        $datos = array();
	        $objReader = \PHPExcel_IOFactory::createReader("Excel2007");
	        $objReader->setReadDataOnly(true);
	        $objPHPExcel = $objReader->load($archivo);
	        $objWorksheet = $objPHPExcel->getActiveSheet();

	        foreach($objWorksheet->getRowIterator() as $row){
	            $registro = array();
	            $cellIterator = $row->getCellIterator();
	            $cellIterator->setIterateOnlyExistingCells(false);
	            foreach($cellIterator as $cell){
	                array_push($registro, $cell->getValue());
	            }
	            array_push($datos, $registro);
	        }
	        return $datos;
	    }

	public function getDetalleClc(){
		if(file_exists('../tmp/clc.xlsx')){
			unlink('../tmp/clc.xlsx');
		}
		$upload_dir = '../tmp/';
		if (isset($_FILES["myfile"])) {
    			if ($_FILES["myfile"]["error"] > 0) {
        				echo "Error: " . $_FILES["file"]["error"] . "<br>";
    			} else{
        				move_uploaded_file($_FILES["myfile"]["tmp_name"], $upload_dir . "clc.xlsx");
    			}
		}

		if(file_exists('../tmp/clc.xlsx')){
			return 'true';
		}else{
			return 'false';
		}
	}

	public function setStatusHistorial($clc, $status,$actualizado){
		$data = [
			'clc_id'	=> $clc,
			'status_id' => $status,
			'actualizado_por' => $actualizado
		];

		$hist = new HistClc;
		$hist->validAndSave($data);


	}

	public function setObraClc($obra, $clc, $folio){
		$obra_clc = new Obraclc;

		$id_obra = DB::table('planeacion')->where('numeroobra', '=', $obra)->get();

		$dataobra = [
			'idobra'	=> $id_obra[0]->id,
			'no_afectacion' => $clc,
			'concepto'	=> '',
			'id_status'	=> 1,
			'folio'		=> $folio
		];

		$obra_clc->validAndSave($dataobra);
		$this->setStatusHistorial($obra_clc->id, 1,'Importacion');

	}

	public function listado($id){
		$sql = "SELECT o.id, p.numeroobra, p.nombreobra, o.no_afectacion, o.concepto, c.nombre, o.num_spei, o.folio
			FROM obra_clc AS o
			INNER JOIN planeacion AS p ON o.idobra = p.id
			INNER JOIN status_clc AS c ON c.id = o.id_status
			WHERE p.idfgeneral =  $id";

		$listado = DB::select( DB::raw($sql));

		$this->layout->contenido = View::make('Clcs::listado', compact('listado'));
	}

	public function editar($id){
		$clc = Obraclc::find($id);
		$status = DB::table('status_clc')->lists('nombre','id');
		$obra = Planeacion::find($clc->idobra);

		$sql = "SELECT f.*
			FROM estimaciones e
			INNER JOIN facturas f ON f.idestimacion = e.id
			WHERE idobra = ". $clc->idobra ." AND folio = (SELECT referencia
			FROM clcs
			WHERE no_afectacion = ". $clc->no_afectacion ." LIMIT 1)";

		$factura = DB::select( DB::raw($sql));

		$sql = "SELECT signo,descripcion, ROUND(total, 2) as total
			FROM clcs
			WHERE no_afectacion = ". $clc->no_afectacion ."";

		$detalle_clc = DB::select( DB::raw($sql));

		$sql = "SELECT ROUND(SUM(total * signo),2) AS total
			FROM clcs
			WHERE no_afectacion = ".$clc->no_afectacion."";

		$total_clc = DB::select( DB::raw($sql));

		$this->layout->contenido = View::make('Clcs::editar', compact('clc','status','obra','factura','detalle_clc','total_clc'));
	}

	public function update($id){
		$obra_clc = UpdateObraClc::find($id);
		$obra = Planeacion::find($obra_clc->idobra);

		$data = Input::all();

		if(is_null($obra_clc)){
			App::abort(404);
		}

		if($obra_clc->validAndSave($data)){
			$this->setStatusHistorial($id, $data['id_status'],'Editar Clc');
   			return Redirect::to('clc/listado/'.$obra->idfgeneral);
		}else{
			return Redirect::back()->withErrors($obra_clc->errores)->withInput();
   		}

	}

	public function historial($id){
		$sql = "SELECT hc.id, sc.nombre,hc.actualizado_por, hc.created_at
			FROM historialclc hc
			INNER JOIN status_clc sc ON sc.id = hc.status_id
			WHERE clc_id = $id";

		$historial = DB::select( DB::raw($sql));
		$this->layout->contenido = View::make('Clcs::historial', compact('historial'));
	}

	public function setOrdenClc($id,$numero, $facturas){
		for ($i=0; $i < count($facturas) ; $i++) {
			$orden = new OrdenClc;
			$orden->orden_id = $id;
			$orden->no_afectacion = $numero;
			$orden->clc_referencia = $facturas[$i];
			$orden->save();
		}
	}

	public function insertar(){
		$data = $this->getRegistro('clc');
		return $this->importacionRepo->insertaRegistros($data);
	}


}
