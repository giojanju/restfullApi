<?php

use App\User;
use App\Seller;
use App\Product;
use App\Category;

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
    // $seller = Seller::has('products')->get()->random(); // seller aris user romesac mibmuli aqvs produqti
    // $buyer  = User::all()->except($seller->id);        // buyer 

    // factory(Product::class, $productQuantity)->create()->each(function($product) {
    //     $categories = Category::all()->random(mt_rand(1, 5))->pluck('id');
    //     // attach is shemtxvevashi masivi miebmeva masivs tavisi id ebidan gamomdinare
    //     $product->categories()->attach($categories);
    // });

    // $product = Product::with('categories')->get()->each(function($prod) {
    //     $cat = Category::all()->random(mt_rand(1, 5))->pluck('id');
    //     $prod->categories()->attach($cat);
    // });

    $product = Product::with('categories')->first();
    $product->categories()->attach(['1', '2', '3']);
    return $product;

    // 11 end next 12

});
