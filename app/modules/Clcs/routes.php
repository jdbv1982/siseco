<?php

Route::group(array('before'=>'auth'), function(){
	Route::get('clc/importar', array('uses'=>'App\Modules\Clcs\Controllers\ClcController@importar'));

	Route::post('detalleclc', array('uses'=>'App\Modules\Clcs\Controllers\ClcController@getDetalleClc'));
	Route::post('insertaregistro', array('uses'=>'App\Modules\Clcs\Controllers\ClcController@insertar'));

	Route::get('clc/listado/{id}',['uses'=>'App\Modules\Clcs\Controllers\ClcController@listado']);

	Route::get('clc/editar/{id}',['uses'=>'App\Modules\Clcs\Controllers\ClcController@editar']);
	Route::post('clc/editar/{id}',['uses'=>'App\Modules\Clcs\Controllers\ClcController@update']);

	Route::get('clc/historial/{id}',['uses'=>'App\Modules\Clcs\Controllers\ClcController@historial']);

	Route::get('clc/checklist/{id}', ['uses'=>'App\Modules\Clcs\Controllers\CheckController@checklist']);

	Route::post('clc/update/{id}', ['uses'=>'App\Modules\Clcs\Controllers\CheckController@saveChecklist']);





});
