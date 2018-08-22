<?php

use App\User;
use App\Seller;
use App\Product;
use App\Category;

// change
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

// add route

Route::get('admin', function () {
    return view('admin');
});

Route::get('/', function () {
    $collection = User::all();
    $sorted = $collection->sortBy('name');
    return $sorted->values()->all();
});

Route::get('/home', function () {
    return $sorted->values()->all();

    // getting home information
});


