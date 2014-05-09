<?php 

Route::group(array('before'=>'auth'), function(){
	Route::post('agregacontratista', array('uses'=>'App\Modules\Contratistas\Controllers\ContratistaController@agregaContratista'));	
	Route::post('contratistas', array('uses'=>'App\Modules\Contratistas\Controllers\ContratistaController@getContratistas'));

	Route::get('contratistas/listado',array('uses'=>'App\Modules\Contratistas\Controllers\ContratistaController@listado'));
	Route::get('contratistas/nuevo',array('uses'=>'App\Modules\Contratistas\Controllers\ContratistaController@nuevo'));
	Route::post('contratistas/nuevo',array('uses'=>'App\Modules\Contratistas\Controllers\ContratistaController@guardar'));
	Route::get('contratistas/editar/{id}',array('uses'=>'App\Modules\Contratistas\Controllers\ContratistaController@editar'));
	Route::post('contratistas/editar/{id}',array('uses'=>'App\Modules\Contratistas\Controllers\ContratistaController@saveEditar'));

	Route::post('contratistas/reporte',array('uses'=>'App\Modules\Contratistas\Controllers\RcController@listadoContratistas'));
});
