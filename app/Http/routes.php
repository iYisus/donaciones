<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::get('/lang', function () {
        return view('prueba');
    });
    Route::get('lang/{lang}', function ($lang) {
        session(['lang' => $lang]);
        return \Redirect::back();
    })->where([
        'lang' => 'en|es|fr'
    ]);
});

Route::get('/','MainController@index');

/*
|--------------------------------------------------------------------------
| Rutas administrativas / middleware te autentitecacion
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => ['auth']], function () {
Route::get('admin','DashboardController@index');
Route::get('especialidades','DashboardController@especialidades');
});


/*
|--------------------------------------------------------------------------
| Rutas Usuarios / middleware te autentitecacion
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => ['auth']], function () {
	Route::get('perfil', 'UsuarioController@getPerfil');
	Route::post('modificarInfo', 'UsuarioController@updateInfo');
	Route::post('modificarPassword', 'UsuarioController@updatePassword');
	Route::post('modificarEmail', 'UsuarioController@updateEmail');
	Route::get('logout','UsuarioController@logout');
});
	Route::post('login','UsuarioController@login');
	Route::resource('usuario','UsuarioController');
	Route::get('password', 'UsuarioController@password');
	Route::post('password', 'UsuarioController@verificarEmail');


/*
|--------------------------------------------------------------------------
| Rutas Mail
|--------------------------------------------------------------------------
*/
Route::post('sendMail','MailController@sendMail');
