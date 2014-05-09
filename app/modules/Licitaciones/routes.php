<?php 

Route::group(array('before'=>'auth'), function(){
	Route::get('licitaciones/nuevo/{id}', array('uses'=>'App\Modules\Licitaciones\Controllers\LicitacionesController@getNuevo'));
	Route::post('licitaciones/nuevo/{id}', array('uses'=>'App\Modules\Licitaciones\Controllers\LicitacionesController@setNuevo'));
	Route::post('licitaciones/editar/{id}', array('uses'=>'App\Modules\Licitaciones\Controllers\LicitacionesController@updateLicitaciones'));

	Route::post('agregafianza/{id}', array('uses'=>'App\Modules\Licitaciones\Controllers\LicitacionesController@agregaFianza'));	
	Route::post('agregaconvenio/{id}', array('uses'=>'App\Modules\Licitaciones\Controllers\LicitacionesController@agregaConvenio'));
	Route::post('agregaadendo/{id}', array('uses'=>'App\Modules\Licitaciones\Controllers\LicitacionesController@agregaAdendo'));
});
