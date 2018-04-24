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

/**
 * Routes for Front page
 */
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
 * Routes for Shopping Cart
 */
Route::get('products/{id}', 'OrderController@getProduct');
Route::get('shopping-cart', 'OrderController@getShoppingCart');
Route::post('shopping-cart/{id}/remove-product', 'OrderController@deleteProductInCart');
Route::post('shopping-cart/order', 'OrderController@addOrder');

/**
 * Routes for Orders
 */
Route::get('orders', 'OrderController@getOrder');