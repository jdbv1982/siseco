<?php
Route::group(array('before'=>'auth'), function(){
	Route::get('pagos/lista/{id}', ['uses'=>'App\Modules\Pagos\Controllers\PagosController@lista']);

	Route::get('pagos/nueva/{id}', ['uses'=>'App\Modules\Pagos\Controllers\PagosController@nueva']);
	Route::post('pagos/guardar', ['uses'=>'App\Modules\Pagos\Controllers\PagosController@guardar']);
	Route::post('pagos/editar/{id}', ['uses'=>'App\Modules\Pagos\Controllers\PagosController@editar']);

	Route::post('cuentas', ['uses'=>'App\Modules\Pagos\Controllers\PagosController@getCuentas']);

	Route::get('pagos/editar/{id}', ['uses'=>'App\Modules\Pagos\Controllers\PagosController@getEditar']);

	Route::get('pagos/impresion/{id}', ['uses'=>'App\Modules\Pagos\Controllers\PagosController@Impresion']);
});
