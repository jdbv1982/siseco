<?php

Route::group(array('before' => 'auth'), function()
{
	Route::get('tablero/opciones', array('uses'=>'App\Modules\Tablero\Controllers\TableroController@getTablero'));
});
