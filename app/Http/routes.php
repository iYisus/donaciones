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

/*
|--------------------------------------------------------------------------
| Rutas para gestión de especialidades
|--------------------------------------------------------------------------
*/

Route::get('especialidades','EspecialidadesController@index');
Route::post('save_especialidad','EspecialidadesController@save');

/*
|--------------------------------------------------------------------------
| Rutas para gestión de médicos
|--------------------------------------------------------------------------
*/

Route::get('medicos','MedicosController@index');