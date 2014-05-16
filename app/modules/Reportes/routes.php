<?php

Route::group(array('before'=>'auth'), function(){
	Route::get('reportes/obrasautorizadas', array('uses'=>'App\Modules\Reportes\Controllers\ReporteController@getObrasAut'));
	Route::post('reportes/verobrasaut', array('uses'=>'App\Modules\Reportes\Controllers\ContratadasController@verObrasAut'));

	Route::get('reportes/obrascontratadas', array('uses'=>'App\Modules\Reportes\Controllers\ReporteController@getObrasCont'));
	Route::post('reportes/obrascontratadas', array('uses'=>'App\Modules\Reportes\Controllers\ContratadasController@verObrasContratadas'));

	Route::get('reportes/resumen', array('uses'=>'App\Modules\Reportes\Controllers\ReporteController@formResumen'));
	Route::post('reportes/verresumen', array('uses'=>'App\Modules\Reportes\Controllers\ContratadasController@verResumen'));

	Route::get('reportes/graficas', array('uses'=>'App\Modules\Reportes\Controllers\ReporteController@graficas'));

	Route::get('reportes/informacion', array('uses'=>'App\Modules\Reportes\Controllers\CompletasController@informacion'));

	Route::get('reportes/anexovi/{id}', array('uses'=>'App\Modules\Reportes\Controllers\SeguimientoController@AnexoVI'));


});
