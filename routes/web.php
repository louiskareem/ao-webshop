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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/**
 * Routes for Categories
 */
Route::get('categories', 'CategoryController@index');
Route::get('categories/{id}/products', 'CategoryController@display');

/**
 * Routes for Products
 */
Route::get('products', 'ProductController@index');
Route::get('products/{id}/details', 'ProductController@display');

/**
 * Routes for Orders
 */
Route::get('order/{id}', 'OrderController@getProduct');