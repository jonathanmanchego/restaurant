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
Route::get('/', function(){
	return view('index',['title' => 'HOME - APP']);
});
Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/lista','CarritoController@index');
Route::post('/lista/add','CarritoController@add')->name('addToCar');

<<<<<<< Updated upstream
=======
// CARRITO ROUTES
Route::get('/carrito/reset','CarritoController@reset')->name('reset');
Route::get('/carrito/add/{producto}/{cantidadAdd}','CarritoController@add')->name('addToCar');
Route::get('/carrito/update/{producto}/{cantidadAdd}','CarritoController@update')->name('updateCar');
Route::get('/carrito/remove/{producto}/{cantidadRemove}','CarritoController@remove')->name('removeToCar');
Route::get('/carrito/totalremove/{producto}/{cantidadRemove}','CarritoController@remove')->name('removeToCar2');
Route::get('/carrito/show','CarritoController@show')->name('Carrito');
Route::get('/carrito/completo','CarritoController@hacerPedido');
// PRODUCTOS ROUTES
Route::get('/productos','webs\GeneralController@exhibicion')->name('productos');
Route::get('/productos/{id}','ProductoController@show')->name('productoMostrar')->middleware('auth:web');

//CONFIGURACION DE PERFIL
Route::get('/profile','webs\GeneralController@profile')->name('profile');
>>>>>>> Stashed changes
