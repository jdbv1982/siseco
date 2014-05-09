<?php namespace App\Modules\Tablero\Controllers;

use View;

class TableroController extends \BaseController{
	protected $layout = "layouts.layout";

	public function getTablero(){
		$this->layout->contenido = View::make('Tablero::dashboard');
	}
}
