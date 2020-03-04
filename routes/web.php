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

Route::get('/', 'Cliente@index');

Route::get('/categoria/{id}', 'Cliente@productoCategoria')
->where('id', '[0-9]+');

Route::get('/producto/{id}', 'Cliente@detallesProducto')
->where('id', '[0-9]+');

Route::get('/carrito', 'Carrito@index');

Route::post('/addProducto', 'Carrito@addProducto');

Route::post('/updateProducto', 'Carrito@update');

Route::post('/deleteProducto', 'Carrito@delete');

Route::get('/deleteCart', function(){
    Cart::destroy();
    return back();
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/checkout' , 'Cliente@checkout');

Route::post('/checkout' , 'Cliente@addPedido');

Route::get('/userpage', 'Cliente@userpage');

Route::post('/baja', 'Cliente@bajausuario');

Route::get('/cancelPedido/{id}', 'Cliente@deletePedido');

Route::get('/modificardatos', 'Cliente@cambiomodificacion');

Route::get('/pedido/{id}', 'Cliente@detallePedido');

Route::get('/download/{id}', 'Cliente@downloadPDF');

Route::post('/updateUser', 'Cliente@updateUser');