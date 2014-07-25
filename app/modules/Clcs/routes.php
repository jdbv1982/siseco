<?php

Route::group(array('before'=>'auth'), function(){
	Route::get('clc/importar', array('uses'=>'App\Modules\Clcs\Controllers\ClcController@importar'));

	Route::post('detalleclc', array('uses'=>'App\Modules\Clcs\Controllers\ClcController@getDetalleClc'));
	Route::post('insertaregistro', array('uses'=>'App\Modules\Clcs\Controllers\ClcController@insertar'));



});
