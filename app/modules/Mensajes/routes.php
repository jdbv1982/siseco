<?php

Route::group(array('before' => 'auth'), function(){

	Route::post('addMensaje', array('uses'=>'App\Modules\Mensajes\Controllers\MensajeController@addMensaje'));

});
