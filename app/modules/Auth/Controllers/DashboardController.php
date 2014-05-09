<?php namespace App\Modules\Auth\Controllers;

use Auth, Redirect, View;

class DashboardController extends \BaseController{
	protected $layout = "layouts.layout";

	public function getHome(){
		$this->layout->contenido = View::make('Auth::index');
	}
}