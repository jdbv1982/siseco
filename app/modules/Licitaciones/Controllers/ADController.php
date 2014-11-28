<?php namespace App\Modules\Licitaciones\Controllers;

use Input;
use App\Modules\Licitaciones\Repositories\LicitacionRepo;

class ADController extends \BaseController {

	protected $licitacionRepo;

	public function __construct(LicitacionRepo $licitacionRepo){
		$this->licitacionRepo = $licitacionRepo;
	}

	public function setAD($id){
		Input::merge(array('id' => $id));
		Input::merge(array('l_cmic' => '0'));
		Input::merge(array('l_idempresa' => '187'));
		return $this->licitacionRepo->setAD($id, Input::all());
	}

}
