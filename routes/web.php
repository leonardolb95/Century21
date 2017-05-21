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

/**
 * Ruta inicial hacia la vista donde
 * los usuarios se registran o inician sesion.
 */
use Illuminate\Support\Facades\Auth;

Route::get('/', 'Auth\LoginController@index');

/**
 * Ruta hacia la pagina de inicio una vez iniciada una sesion.
 */
Route::get('/inicio', function () {
    return view('home.index');
})->middleware('auth');

Route::get('/salir', 'Auth\LoginController@salir');


//Catalogos
Route::group(['prefix' => 'catalogos'], function () {
	Route::resource('clientes','ClienteController');
	Route::post('clientes_store','ClienteController@store');
	Route::get('clientes.tabla','ClienteController@tabla');
	Route::post('clientes.editar','ClienteController@editar');
	Route::post('cliente.getCliente','ClienteController@getCliente');
	Route::post('cliente.eliminar','ClienteController@eliminar');

	Route::resource('vendedores','VendedorController');
	Route::post('vendedores.store','VendedorController@store');
	Route::get('vendedores.tabla','VendedorController@tabla');
	Route::post('vendedores.editar','VendedorController@editar');
	Route::post('vendedores.getVendedor','VendedorController@getVendedor');
	Route::post('vendedores.eliminar','VendedorController@eliminar');

	Route::resource('fraccionamientos','FraccionamientoController');
	Route::post('fraccionamientos.store','FraccionamientoController@store');
	Route::get('fraccionamientos.tabla','FraccionamientoController@tabla');
	Route::post('fraccionamientos.editar','FraccionamientoController@editar');
	Route::post('fraccionamientos.getFraccionamiento','FraccionamientoController@getFraccionamiento');
	Route::post('fraccionamientos.eliminar','FraccionamientoController@eliminar');
	
	Route::resource('usuarios','UsuarioController');
	Route::post('usuarios.store','UsuarioController@store');
	Route::get('usuarios.tabla','UsuarioController@tabla');
	Route::post('usuarios.editar','UsuarioController@editar');
	Route::post('usuarios.getUsuario','UsuarioController@getUsuario');
	Route::post('usuarios.eliminar','UsuarioController@eliminar');
});



//Movimientos
Route::group(['prefix' => 'movimientos'], function () {
    Route::resource('solicitudes', 'SolicitudController');
    Route::post('solicitudes.store','SolicitudController@store');
    Route::get('solicitudes.tabla','SolicitudController@tabla');
    Route::post('solicitudes.editar','SolicitudController@editar');
    Route::post('solicitudes.getSolicitud','SolicitudController@getSolicitud');
    Route::post('solicitudes.eliminar', 'SolicitudController@eliminar');
    
    Route::resource('enganches','EngancheController');
	Route::post('enganches.store','EngancheController@store');
});



//Movimientos
Route::group(['prefix' => 'reportes'], function () {
    Route::resource('solicitudes', 'ReporteSolicitudesController');
    Route::get('solicitudesVerPdf','ReporteSolicitudesController@verPdf');

    Route::resource('saldos','ReporteSaldosController');
    Route::get('saldosVerPdf','ReporteSaldosController@verPdf');

    Route::resource('estado_cuenta','ReporteEstadoCuentaController');
    Route::get('estado_cuentaVerPdf','ReporteEstadoCuentaController@verPdf');

    Route::resource('saldos_vencidos','ReporteSaldosVencidosController');
    Route::get('saldos_vencidosVerPdf','ReporteSaldosController@verPdf');

});


//Rutas de Autenticación de usuarios

Auth::routes();
