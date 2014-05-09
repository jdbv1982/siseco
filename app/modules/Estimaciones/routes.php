<?php 

Route::group(array('before'=>'auth'), function(){
	Route::post('agregaestimaciones/{id}', array('uses'=>'App\Modules\Estimaciones\Controllers\EstimacionController@agregaEstimacion'));	
	Route::post('estimaciones/{id}', array('uses'=>'App\Modules\Estimaciones\Controllers\EstimacionController@getEstimaciones'));

	Route::get('estimaciones/listado', array('uses'=>'App\Modules\Estimaciones\Controllers\EstimacionController@getListado'));

	Route::get('estimaciones/nuevo/{id}', array('uses'=>'App\Modules\Estimaciones\Controllers\EstimacionController@setNuevo'));
	Route::post('estimaciones/nuevo/{id}', array('uses'=>'App\Modules\Estimaciones\Controllers\EstimacionController@postNuevo'));

	Route::get('estimaciones/editar/{idobra}/{id}', array('uses'=>'App\Modules\Estimaciones\Controllers\EstimacionController@setEditar'));
	Route::post('estimaciones/editar/{id}', array('uses'=>'App\Modules\Estimaciones\Controllers\EstimacionController@postEditar'));

	Route::get('estimaciones/fechas/{idobra}/{id}', array('uses'=>'App\Modules\Estimaciones\Controllers\EstimacionController@setFechas'));
	Route::post('estimaciones/fechas/{id}', array('uses'=>'App\Modules\Estimaciones\Controllers\EstimacionController@postFechas'));

	Route::get('estimaciones/facturas/{id}', array('uses'=>'App\Modules\Estimaciones\Controllers\EstimacionController@listadoFacturas'));
});
