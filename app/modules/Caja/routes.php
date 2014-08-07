<?php

Route::group(array('before'=>'auth'), function(){
	Route::get('caja/listado', array('uses'=>'App\Modules\Caja\Controllers\CajaController@listado'));
	Route::get('caja/pagar/{id}', ['uses'=>'App\Modules\Caja\Controllers\CajaController@setPago']);
	Route::post('caja/pagar/{id}', ['uses'=>'App\Modules\Caja\Controllers\CajaController@pagar']);

	Route::post('caja/actualizar/{id}', ['uses'=>'App\Modules\Caja\Controllers\CajaController@editar']);

	Route::get('caja/impresion/{banco_id}/{orden_id}', ['uses'=>'App\Modules\Caja\Controllers\CajaController@impresion']);

});
