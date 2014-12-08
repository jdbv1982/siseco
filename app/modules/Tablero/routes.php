<?php

Route::group(array('before' => 'auth'), function()
{
	Route::get('tablero/opciones', array('uses'=>'App\Modules\Tablero\Controllers\TableroController@getTablero'));

	Route::get('reportes/obras_afisico', ['uses'=>'App\Modules\Reportes\Controllers\RepObrasController@obrasFisico']);
	Route::get('reportes/obras_estimacion', ['uses'=>'App\Modules\Reportes\Controllers\RepObrasController@obrasEstimaciones']);
	Route::get('reportes/obras_clcs', ['uses'=>'App\Modules\Reportes\Controllers\RepObrasController@obrasClcs']);
	Route::get('reportes/obras_estatus', ['uses'=>'App\Modules\Reportes\Controllers\RepObrasController@obrasEstatus']);



});
