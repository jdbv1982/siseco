<?php

Route::group(array('before' => 'auth'), function()
{
	Route::get('usuarios/listado', array('as' => 'usuarios', 'uses'=>'App\Modules\Usuarios\Controllers\UsuariosController@getUsuarios'));
	Route::get('usuarios/nuevo', array('as' => 'usuarios.nuevo', 'uses'=>'App\Modules\Usuarios\Controllers\UsuariosController@setUsuario'));
	Route::post('usuarios/nuevo', array('uses'=>'App\Modules\Usuarios\Controllers\UsuariosController@postUsuario'));
	Route::get('usuarios/editar/{id}', array('uses'=>'App\Modules\Usuarios\Controllers\UsuariosController@setEditar'));
	Route::post('usuarios/editar/{id}', array('uses'=>'App\Modules\Usuarios\Controllers\UsuariosController@postEditar'));

});
