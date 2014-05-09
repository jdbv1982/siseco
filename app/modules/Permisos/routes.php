<?php 
Route::group(array('before'=>'auth'), function(){
	Route::get('usuarios/permisos/{id}', array('uses'=>'App\Modules\Permisos\Controllers\PermisoController@getPermisos'));
	Route::post('permisos/editar/{id}', array('uses'=>'App\Modules\Permisos\Controllers\PermisoController@updatePermisos'));
});
