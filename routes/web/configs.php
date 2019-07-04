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
Route::group(['prefix' => 'sistema','as' => 'sistema::','middleware' => 'auth'], function () {
    Route::get('/',['uses'=>'GeneralController@index'])->name('home');
    // RECURSOS PRINCIPALES
    Route::resource('/permiso','PermisoController');
    Route::resource('/zona','ZonasController');
    Route::resource('/tipousuario','TipoUsuarioController');
    Route::resource('/tipodocumento','TipoDocumentoController');
    Route::resource('/restaurant','restaurantController');
    
    Route::resource('/menu','MenuController');
    Route::resource('/igv','IgvController');
    // ORDENES
    Route::resource('/tipo_orden','TipoOrdenController');
    Route::resource('/estadoordenes','EstadoOrdenesController');
    // MESAS
    Route::resource('/estado_mesas','EstadoMesaController');
    Route::resource('/mesa','MesaController');    
    // PRODUCTO ENVIRONMENT
    Route::resource('/producto', 'ProductoController');
});
