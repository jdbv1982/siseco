<?php

Route::group(array('before'=>'auth'), function(){
	Route::get('notificaciones/vista/{id}',array('uses'=>'App\Modules\Notificaciones\Controllers\NotificacionesController@setVista'));
	Route::get('notificaciones/todas/{id}',array('uses'=>'App\Modules\Notificaciones\Controllers\NotificacionesController@verNotificaciones'));
});
