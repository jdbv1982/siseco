<?php namespace App\Modules\Clcs\Controllers;

use view, Input, DB, Response, Redirect;

use App\Modules\Clcs\Models\Clc;
use App\Modules\Clcs\Models\Obraclc;
use App\Modules\Clcs\Models\UpdateObraClc;

use App\Modules\Planeacion\Models\Planeacion;

class ClcController extends \BaseController{
	protected $layout = "layouts.layout";

	protected $archivo;

	public function importar(){
		$this->layout->contenido = View::make('Clcs::importar_clc');
	}

	public function setClc(){
		$archivo = '../tmp/clc.xlsx';
		$datos = array();
		$objReader = \PHPExcel_IOFactory::createReader('Excel2007');
		$objReader->setReadDataOnly(true);
		$objPHPExcel = $objReader->load($archivo);
		$objWorksheet = $objPHPExcel->getActiveSheet();

		foreach ($objWorksheet->getRowIterator() as $row) {
			$registro = array();
			$cellIterator = $row->getCellIterator();
			$cellIterator->setIterateOnlyExistingCells(false);
			foreach ($cellIterator as $cell) {
				array_push($registro,  $cell->getValue());
			}
			array_push($datos, $registro);
		}
		return Response::json($datos);
	}

	public function getDetalleClc(){

		$upload_dir = '../tmp/';
		if (isset($_FILES["myfile"])) {
    			if ($_FILES["myfile"]["error"] > 0) {
        				echo "Error: " . $_FILES["file"]["error"] . "<br>";
    			} else{
        				move_uploaded_file($_FILES["myfile"]["tmp_name"], $upload_dir . "clc.xlsx");
    			}
		}
		return $this->setClc();
	}

	public function insertar(){
		$dato = $_POST['registro'];


		$datap = array(
			'no_afectacion' => $dato[1],
			'no_control'=> $dato[2],
			'cve_presupuestal'=> $dato[3],
			'descripcion'=> $dato[4],
			'referencia'=> $dato[5],
			'fecha_ref'=> $dato[6],
			'proveedor'=> $dato[7],
			'rfc'=> $dato[8],
			'importe'=> $dato[9],
			'iva'=> $dato[10],
			'total'=> $dato[11],
			'signo'=> $dato[12]
		);

		$obra = '';

		$clc = new Clc;
		if($clc->validAndSave($datap)){
			if($dato[0] <> $obra){
				$obra = $dato[0];
				$this->setObraClc($obra, $dato[1]);
			}
			return "true";
		};
	}

	public function setObraClc($obra, $clc){
		$obra_clc = new Obraclc;

		$id_obra = DB::table('planeacion')->where('numeroobra', '=', $obra)->get();

		$dataobra = [
			'idobra'	=> $id_obra[0]->id,
			'no_afectacion' => $clc,
			'concepto'	=> '',
			'id_status'	=> 1
		];

		$obra_clc->validAndSave($dataobra);

	}

	public function listado(){
		$listado = DB::table('obra_clc as o')
			->join('planeacion as p', 'o.idobra','=','p.id')
			->join('status_clc as c','c.id','=','o.id_status')
			->select('o.id', 'p.numeroobra','p.nombreobra','o.no_afectacion','o.concepto','c.nombre')
			->get();
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

		$sql = "SELECT signo,descripcion, total
			FROM clcs
			WHERE no_afectacion = ". $clc->no_afectacion ."";

		$detalle_clc = DB::select( DB::raw($sql));

		$sql = "SELECT ROUND(SUM(CASE WHEN signo = '+' THEN total ELSE total * -1  END),2) AS total
			FROM clcs
			WHERE no_afectacion = ".$clc->no_afectacion."";

		$total_clc = DB::select( DB::raw($sql));

		$this->layout->contenido = View::make('Clcs::editar', compact('clc','status','obra','factura','detalle_clc','total_clc'));
	}

	public function update($id){
		$obra_clc = UpdateObraClc::find($id);
		$data = Input::all();

		if(is_null($obra_clc)){
			App::abort(404);
		}




		if($obra_clc->validAndSave($data)){
   			return Redirect::to('clc/listado');
		}else{
			return Redirect::back()->withErrors($obra_clc->errores)->withInput();
   		}

	}

}
