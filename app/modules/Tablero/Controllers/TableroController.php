<?php namespace App\Modules\Tablero\Controllers;

use App\Modules\Reportes\Controllers\ReporteController as rep;

use View, DB, Response;

class TableroController extends \BaseController{
	protected $layout = "layouts.layout";

	public function getTablero(){
		$this->layout->contenido = View::make('Tablero::dashboard');
	}

}
