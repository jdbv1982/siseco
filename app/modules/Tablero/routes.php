<?php

Route::group(array('before' => 'auth'), function()
{
	Route::get('tablero/opciones', array('uses'=>'App\Modules\Tablero\Controllers\TableroController@getTablero'));

	Route::get('reportes/obras_afisico', ['uses'=>'App\Modules\Reportes\Controllers\RepObrasController@obrasFisico']);


});
