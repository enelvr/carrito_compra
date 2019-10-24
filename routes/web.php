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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('carrito', 'CarritoController@verCarritoCompra')->name('ver_carrito');
Route::post('carrito/agregar-producto', 'CarritoController@agregarProductoCarrito');
Route::delete('carrito/eliminar-producto', 'CarritoController@eliminarProductoCarrito')->name('eliminar_producto_carrito');
