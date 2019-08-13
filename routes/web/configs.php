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
Route::get('/empleados/login','sisAuth\LoginController@showLoginForm')->name('sis-login');
Route::post('/empleados/login','sisAuth\LoginController@login')->name('sis-login-post');


Route::group(['prefix' => 'sistema','as' => 'sistema::', 'middleware' => 'sisAuth:sis'], function () {
    Route::get('/',['uses'=>'GeneralController@index'])->name('home');
    Route::post('/logout','sisAuth\LoginController@logout')->name('sis-logout');
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
    Route::post('/producto/addIngrediente','ProductoController@addIngrediente');
    Route::post('/producto/removeIngrediente','ProductoController@removeIngrediente');
    Route::resource('/unidad_medida','UnidadMedidaController');
    Route::resource('/ingredientes','IngredientesController');
    // EMPLEADOS RRHH
    Route::resource('/empleados','EmpleadoController');
});
