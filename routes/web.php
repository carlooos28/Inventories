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
    return view('layouts.dashboard');
});

Route::resource('supplier', 'SupplierController', ['only' => [
    'index'
]]);

Route::resource('inventory', 'InventoryController', ['only' => [
    'index', 'store', 'update'
]]);

Route::resource('product', 'ProductController', ['only' => [
    'index'
]]);

Route::get('sales/invoice/{invoice}', 'SaleController@invoice');

Route::resource('sales', 'SaleController', ['only' => [
    'index', 'store', 'show', 'update'
]]);