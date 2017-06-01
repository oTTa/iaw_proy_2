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

Route::get('/', 'PublicController@compra')->name('inicio');

/////////////////////////
/* controladores-vista */
/////////////////////////

//usuario
Route::get('registrarse', 'UsuarioController@formulario_registrase')->name('form_registrarse');
Route::get('login', 'UsuarioController@formulario_login')->name('form_login');
Route::get('perfil', 'UsuarioController@perfil')->name('perfil');
Route::get('usuarios/listar', 'AdministracionUsuariosController@listar')->name('listar_usuarios');


//compra
Route::get('/home', 'CompraController@compra')->name('seleccionar_moto');
Route::get('/motos/{id_moto}/colores/{id_color}/vendedores/{id_vendedor}/preparar_compra', 'CompraController@preparar_compra')->name('preparar_compra');
Route::get('/compras', 'CompraController@listar_compras_usuario')->name('compras_usuario');
Route::get('/compras/usuarios/{id}', 'AdministracionUsuariosController@listar_compras_usuario')->name('compras_usuario_por_admin');
Route::get('/compras/compartida/{token}', 'PublicController@compartida')->name('acceder_compra_compartida');
Route::get('/compras/pdf/{id_compra}', 'CompraController@generar_pdf')->name('descargar_pdf_compra');


//motos
Route::get('motos/compra', 'CompraController@compra')->name('seleccionar_moto');
Route::get('motos/crear', 'MotoController@crear')->name('crear_moto');
Route::get('motos/listar', 'MotoController@listar')->name('listar_motos');
Route::get('motos/editar/{id}', 'MotoController@editar')->name('listar_motos');
Route::get('motos/vendedores/listar/{id}', 'MotoController@vendedores')->name('listar_vendedores_moto');

//vendedores
Route::get('vendedores/crear', 'VendedorController@crear')->name('crear_vendedor');
Route::get('vendedores/listar', 'VendedorController@listar')->name('listar_vendedores');
Route::get('vendedores/editar/{id}', 'VendedorController@editar')->name('listar_vendedores');

//colores
Route::get('motos/colores/agregar/{id}', 'ColorController@crear')->name('crear_color');
Route::get('motos/colores/listar/{id}', 'ColorController@listar')->name('listar_colores_moto');

//accesorios
Route::get('accesorios/crear', 'AccesorioController@crear')->name('crear_accesorio');
Route::get('accesorios/editar/{id}', 'AccesorioController@editar')->name('crear_accesorio');
Route::get('accesorios/listar', 'AccesorioController@listar')->name('listar_accesorio');

///////////////
/* ajax json */
///////////////

//usuario
Route::post('/service/usuarios/registrarse', 'UsuarioController@registrase')->name('registrarse');
Route::post('/service/usuarios/login', 'UsuarioController@authenticate')->name('login');
Route::get('/service/usuarios/salir', 'UsuarioController@salir')->name('logout');
Route::get('/service/usuarios/listar', 'AdministracionUsuariosServiceController@listar')->name('listar_usuarios');


//vendedores
Route::post('service/vendedores/crear', 'VendedorServiceController@crear')->name('service_crear_vendedor');
Route::get('service/vendedores/listar', 'VendedorServiceController@listar')->name('service_listar_vendedores');
Route::post('service/vendedores/editar', 'VendedorServiceController@editar')->name('service_editar_vendedores');
Route::get('service/vendedores/{id}', 'VendedorServiceController@obtener')->name('service_obtener_vendedor');

//accesorio
Route::post('service/accesorios/crear', 'AccesorioServiceController@crear')->name('service_crear_accesorio');
Route::post('service/accesorios/editar', 'AccesorioServiceController@editar')->name('service_editar_accesorio');
Route::get('service/accesorios/borrar/{id}', 'AccesorioServiceController@borrar')->name('service_borrar_accesorio');
Route::get('service/accesorios/listar', 'AccesorioServiceController@listar')->name('service_listar_accesorios');
Route::get('service/accesorios/tipos/listar', 'AccesorioServiceController@listar_tipos_accesorios')->name('service_listar_tipos_accesorios');
Route::get('service/accesorios/tipos/{id}', 'AccesorioServiceController@obtener_accesorio')->name('service_obtener_tipos_accesorios');
//moto
Route::post('service/motos/crear', 'MotoServiceController@crear')->name('service_crear_moto');
Route::get('service/motos/listar', 'PublicServiceController@listar')->name('service_listar_motos');
Route::post('service/motos/editar', 'MotoServiceController@editar')->name('service_editar_motos');
Route::get('service/motos/{id}', 'MotoServiceController@obtener')->name('service_obtener_moto');
Route::get('service/motos/eliminar/{id}', 'MotoServiceController@eliminar')->name('service_obtener_moto');
Route::get('service/motos/visibilidad/{id}', 'MotoServiceController@cambiar_visibilidad')->name('service_obtener_moto');
Route::get('service/motos/{id_moto}/vendedores/{id_vendedor}/insertar', 'MotoServiceController@agregar_vendedor')->name('service_agregar_vendedor_moto');
Route::get('service/motos/{id_moto}/vendedores/{id_vendedor}/eliminar', 'MotoServiceController@eliminar_vendedor')->name('service_eliminar_vendedor_moto');


//color
Route::post('service/motos/color/agregar', 'ColorServiceController@agregar')->name('service_agregar_color');
Route::get('service/color/borrar/{id_color}', 'ColorServiceController@eliminar')->name('service_eliminar_color');

//tipo
Route::get('service/motos/tipos/listar', 'TipoServiceController@listar')->name('service_listar_tipos');
Route::get('service/motos/tipos/{id}', 'TipoServiceController@obtener')->name('service_obtener_tipos');

//marca
Route::get('service/motos/marcas/listar', 'MarcaServiceController@listar')->name('service_listar_marcas');
Route::get('service/motos/marcas/{id}', 'MarcaServiceController@obtener')->name('service_obtener_marcas');

//cilindraje
Route::get('service/motos/cilindrajes/listar', 'CilindrajeServiceController@listar')->name('service_listar_cilindrajes');

//comprar
Route::post('service/comprar/realizar_compra', 'CompraServiceController@comprar')->name('service_realizar_compra');
Route::get('service/comprar/compartir/{id_compra}', 'CompraServiceController@compartir')->name('service_compartir_compra');
Route::get('service/comprar/no_compartir/{id_compra}', 'CompraServiceController@no_compartir')->name('service_no_compartir_compra');