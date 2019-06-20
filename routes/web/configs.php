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
    /*Rutas de Menu*/
    Route::get('menu','MenuController@index')->name('menu');
    Route::get('menu/crear','MenuController@create')->name('crear_menu');
    Route::post('menu','MenuController@store')->name('guardar_menu');
    Route::post('menu/guardar-orden','MenuController@guardarOrden')->name('guardar_orden');
    /*Rutas de TipoUsuario(Rol)*/
    Route::get('rol', 'TipoUsuarioController@index')->name('rol');
    Route::get('rol/crear', 'TipoUsuarioController@create')->name('crear_rol');
    Route::post('rol', 'TipoUsuarioController@store')->name('guardar_rol');
    Route::get('rol/{id}/editar', 'TipoUsuarioController@edit')->name('editar_rol');
    Route::put('rol/{id}', 'TipoUsuarioController@update')->name('actualizar_rol');
    Route::delete('rol/{id}', 'TipoUsuarioController@destroy')->name('eliminar_rol');
    /*RUTAS MENU_TIpoUsuario(rol)*/
    Route::get('menu-rol', 'MenuTipoUsuarioController@index')->name('menu_rol');
    Route::post('menu-rol', 'MenuTipoUsuarioController@guardar')->name('guardar_menu_rol');

});
//Route::get('menu/crear','MenuController@create')->name('crear_permiso');