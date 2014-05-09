<?php

Route::group(array('before'=>'auth'), function(){
	Route::get('oficios/listado', array('uses'=>'App\Modules\Oficios\Controllers\OficiosController@listadoOfifios'));	
	Route::get('oficios/editar/{id}', array('uses'=>'App\Modules\Oficios\Controllers\OficiosController@editarOficio'));	
	Route::post('oficios/editar/{id}', array('uses'=>'App\Modules\Oficios\Controllers\OficiosController@setEditarOficio'));	

	Route::post('agregaoficio/{id}', array('uses'=>'App\Modules\Oficios\Controllers\OficiosController@agregaOficio'));	
});
