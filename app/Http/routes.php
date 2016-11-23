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
Route::post('edit_especialidad','EspecialidadesController@edit');

/*
|--------------------------------------------------------------------------
| Rutas para gestión de médicos
|--------------------------------------------------------------------------
*/

Route::get('medicos','MedicosController@index');
Route::post('save_medicos','MedicosController@save');
Route::post('search_medico','MedicosController@search');
Route::post('edit_medicos','MedicosController@edit');

/*
|--------------------------------------------------------------------------
| Rutas para gestión de eventos
|--------------------------------------------------------------------------
*/

Route::get('eventos','EventosController@index');
Route::post('save_evento','EventosController@save');
Route::post('search_evento','EventosController@search');
Route::post('edit_evento','EventosController@edit');
Route::post('estatus_evento','EventosController@edit_estatus');

/*
|--------------------------------------------------------------------------
| Rutas para gestión de citas médicas
|--------------------------------------------------------------------------
*/

Route::get('citas','CitasController@index');
Route::post('save_cita','CitasController@save');
Route::post('edit_cita','CitasController@edit');