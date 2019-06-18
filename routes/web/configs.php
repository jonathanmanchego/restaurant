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
// RECURSOS PRINCIPALES
Route::resource('/sistema/zona','ZonasController');
Route::resource('/sistema/tipousuario','TipoUsuarioController');
Route::resource('/sistema/tipodocumento','TipoDocumentoController');
Route::resource('/sistema/restaurant','restaurantController');
Route::resource('/sistema/tipomenu','TipoMenuController');
Route::resource('/sistema/estado_ordenes','TipoOrdenController');
// Route::get('/zona','ZonasController');
