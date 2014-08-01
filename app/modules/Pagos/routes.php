<?php
Route::group(array('before'=>'auth'), function(){
	Route::get('pagos/nueva/{id}', ['uses'=>'App\Modules\Pagos\Controllers\PagosController@nueva']);
	Route::post('pagos/guardar', ['uses'=>'App\Modules\Pagos\Controllers\PagosController@guardar']);


	Route::post('cuentas', ['uses'=>'App\Modules\Pagos\Controllers\PagosController@getCuentas']);
});
