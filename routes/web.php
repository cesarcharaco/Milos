<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::group(['middleware' => ['auth', 'web']], function () {
	Route::get('/home', 'HomeController@index')->name('home');
	Route::resource('users','UsersController');
	Route::resource('choferes','ChoferesController');
	Route::get('choferes/{id}/asignar','ChoferesController@asignar')->name('choferes.asignar');
	Route::post('choferes/asignacion','ChoferesController@asignacion')->name('choferes.asignacion');
	Route::resource('camiones','CamionesController');
	Route::resource('despachos','DespachosController');
	Route::resource('recepciones','RecepcionesController');

});