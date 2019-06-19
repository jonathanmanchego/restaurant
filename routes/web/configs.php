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
//Route::resource('menu/crear','MenuController');
// Route::get('/zona','ZonasController');
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'],function(){
    Route::get('menu','MenuController@index')->name('menu');
    Route::get('menu/crear','MenuController@create')->name('crear_menu');
    Route::post('menu','MenuController@store')->name('guardar_menu');

});
//Route::get('menu/crear','MenuController@create')->name('crear_permiso');