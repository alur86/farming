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

//ProductsController
Route::get('/products', 'ProductsController@index')->name('products');
Route::get('/addproduct', 'ProductsController@add')->name('addproduct');
Route::get('/edit_product/{id}', 'ProductsController@edit')->name('edit_product');
Route::get('/show_product/{id}', 'ProductsController@show')->name('show_product');
Route::post('/addedproduct', 'ProductsController@added')->name('addedproduct');
Route::post('/editedproduct', 'ProductsController@updated')->name('editedproduct');


//CatalogsController
Route::get('/catalogs', 'CatalogsController@index')->name('catalogs');
Route::get('/addcatalog', 'CatalogsController@add')->name('addproduct');
Route::get('/edit_catalog/{id}', 'CatalogsController@edit')->name('edit_catalog');
Route::get('/show_catalog/{id}', 'CatalogsController@show')->name('show_catalog');
Route::post('/addedcatalog', 'CatalogsController@added')->name('addedcatalog');
Route::post('/editedcatalog', 'CatalogsController@updated')->name('editedcatalog');




