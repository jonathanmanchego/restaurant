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


Route::group(['prefix' => 'sistema','as' => 'sistema::', 'middleware' => ['sisAuth:sis']], function () {
    Route::get('/',['uses'=>'GeneralController@index'])->name('home');
    Route::post('/logout','sisAuth\LoginController@logout')->name('sis-logout');
    Route::group(['middleware' => 'adminAuth'],function(){
        // RECURSOS PRINCIPALES
        Route::resource('/permiso','PermisoController');
        Route::resource('/zona','ZonasController');
        Route::resource('/tipoempleado','TipoEmpleadoController');
        Route::resource('/tipodocumento','TipoDocumentoController');
        Route::resource('/restaurant','restaurantController');
        Route::post('/restaurant/{id}/slider','restaurantController@slider');
        Route::resource('/menu','MenuController');
        Route::resource('/igv','IgvController');
        //DASHBOARD
        Route::post('/dashboard','GeneralController@datosGrafico');
        // ORDENES
        Route::resource('/tipo_orden','TipoOrdenController');
        Route::resource('/estado_ordenes','EstadoOrdenController');
        Route::post('/orden/selectMesa','OrdenController@selectMesa');
        // MESAS
        Route::resource('/estado_mesas','EstadoMesaController');
        Route::resource('/mesa','MesaController');
        Route::get('/mesas-show','MesaController@mesaShow');
        Route::get('/mesas_layout','MesaController@layout');
        Route::post('/mesas_layout/save','MesaController@saveLayout');
        Route::post('/mesas_layout/cambiarAmbiente','MesaController@cambiarAmbiente');
        // AMBIENTES 
        Route::resource('/ambiente','AmbienteController');
        // CARTA
        Route::resource('/tipo_carta','TipoCartaController');
        Route::resource('/categoria','CategoriaController');
        Route::resource('/carta','CartaController');
        Route::post('/carta/instanciando','CartaController@instanciando');
        Route::post('/carta/removiendo','CartaController@renovando');
        Route::post('/carta/change-state','CartaController@changeEstado');
        Route::get('/carta/activa','CartaController@activa');
        // PRODUCTO ENVIRONMENT
        Route::resource('/producto', 'ProductoController');
        Route::post('/producto/addIngrediente','ProductoController@addIngrediente');
        Route::post('/producto/removeIngrediente','ProductoController@removeIngrediente');
        Route::resource('/unidad_medida','UnidadMedidaController');
        Route::resource('/ingredientes','IngredientesController');
        // EMPLEADOS RRHH
        Route::resource('/empleados','EmpleadoController');
        ///MOZO
        
        Route::resource('/orden','OrdenController');
        //CHEF
        Route::get('/chef','OrdenController@listar');
        Route::post('/orden/detalle', 'OrdenController@detalle');
    });
    Route::group(['middleware' => 'mozoAuth'],function(){
        Route::get('ordenes/agregar', 'OrdenController@new')->name('agregar_venta');
        Route::post('ordenes/save','OrdenController@saveOrden');    
    });
    Route::group(['middleware' => 'cajaAuth'],function(){
        Route::get('ordenes/cobrar', 'OrdenController@cobrar')->name('cobrar_venta');
        Route::post('ordenes/cobrar','OrdenController@realizarCobro');    
    });
});
