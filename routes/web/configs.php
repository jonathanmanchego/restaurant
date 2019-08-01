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
Route::group(['prefix' => 'sistema','as' => 'sistema::'/*, 'middleware' => 'auth'*/], function () {
    Route::get('/',['uses'=>'GeneralController@index'])->name('home');
    // RECURSOS PRINCIPALES
    Route::resource('/permiso','PermisoController');
    Route::resource('/zona','ZonasController');
    Route::resource('/tipoempleado','TipoEmpleadoController');
    Route::resource('/tipodocumento','TipoDocumentoController');
    Route::resource('/restaurant','restaurantController');
    
    Route::resource('/menu','MenuController');
    Route::resource('/igv','IgvController');
    // ORDENES
    Route::resource('/tipo_orden','TipoOrdenController');
    Route::resource('/estado_ordenes','EstadoOrdenController');
    // MESAS
    Route::resource('/estado_mesas','EstadoMesaController');
    Route::resource('/mesa','MesaController');
    // CARTA
    Route::resource('/tipo_carta','TipoCartaController');
    Route::resource('/categoria','CategoriaController');
    Route::resource('/carta','CartaController');
    Route::post('/carta/change-state','CartaController@changeEstado');
    // PRODUCTO ENVIRONMENT
    Route::resource('/producto', 'ProductoController');
    Route::resource('/unidad_medida','UnidadMedidaController');
    Route::resource('/ingredientes','IngredientesController');
});
