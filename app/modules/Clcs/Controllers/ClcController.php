<?php namespace App\Modules\Clcs\Controllers;

use view, Input, DB, Response;

use App\Modules\Clcs\Models\Clc;

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
			'no_afectacion' => $dato[0],
			'no_control'=> $dato[1],
			'cve_presupuestal'=> $dato[2],
			'descripcion'=> $dato[3],
			'referencia'=> $dato[4],
			'fecha_ref'=> $dato[5],
			'proveedor'=> $dato[6],
			'rfc'=> $dato[7],
			'importe'=> $dato[8],
			'iva'=> $dato[9],
			'total'=> $dato[10],
			'signo'=> $dato[11]
		);

		$clc = new Clc;
		if($clc->validAndSave($datap)){
			return "true";
		};
	}

}
