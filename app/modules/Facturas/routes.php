<?php

Route::group(array('before'=>'auth'), function(){
	Route::get('facturas/nuevo/{id}', array('uses'=>'App\Modules\Facturas\Controllers\FacturaController@setNuevo'));
	Route::post('facturas/nuevo', array('uses'=>'App\Modules\Facturas\Controllers\FacturaController@postNuevo'));

	Route::post('facturas/editar/{id}', array('uses'=>'App\Modules\Facturas\Controllers\FacturaController@postEditar'));

	Route::get('facturas/listado', array('uses'=>'App\Modules\Facturas\Controllers\FacturaController@listado'));
});
