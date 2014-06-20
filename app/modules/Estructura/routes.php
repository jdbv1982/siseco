<?php

Route::group(array('before'=>'auth'), function(){
	Route::get('estructura/listado', array('uses'=>'App\Modules\Estructura\Controllers\EstructuraController@listado'));
	Route::get('estructura/editar/{id}', array('uses'=>'App\Modules\Estructura\Controllers\EstructuraController@getEstructura'));
	Route::post('estructura/editar/{id}', array('uses'=>'App\Modules\Estructura\Controllers\EstructuraController@setEstructura'));

});
