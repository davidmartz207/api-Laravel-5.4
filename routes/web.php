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

 	Route::get('usuarios', 'usuarioController@index');
 	Route::post('usuarios', 'usuarioController@store');
 	Route::put('usuarios', 'usuarioController@update');
 	Route::delete('usuarios/{id}', 'usuarioController@destroy');
  