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

use App\Supercategory;
use \Illuminate\Support\Facades\Auth;

Route::get('/pay_page', 'OrderController@paypage');

Route::get('/result', 'ResultController@index')->middleware('auth');

Route::get('', 'ProductController@mainpage');

Route::get('/admin', 'AdminController@show')->middleware('auth');


Route::get('/watch/categories', function(){
    return view('admin.category-watch');
})->middleware('auth');

Route::get('/watch/products', 'ProductController@watch')->middleware('auth');

Route::get('/watch/categories', function(){
    return view('admin.category-watch');
})->middleware('auth');

Route::get('/create/category', 'CategoryController@create')->middleware('auth');
Route::post('/create/category', 'CategoryController@store')->middleware('auth');
Route::get('/edit/category/{category}', 'CategoryController@edit')->middleware('auth');
Route::patch('/edit/category/{category}', 'CategoryController@update')->middleware('auth');
Route::delete('/delete/category/{category}', 'CategoryController@destroy')->middleware('auth');

Route::get('/create/product', 'ProductController@create')->middleware('auth');
Route::post('/create/product', 'ProductController@store')->middleware('auth');
Route::get('/catalog/{supercateg}/categories/{category}/{product}', 'ProductController@show');
Route::get('/edit/product/{product}', 'ProductController@edit')->middleware('auth');
Route::post('/edit/product/{product}', 'ProductController@update')->middleware('auth');
Route::delete('/delete/product/{product}', 'ProductController@destroy')->middleware('auth');

Route::get('/sales', 'ProductController@sales');

Route::post('/img/upload', 'ImgController@upload')->name('img.upload');

Route::get('/catalog/{supercateg}/categories/{category}', 'CategoryController@show');
Route::get('/favourites', 'ProductController@favourites');

Route::get('/shopping_cart', 'OrderItemsController@show');
Route::post('/order/create', 'OrderController@store');
Route::post('/order/online', 'OrderController@online');
Route::get('/success', 'OrderController@success');
Route::post('/order/change', 'OrderController@status')->middleware('auth');


Route::get('/confidentiality', 'InfoController@confid');
Route::get('/public_offer', 'InfoController@offer');
Route::get('/cooperation', 'InfoController@coop');
Route::get('/contacts', 'InfoController@contacts');
Route::get('/delivery', 'InfoController@delivery');
Route::get('/payment', 'InfoController@payment');
Route::get('/faq', 'InfoController@faq');


Auth::routes();
