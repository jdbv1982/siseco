<?php

Route::group(array('before'=>'auth'), function(){
	Route::get('administracion/listado/{id}', array('uses'=>'App\Modules\Administracion\Controllers\AdministracionController@getListado'));
	Route::get('administracion/nuevo/{id}', array('uses'=>'App\Modules\Administracion\Controllers\AdministracionController@getNuevo'));
	Route::post('administracion/nuevo', array('uses'=>'App\Modules\Administracion\Controllers\AdministracionController@setNuevo'));
	Route::get('administracion/editar/{id}', array('uses'=>'App\Modules\Administracion\Controllers\AdministracionController@getAdministracion'));
	Route::post('administracion/editar/{id}', array('uses'=>'App\Modules\Administracion\Controllers\AdministracionController@updateAdministracion'));

});
