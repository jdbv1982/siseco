<?php namespace App\Modules\Usuarios\Controllers;

use User, View, Input, Redirect, DB;

class UsuariosController extends \BaseController{
	protected $layout = "layouts.layout";

	public function getUsuarios(){
		$usuarios = DB::table('users')
			->join('perfiles','users.idperfil','=','perfiles.id')
			->select('users.*','perfiles.nombreperfil')
			->get();
		$this->layout->contenido = View::make('Usuarios::listar')->with('usuarios', $usuarios);
	}

	public function setUsuario(){
		$perfiles = DB::table('perfiles')->lists('nombreperfil','id');
		$this->layout->contenido = View::make('Usuarios::nuevo', compact('perfiles'));
	}

	public function postUsuario(){
		$usuario = new User;

		if($usuario->validAndSave(Input::all())){
			return Redirect::to('usuarios/listado');
		}else{
			return Redirect::to('usuarios/nuevo')->withErrors($usuario->errores)->withInput();
		}
	}

	public function setEditar($id){
		$usuario = User::find($id);
		$perfiles = DB::table('perfiles')->lists('nombreperfil','id');
		$this->layout->contenido = View::make('Usuarios::editar', compact('perfiles'))->with('usuario', $usuario);
	}

	public function postEditar($id){
		$usuario = User::find($id);
		if(is_null($usuario)){
			App::abort(404);
		}

		$data = Input::all();
		if(!Input::has('status')){
			Input::merge(array('status'=>0));
		}
		$data = Input::all();

		if($usuario->validAndSave($data)){
			return Redirect::to('usuarios/listado');
		}else{
			return Redirect::back()->withErrors($usuario->errores)->withInput();
		}
	}
}
