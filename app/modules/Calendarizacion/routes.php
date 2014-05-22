<?php

Route::group(array('before'=>'auth'), function(){
	Route::get('calendarizacion/listado', array('uses'=>'App\Modules\Calendarizacion\Controllers\CalenController@listado'));
	Route::get('calendarizacion/editar/{id}', array('uses'=>'App\Modules\Calendarizacion\Controllers\CalenController@getCalendario'));
	Route::post('calendarizacion/editar/{id}', array('uses'=>'App\Modules\Calendarizacion\Controllers\CalenController@setCalendario'));

});
