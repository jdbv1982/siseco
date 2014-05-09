<?php 

Route::group(array('before'=>'auth'), function(){
	Route::get('documentacion/nuevo/{id}', array('uses'=>'App\Modules\Documentacion\Controllers\DocumentacionController@getNuevo'));
	Route::post('documentacion/nuevo/{id}', array('uses'=>'App\Modules\Documentacion\Controllers\DocumentacionController@uploadDoc'));
});
