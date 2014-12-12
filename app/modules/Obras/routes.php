<?php

Route::group(array('before' => 'auth'), function(){

	Route::get('obras/listado', array('uses'=>'App\Modules\Obras\Controllers\ObrasController@getTodas'));

	Route::get('obras/listado/{id}', array('uses'=>'App\Modules\Obras\Controllers\ObrasController@getListado'));
	Route::get('obras/resumen', array('uses'=>'App\Modules\Obras\Controllers\ObrasController@getResumen'));
	Route::get('obras/resumen/{id}', array('uses'=>'App\Modules\Obras\Controllers\ObrasController@getResumenObra'));

	Route::get('obras/nuevo/{id}', array('uses'=>'App\Modules\Obras\Controllers\ObrasController@getNuevo'));
	Route::post('obras/nuevo/{id}', array('uses'=>'App\Modules\Obras\Controllers\ObrasController@setNuevo'));
	Route::post('obras/editar/{id}', array('uses'=>'App\Modules\Obras\Controllers\ObrasController@updateObra'));

	Route::get('obras/estatus/{id}', array('uses'=>'App\Modules\Obras\Controllers\ObrasController@verEstatus'));

	Route::post('agregaseguimiento', array('uses'=>'App\Modules\Obras\Controllers\ObrasController@seguimiento'));
	Route::post('agregaresidencia', array('uses'=>'App\Modules\Obras\Controllers\ObrasController@residencia'));
	Route::post('getNombreResidencia/{id}', array('uses'=>'App\Modules\Obras\Controllers\ObrasController@getNombreResidencia'));

	Route::get('obras/administracion-directa', ['as'=>'obras-ad', 'uses'=>'App\Modules\Obras\Controllers\ListadoController@listadoAD']);

	Route::get('obras/actualizar-ad/{id}', ['as'=>'actualizar-ad', 'uses'=>'App\Modules\Obras\Controllers\ListadoController@updateAD']);

	Route::get('obras/suficiencia', ['as'=>'obras-suficiencia', 'uses'=>'App\Modules\Obras\Controllers\ListadoController@listadoSuficiencia']);




});
