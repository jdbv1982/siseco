<?php

Route::group(array('before'=>'auth'), function(){
	Route::get('clc/importar', array('uses'=>'App\Modules\Clcs\Controllers\ClcController@importar'));
	Route::post('clc/guardar', array('uses'=>'App\Modules\Clcs\Controllers\ClcController@guardar'));

	Route::post('detalleclc', array('uses'=>'App\Modules\Clcs\Controllers\ClcController@getDetalleClc'));

});
