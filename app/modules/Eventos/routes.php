<?php 

Route::group(array('before'=>'auth'), function(){
	Route::post('agregaevento', array('uses'=>'App\Modules\Eventos\Controllers\EventoController@agregaEvento'));	
	Route::post('eventos', array('uses'=>'App\Modules\Eventos\Controllers\EventoController@getEventos'));
});
