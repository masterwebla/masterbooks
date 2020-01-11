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
    return view('backoffice.productos.index');
});

Route::resource('/productos','backoffice\ProductosController');
Route::get('/productos/{id}/inactivar','backoffice\ProductosController@inactivar')->name('productos.inactivar');
Route::get('/productos/{id}/activar','backoffice\ProductosController@activar')->name('productos.activar');