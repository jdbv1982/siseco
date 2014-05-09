<?php namespace App\Modules\Auth\Controllers;

use Auth, Input, Redirect, View, User, Hash, App;

class AuthController extends \BaseController {

    protected $layout = "layouts.layout";

    public function getLogin()
    {
        $this->layout->contenido = View::make('Auth::login');
    }

    public function postLogin()
    {
        $credentials = array(
            'email' => Input::get('correo'),
            'password' => Input::get('password'),
            );

        if (Auth::attempt($credentials))
        {
            return Redirect::intended('inicio');
        }

        return Redirect::to('auth/login')->with('error_login', true);
    }

    
    public function getLogout()
    {
        Auth::logout();
        return Redirect::to('auth/login');
    }

    public function setCambiar($id){
        $usuario = User::find($id);
        if(is_null($usuario)){
            App::abort(404);
        }
        $this->layout->contenido = View::make('Auth::cambiar')->with('usuario', $usuario);     
    }

    public function postCambiar($id){
        $usuario = User::find($id);
        if(is_null($usuario)){
            App::abort(404);
        }

        $usuario->password = Input::get('nuevopass');
        $usuario->save();
        
    }

    public function Autorizar(){
        $credentials = array(
            'email' => Input::get('usuario'),
            'password' => Input::get('pass'),
            );

        if (Auth::attempt($credentials))
        {
            return 'true';
        }

        return 'false';
    }
}


