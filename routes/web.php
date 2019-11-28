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
})->name('welcome');

Route::get('/usuarios', 'UsuariosController@index')->name('usuarios.index');
Route::get('/usuario/{id}', 'UsuariosController@destroy')->name('usuarios.delete');
Route::get('/usuarios/create', 'UsuariosController@create')->name('usuarios.create');

Route::post('/Contacto', 'ContactController@store')->name('store');
