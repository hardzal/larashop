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

Route::get('/hello', function() {
    return "Hello, Laravel!";
});

// bisa diakses dengan metode apapun
// Route::any()

// Bisa diakses dengan metode put ataupun patch
// Route::match(["PATCH", "PUT"])

// Memberikan nama route
// Route::get()->name('sesuatu');
// Mengakses nama route
// route('sesuatu');

// Menyatukan route, memberikan prefix "/sesuatu/"
// Route::group(["prefix" => "sesuatu"], function() {
    
// });

Route::get('/products', 'ProductController@index');

Route::get('/products/create', 'ProductController@create');

Route::get('/products/display', 'ProductController@showAll');

Route::post('/products/save', 'ProductController@saveNew');

// menggunakan question mark berarti memboleh parameter tersebut kosong
Route::get('/product/{product_id}?', 'ProductController@show');

Route::get('/products/list', 'ProductController@list');

Route::put('/product/{product_id}', 'ProductController@update');

Route::post('products', 'ProductController@store');

Route::resource('categories', 'CategoryController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
