<?php

Route::group(array('before' => 'auth'), function(){
	Route::get('obras/listado/{id}', array('uses'=>'App\Modules\Obras\Controllers\ObrasController@getListado'));
	Route::get('obras/resumen', array('uses'=>'App\Modules\Obras\Controllers\ObrasController@getResumen'));
	Route::get('obras/resumen/{id}', array('uses'=>'App\Modules\Obras\Controllers\ObrasController@getResumenObra'));

	Route::get('obras/nuevo/{id}', array('uses'=>'App\Modules\Obras\Controllers\ObrasController@getNuevo'));
	Route::post('obras/nuevo/{id}', array('uses'=>'App\Modules\Obras\Controllers\ObrasController@setNuevo'));
	Route::post('obras/editar/{id}', array('uses'=>'App\Modules\Obras\Controllers\ObrasController@updateObra'));

	Route::get('obras/estatus/{id}', array('uses'=>'App\Modules\Obras\Controllers\ObrasController@verEstatus'));
	
});
