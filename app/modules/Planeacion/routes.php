<?php

	Route::group(array('before' => 'auth'), function(){
	Route::get('planeacion/nuevo', array('uses'=>'App\Modules\Planeacion\Controllers\PlaneacionController@setNuevo'));
	Route::post('planeacion/nuevo', array('uses'=>'App\Modules\Planeacion\Controllers\PlaneacionController@AddObra'));

	Route::get('planeacion/editar/{id}', array('uses'=>'App\Modules\Planeacion\Controllers\PlaneacionController@getPlaneacion'));
	Route::post('planeacion/editar/{id}', array('uses'=>'App\Modules\Planeacion\Controllers\PlaneacionController@updatePlaneacion'));

	Route::post('planeacion/residencia/{id}', array('uses'=>'App\Modules\Planeacion\Controllers\PlaneacionController@updateResidencia'));
	

	Route::post('distritos/{id}', array('uses'=>'App\Modules\Planeacion\Controllers\PlaneacionController@getDistritos'));
	Route::post('municipios/{id}', array('uses'=>'App\Modules\Planeacion\Controllers\PlaneacionController@getMunicipios'));
	Route::post('localidades/{id}', array('uses'=>'App\Modules\Planeacion\Controllers\PlaneacionController@getLocalidades'));	


	Route::post('subprogramas/{id}', array('uses'=>'App\Modules\Planeacion\Controllers\PlaneacionController@getSubprogramas'));
	Route::post('tipoprogramas/{id}', array('uses'=>'App\Modules\Planeacion\Controllers\PlaneacionController@getTipoProgramas'));

	Route::get('descripcion/{valor}', array('uses'=>'App\Modules\Planeacion\Controllers\PlaneacionController@getDescripcion'));

	Route::post('subfuentes/{id}', array('uses'=>'App\Modules\Planeacion\Controllers\PlaneacionController@getSubFuentes'));
	Route::post('origenes/{id}', array('uses'=>'App\Modules\Planeacion\Controllers\PlaneacionController@getOrigenes'));
	Route::post('suborigenes/{id}', array('uses'=>'App\Modules\Planeacion\Controllers\PlaneacionController@getSubOrigenes'));
	Route::post('clasificacion/{id}', array('uses'=>'App\Modules\Planeacion\Controllers\PlaneacionController@getClasificacion'));
	Route::post('financiero/{id}', array('uses'=>'App\Modules\Planeacion\Controllers\PlaneacionController@getFinanciero'));
	Route::post('meta/{id}', array('uses'=>'App\Modules\Planeacion\Controllers\PlaneacionController@getMetas'));
	

});
