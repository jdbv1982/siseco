<?php

Route::group(array('before'=>'auth'), function(){
	Route::get('graficas/graficas', array('uses'=>'App\Modules\Graficas\Controllers\GraficaController@graficas'));
	Route::get('graficas/obrasxfuente', array('uses'=>'App\Modules\Graficas\Controllers\GraficaController@porFuente'));
	Route::get('graficas/barrasxfuente', array('uses'=>'App\Modules\Graficas\Controllers\GraficaController@graficaBarras'));




});
