<?php

Route::filter('noAuth', function()
{
    if(Auth::guest())
    {
        return Redirect::to('auth/login')->with('mensaje','¡Debes iniciar sesión para acceder a esta página!.');
    }
});

Route::get('auth/login',  array('as' => 'login',      'uses' => 'App\Modules\Auth\Controllers\AuthController@getLogin'));
Route::post('auth/login', array('as' => 'login.post', 'uses' => 'App\Modules\Auth\Controllers\AuthController@postLogin'));
Route::get('auth/logout', array('as' => 'logout',     'uses' => 'App\Modules\Auth\Controllers\AuthController@getLogout'));

Route::post('autorizar', array('uses' => 'App\Modules\Auth\Controllers\AuthController@Autorizar'));
//agrupamos las rutas que necesitan inicio de sesión
Route::group(array('before' => 'noAuth'), function()
{
    Route::get('inicio', array('as' => 'dashboard', 'uses' => 'App\Modules\Auth\Controllers\DashboardController@getHome'));
    Route::get('auth/cambiar/{id}', array('uses'=>'App\Modules\Auth\Controllers\AuthController@setCambiar'));
    Route::post('auth/cambiar/{id}', array('uses'=>'App\Modules\Auth\Controllers\AuthController@postCambiar'));
});
