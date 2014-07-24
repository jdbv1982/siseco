<?php namespace App\Modules\Clcs\Controllers;

use view, Input, DB, Response;

class ClcController extends \BaseController{
	protected $layout = "layouts.layout";

	protected $archivo;

	public function importar(){
		$this->layout->contenido = View::make('Clcs::importar_clc');
	}

	public function setClc($archivo){
		//return $archivo;
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
		$archivo = $_FILES['archivo']['name'];
		return Response::json($this->setClc($archivo));
	}

}
