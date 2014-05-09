<?php 

Route::group(array('before'=>'auth'), function(){
	Route::get('avance/nuevo/{id}', array('uses'=>'App\Modules\Avances\Controllers\AvanceController@getNuevo'));
	Route::post('avance/nuevo/{id}', array('uses'=>'App\Modules\Avances\Controllers\AvanceController@uploadAvance'));
	Route::get('avance/timeline/{id}', array('uses'=>'App\Modules\Avances\Controllers\AvanceController@getTimeline'));
});
