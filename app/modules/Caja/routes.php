<?php

Route::group(array('before'=>'auth'), function(){
	Route::get('caja/listado', array('uses'=>'App\Modules\Caja\Controllers\CajaController@listado'));
	Route::get('caja/pagar/{id}', ['uses'=>'App\Modules\Caja\Controllers\CajaController@setPago']);
	Route::post('caja/pagar/{id}', ['uses'=>'App\Modules\Caja\Controllers\CajaController@pagar']);

});
