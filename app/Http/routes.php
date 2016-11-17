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

Route::get('/','MainController@index');

/*
|--------------------------------------------------------------------------
| Rutas administrativas
|--------------------------------------------------------------------------
*/

Route::get('admin','DashboardController@index');
Route::get('especialidades','DashboardController@especialidades');
#Route::resource('nombre')


#USUARIO
Route::resource('usuario','UsuarioController');
Route::post('login','UsuarioController@login');
Route::get('logout','UsuarioController@logout');
Route::get('perfil','UsuarioController@perfil');		

#MAILCONTROLLER
Route::resource('mail','MailController');
