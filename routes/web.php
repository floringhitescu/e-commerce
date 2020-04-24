<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/shop', 'ShopController@index')->name('shop');
Route::get('/search', 'ShopController@search')->name('search');
Route::get('/shop/{product}', 'ShopController@show')->name('shop.show');
Route::get('/{category}/shop', 'CategoriesController@index')->name('category.shop');
Route::get('/cart', 'CartController@index')->name('cart.index');
Route::get('/add-to-cart/{product}', 'CartController@addToCart')->name('add.product');
Route::get('/checkout', 'CheckoutController@index')->middleware('auth')->name('checkout.index');
Route::post('/checkout', 'CheckoutController@checkout')->middleware('auth')->name('checkout');
Route::get('/confirm', 'CheckoutController@confirm')->middleware('auth')->name('confirm');
Route::get('cart/reduce/{product}', 'CartController@decrease')->name('decrease');
Route::get('cart/increase/{product}', 'CartController@increase')->name('increase');
Route::get('cart/remove/{product}', 'CartController@remove')->name('remove');
Route::get('empty/cart', 'CartController@empty')->name('empty');

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function (){
    Route::get('/', function (){
        $orders = \App\Order::orderBy('created_at', 'desc')->take(10)->get();
        $users = \App\User::orderBy('created_at', 'desc')->take(10)->get();
       return view('admin.index', compact('orders', 'users'));
    })->name('dashboard');

    Route::resource('users', 'UsersController');
    Route::resource('posts', 'PostsController');
    Route::resource('orders', 'OrdersController');
    Route::resource('categories', 'CategoriesController');
    Route::resource('roles', 'RolesController');
    Route::resource('products', 'ProductsController');
});
