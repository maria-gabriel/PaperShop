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
    return view('index');
});

Auth::routes();
Route::view('perfil','perfil')->name('perfil');
Route::view('editarPerfil','editarPerfil')->name('editarPerfil');
//Route::view('agregarProducto','agregarProducto')->name('agregarProducto');
Route::view('agregarVenta','agregarVenta')->name('agregarVenta');
Route::view('agregarCompra','agregarCompra')->name('agregarCompra');
Route::view('agregarProveedor','agregarProveedor')->name('agregarProveedor');

Route::post('editandoPerfil/{id}','HomeController@editarPerfil')->name('editandoPerfil');
Route::post('agregandoProducto','ProductoController@insertar')->name('agregandoProducto');
Route::post('agregandoVenta','VentaController@insertar')->name('agregandoVenta');
Route::post('agregandoProveedor','ProveedorController@insertar')->name('agregandoProveedor');
Route::post('agregandoCompra','CompraController@insertar')->name('agregandoCompra');
Route::post('agregandoDetallesCompra','CompraController@insertarDetalles')->name('agregandoDetallesCompra');
Route::post('agregandoDetallesVenta','VentaController@insertarDetalles')->name('agregandoDetallesVenta');

Route::get('modificarProducto/{id}','ProductoController@modificar')->name('modificarProducto');
Route::get('modificarCompra/{id}','CompraController@modificar')->name('modificarCompra');
Route::get('modificarVenta/{id}','VentaController@modificar')->name('modificarVenta');

Route::post('grafica_ventas','VentaController@obtenerGrafica')->name('grafica_ventas');
Route::post('grafica_compras','CompraController@obtenerGrafica')->name('grafica_compras');
Route::get('reporte_de_productos','ProductoController@obtenerDatos')->name('reporte_de_productos');
Route::post('reporte_de_ventas','VentaController@obtenerDatos')->name('reporte_de_ventas');
Route::post('reporte_de_compras','CompraController@obtenerDatos')->name('reporte_de_compras');
Route::post('modificandoProducto/{id}','ProductoController@modificando')->name('modificandoProducto');
Route::post('modificandoCompra/{id}','CompraController@modificando')->name('modificandoCompra');
Route::post('modificandoVenta/{id}','VentaController@modificando')->name('modificandoVenta');

Route::post('eliminarProducto/{id}','ProductoController@eliminar')->name('eliminarProducto');
Route::post('eliminarVenta/{id}','VentaController@eliminar')->name('eliminarVenta');
Route::post('eliminarCompra/{id}','CompraController@eliminar')->name('eliminarCompra');
Route::post('eliminarProveedor/{id}','ProveedorController@eliminar')->name('eliminarProveedor');
Route::post('eliminarDetallesCompra/{id}','CompraController@eliminarDetalles')->name('eliminarDetallesCompra');
Route::post('eliminarDetallesVenta/{id}','VentaController@eliminarDetalles')->name('eliminarDetallesVenta');

Route::get('consultarProductos','ProductoController@consultar')->name('consultarProductos');
Route::get('consultarVentas','VentaController@consultar')->name('consultarVentas');
Route::get('consultarCompras','CompraController@consultar')->name('consultarCompras');
Route::get('consultarProveedores','ProveedorController@consultar')->name('consultarProveedores');

Route::get('agregarProducto','ProductoController@agregar')->name('agregarProducto');
Route::get('agregarDetallesCompra','CompraController@detalles')->name('agregarDetallesCompra');
Route::get('agregarDetallesVenta','VentaController@detalles')->name('agregarDetallesVenta');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/homeGeneral', 'HomeController@index')->name('homeGeneral');
Route::get('/homeAdmin', 'HomeController@index')->name('homeAdmin');
// Route::get('auth/{provider}', 'Auth\RegisterController@redirectToProvider');
// Route::get('auth/{provider}/callback', 'Auth\RegisterController@handleProviderCallback');

Route::get('login/{socialnetwork}','SocialNetworkController@redirectToNetwork')->name('redirect');
//Obtener datos que el usuario permite
Route::get('login/{socialnetwork}/callback','SocialNetworkController@handleNetwork')->name('callback');
