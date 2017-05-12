<?php


Route::get('/', function () 
{
    return "<a href='xpanel'><h1>xpanel</h1><a>";
});


Route::group(['prefix' => 'xpanel'], function () 
{
    Route::get('auth/login', 'Auth\AuthController@login');     
    Route::put('auth/logar', 'Auth\AuthController@logar');     
    Route::get('auth/sair', 'Auth\AuthController@sair');     
    Route::get('auth/register', 'Auth\AuthController@register');     
    Route::post('auth/valid', 'Auth\AuthController@valid');     
    Route::post('auth/store', 'Auth\AuthController@store');     
    Route::get('auth/forgot', 'Auth\AuthController@esqueci');     
    Route::get('auth/teste', 'Auth\AuthController@teste');     
    Route::put('auth/reset_pass', 'Auth\AuthController@reset_pass');     
    
    Route::group(['middleware' => 'auth'], function()
	{	
        Route::resource('/', 'DashboardController');
        Route::resource('/user', 'userController');
        Route::get('/palestras', 'palestrasController@index');
        Route::get('/palestras/{id}/show', 'palestrasController@show');
        Route::get('/palestras/favoritos', 'palestrasController@favoritos');
    });
});