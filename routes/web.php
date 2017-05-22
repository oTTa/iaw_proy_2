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

Route::get('/', function () {
    return view('welcome');
});

//motos
Route::get('motos/compra', 'CompraController@compra')->name('seleccionar_moto');
Route::get('motos/crear', 'MotoController@crear')->name('crear_moto');
Route::get('motos/listar', 'MotoController@listar')->name('listar_motos');
Route::get('motos/editar/{id}', 'MotoController@editar')->name('listar_motos');

//vendedores
Route::get('vendedores/crear', 'VendedorController@crear')->name('crear_vendedor');
Route::get('vendedores/listar', 'VendedorController@listar')->name('listar_vendedores');
Route::get('vendedores/editar/{id}', 'VendedorController@editar')->name('listar_vendedores');

//colores
Route::get('motos/colores/agregar/{id}', 'ColorController@crear')->name('crear_color');

/* web service json */

//vendedores
Route::post('service/vendedores/crear', 'VendedorServiceController@crear')->name('service_crear_vendedor');
Route::get('service/vendedores/listar', 'VendedorServiceController@listar')->name('service_listar_vendedores');
Route::post('service/vendedores/editar', 'VendedorServiceController@editar')->name('service_editar_vendedores');
Route::get('service/vendedores/{id}', 'VendedorServiceController@obtener')->name('service_obtener_vendedor');

//moto
Route::post('service/motos/crear', 'MotoServiceController@crear')->name('service_crear_moto');
Route::get('service/motos/listar', 'MotoServiceController@listar')->name('service_listar_motos');
Route::post('service/motos/editar', 'MotoServiceController@editar')->name('service_editar_motos');
Route::get('service/motos/{id}', 'MotoServiceController@obtener')->name('service_obtener_moto');
Route::get('service/motos/eliminar/{id}', 'MotoServiceController@eliminar')->name('service_obtener_moto');
Route::get('service/motos/visibilidad/{id}', 'MotoServiceController@cambiar_visibilidad')->name('service_obtener_moto');

//color
Route::post('service/motos/color/agregar', 'ColorServiceController@agregar')->name('service_agregar_color');

//tipo
Route::get('service/motos/tipos/listar', 'TipoServiceController@listar')->name('service_listar_tipos');
Route::get('service/motos/tipos/{id}', 'TipoServiceController@obtener')->name('service_obtener_tipos');
//marca
Route::get('service/motos/marcas/listar', 'MarcaServiceController@listar')->name('service_listar_marcas');
Route::get('service/motos/marcas/{id}', 'MarcaServiceController@obtener')->name('service_obtener_marcas');
//cilindraje
Route::get('service/motos/cilindrajes/listar', 'CilindrajeServiceController@listar')->name('service_listar_cilindrajes');