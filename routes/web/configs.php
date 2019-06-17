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
Route::get('/sistema','GeneralController@index');
Route::resource('/sistema/zona','ZonasController');
Route::resource('/sistema/tipousuario','TipoUsuarioController');
Route::resource('/sistema/tipodocumento','TipoDocumentoController');
// Route::get('/zona','ZonasController');
