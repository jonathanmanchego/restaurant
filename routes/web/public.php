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
Route::get('/', 'webs\GeneralController@index')->name('home');;
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// CARRITO ROUTES
Route::get('/carrito/reset','CarritoController@reset')->name('reset');
Route::get('/carrito/add/{producto}/{cantidadAdd}','CarritoController@add')->name('addToCar');
Route::get('/carrito/update/{producto}/{cantidadAdd}','CarritoController@update')->name('updateCar');
Route::get('/carrito/remove/{producto}/{cantidadRemove}','CarritoController@remove')->name('removeToCar');
Route::get('/carrito/show','CarritoController@show')->name('Carrito');
Route::get('/carrito/completo','CarritoController@hacerPedido');
// PRODUCTOS ROUTES
Route::get('/productos','webs\GeneralController@exhibicion')->name('productos');
Route::get('/productos/{id}','ProductoController@show')->name('productoMostrar')->middleware('auth:web');