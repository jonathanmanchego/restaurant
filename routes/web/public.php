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