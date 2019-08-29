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
Route::get('/index', 'HomeController@index')->name('home.index');

Route::get ('products','ProductController@index')->name('product');
Route::get ('products/{product}','ProductController@show')->name('product.show');

Route::get ('categories/{category}','CategoriesController@show')->name('categories.show');

//Route::namespace('Account')->prefix('account')->name('account.')->middleware(['auth'])
//    ->group(function (){
//        Route::get('/', 'UserController@index')->name('main');
//    });

//Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware(['auth','admin'])
//    ->group(function (){
//        Route::get('/', 'AdminController@index')->name('dashboard');
//    });








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
