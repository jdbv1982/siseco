<?php
Route::group(array('before'=>'auth'), function(){
	Route::get('pagos/nueva/{id}', ['uses'=>'App\Modules\Pagos\Controllers\PagosController@nueva']);
	Route::post('pagos/guardar', ['uses'=>'App\Modules\Pagos\Controllers\PagosController@guardar']);
	Route::post('pagos/editar/{id}', ['uses'=>'App\Modules\Pagos\Controllers\PagosController@editar']);


	Route::post('cuentas', ['uses'=>'App\Modules\Pagos\Controllers\PagosController@getCuentas']);
});
