<?php namespace App\Modules\Clcs\Controllers;

use view, Input, DB, Response;


use App\Modules\Residencias\Models\Residencias as re;

class ClcController extends \BaseController{
	protected $layout = "layouts.layout";

	public function importar(){
		$this->layout->contenido = View::make('Clcs::importar_clc', compact('contratistas'));
	}

	public function guardar(){
		$archivo = Input::file('archivo_clc');
		$this->setClc($archivo);
	}

	public function setClc($archivo){
		$objReader = \PHPExcel_IOFactory::createReader('Excel2007');
		$objReader->setReadDataOnly(true);

		$objPHPExcel = $objReader->load($archivo);
		$objWorksheet = $objPHPExcel->getActiveSheet();

		echo '<table>' . "\n";
		foreach ($objWorksheet->getRowIterator() as $row) {
		echo '<tr>' . "\n";

		$cellIterator = $row->getCellIterator();
		$cellIterator->setIterateOnlyExistingCells(false); // This loops all cells,
		// even if it is not set.
		// By default, only cells
		// that are set will be
		// iterated.
		foreach ($cellIterator as $cell) {
		echo '<td>' . $cell->getValue() . '</td>' . "\n";
		}

		echo '</tr>' . "\n";
		}
		echo '</table>' . "\n";
		}

	public function getDetalleClc(){
		$residencia = re::all();
		return $residencia;
		return Response::json($residencia);
	}

}
