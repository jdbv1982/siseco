<?php

Route::group(array('before' => 'auth'), function(){

	Route::post('addMensaje',['as'=>'addMensaje', 'uses'=>'App\Modules\Mensajes\Controllers\MensajeController@addMensaje']);

	Route::get('list_mensajes', ['uses' => 'App\Modules\Mensajes\Controllers\MensajeController@listMensajes']);
	Route::get('mensajes/vista/{id}', ['uses' => 'App\Modules\Mensajes\Controllers\MensajeController@vistaMensaje']);

});
