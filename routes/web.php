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
Route::get('/index', 'HomeController@index');
Route::get('/home', 'HomeController@index');

Route::get ('products','ProductController@index')->name('product');
Route::get ('products/{product}','ProductController@show')->name('product.show');

Route::get ('categories','CategoriesController@index')->name('categories.index');
Route::get ('categories/{category}','CategoriesController@show')->name('categories.show');

Route::namespace('Account')->prefix('account')->name('account.')->middleware(['auth'])
    ->group(function (){
        Route::get('/', 'UserController@index')->name('main');
//        Route::get('{user}/edit', 'UserController@edit')->middleware('update,user')->name('edit');
//        Route::put('{user}', 'UserController@update')->middleware('update,user')->name('update');
        Route::get('{user}/edit', 'UserController@edit')->name('edit');
        Route::post('{user}', 'UserController@update')->name('update');
    });

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware(['auth'])
//Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware(['auth','IsAdmin'])
    ->group(function (){
        Route::get('/', 'AdminController@index')->name('dashboard');
        Route::get('orders', 'OrderController@index')->name('orders');
        Route::get('order', 'OrderController@show')->name('order');
        Route::get('products/create', 'ProductController@create')->name('product.create');
        Route::post('products/store', 'ProductController@store')->name('product.store');

    });








//Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/', function () { return view('welcome'); })->name('welcome');

//Route::group(['namespace' => 'Frontend'], function () {
//    Route::get('/Products', 'ProductController@index')->name('frontEndProductsIndex');
//    Route::get('/Products/{id}', 'ProductController@show')->where('id', '[0-9]+')->name('frontEndProductShow');
//
//    Route::get('/Products/Categories', 'CategoriController@index')->name('frontEndCategoriIndex');
//    Route::get('/Products/Categories/{id}', 'CategoriController@show')->where('id', '[0-9]+')->name('frontEndCategoriShow');
//});




//Route::resource('Productie','ProductieController');
