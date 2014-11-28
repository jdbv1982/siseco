<?php

Route::group(array('before'=>'auth'), function(){
	Route::get('licitaciones/nuevo/{id}', array('uses'=>'App\Modules\Licitaciones\Controllers\LicitacionesController@getNuevo'));
	Route::post('licitaciones/nuevo/{id}', array('uses'=>'App\Modules\Licitaciones\Controllers\LicitacionesController@setNuevo'));
	Route::post('licitaciones/editar/{id}', array('uses'=>'App\Modules\Licitaciones\Controllers\LicitacionesController@updateLicitaciones'));

	Route::get('licitaciones/editarconvenio/{id}', array('uses'=>'App\Modules\Licitaciones\Controllers\LicitacionesController@getConvenio'));
	Route::post('licitaciones/editarconvenio/{id}', array('uses'=>'App\Modules\Licitaciones\Controllers\LicitacionesController@setConvenio'));

	Route::get('licitaciones/editarfianza/{id}', array('uses'=>'App\Modules\Licitaciones\Controllers\LicitacionesController@getFianza'));
	Route::post('licitaciones/editarfianza/{id}', array('uses'=>'App\Modules\Licitaciones\Controllers\LicitacionesController@setFianza'));

	Route::get('licitaciones/nuevafianza/{id}', array('uses'=>'App\Modules\Licitaciones\Controllers\LicitacionesController@getNuevaFianza'));
	Route::post('licitaciones/nuevafianza', array('uses'=>'App\Modules\Licitaciones\Controllers\LicitacionesController@setNuevaFianza'));

	Route::get('licitaciones/editardiferimiento/{id}', array('uses'=>'App\Modules\Licitaciones\Controllers\LicitacionesController@getDiferimiento'));
	Route::post('licitaciones/editardiferimiento/{id}', array('uses'=>'App\Modules\Licitaciones\Controllers\LicitacionesController@setDiferimiento'));




	Route::post('agregafianza/{id}', array('uses'=>'App\Modules\Licitaciones\Controllers\LicitacionesController@agregaFianza'));
	Route::post('agregaconvenio/{id}', array('uses'=>'App\Modules\Licitaciones\Controllers\LicitacionesController@agregaConvenio'));
	Route::post('agregaadendo/{id}', array('uses'=>'App\Modules\Licitaciones\Controllers\LicitacionesController@agregaAdendo'));
	Route::post('agregadiferimiento/{id}', array('uses'=>'App\Modules\Licitaciones\Controllers\LicitacionesController@agregaDiferimiento'));




	Route::post('licitaciones/ad/{id}', array('uses'=>'App\Modules\Licitaciones\Controllers\ADController@setAD'));

});
