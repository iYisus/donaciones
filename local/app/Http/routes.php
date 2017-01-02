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
    Route::get('lang/{lang}', function ($lang) {
        session(['lang' => $lang]);
        return \Redirect::back();
    })->where([
        'lang' => 'en|es|fr'
    ]);
});

Route::get('/','MainController@index');
Route::post('buscarEvento','MainController@buscarEvento');

/*
|--------------------------------------------------------------------------
| Rutas administrativas / middleware te autentitecacion
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => ['auth']], function () {
  Route::get('admin','DashboardController@index');
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
	Route::get('usuarios','UsuarioController@getUsuarios');
	Route::post('usuariosData', 'UsuarioController@obtenerUsuarios');
	Route::post('buscarUsuario', 'UsuarioController@buscarUsuario');
	Route::post('actualizarUsuario', 'UsuarioController@actualizarUsuario');
	Route::post('deleteUser','UsuarioController@deleteUser');
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


/*
|--------------------------------------------------------------------------
| Rutas para gestión de especialidades
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => ['auth']], function () {
	Route::get('especialidades','EspecialidadesController@index');
	Route::post('save_especialidad','EspecialidadesController@save');
	Route::post('edit_especialidad','EspecialidadesController@edit');
	Route::post('deleEspecialidad','EspecialidadesController@deleEspecialidad');
});

/*
|--------------------------------------------------------------------------
| Rutas para gestión de médicos
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => ['auth']], function () {
	Route::get('medicos','MedicosController@index');
	Route::post('getMedicos','MedicosController@tablaMedicos');
	Route::post('save_medicos','MedicosController@save');
	Route::post('search_medico','MedicosController@search');
	Route::post('edit_medicos','MedicosController@edit');
	Route::post('deleteMedico','MedicosController@deleteMedico');
});

/*
|--------------------------------------------------------------------------
| Rutas para gestión de eventos
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => ['auth']], function () {
	Route::get('eventos','EventosController@index');
	Route::get('modal','EventosController@modal');
	Route::post('save_evento','EventosController@save');
	Route::post('search_evento','EventosController@search');
	Route::post('edit_evento','EventosController@edit');
	Route::post('estatus_evento','EventosController@edit_estatus');
});

/*
|--------------------------------------------------------------------------
| Rutas para gestión de citas médicas
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => ['auth']], function () {
	Route::get('citas','CitasController@index');
	Route::get('view_modal_cita','CitasController@modal');
	Route::post('save_cita','CitasController@save');
	Route::post('edit_cita','CitasController@edit');
	Route::post('view_proximas_citas','CitasController@view');
	Route::post('search_medicos','CitasController@search_medico');
	Route::post('search_cita','CitasController@search_cita');
	Route::post('cancelar_cita','CitasController@cancelar');
	Route::post('getCitas','CitasController@getCitas');
	Route::post('deleteCita','CitasController@deleteCita');
});