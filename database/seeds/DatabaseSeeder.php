<?php

use App\User;
use App\Product;
use App\Category;
use App\Transaction;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {   
        // foreign key ebs ar sheamowmebs da ise wava bazashi da ar moxvdeba konfliqti monacemebis gagzavnis dros
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        // $this->call(UsersTableSeeder::class);
        // truncate - mtel teiblis monacemebs asuftavebs ise rom kavshirebs ar aqcevs mnishvnelobas
        User::truncate();
        Category::truncate();
        Product::truncate();
        Transaction::truncate();
        
        DB::table('category_product')->truncate();

        $usersQuantity = 1000;
        $categoriesQuantity = 30;
        $productQuantity = 1000;
        $transactionsQuantity = 1000;

        factory(User::class, $usersQuantity)->create();
        factory(Category::class, $categoriesQuantity)->create();
        // iqmneba produqtis da kategoriis kavshirebi
        factory(Product::class, $productQuantity)->create()->each(function($product) {
            // titoeuli produqtistvis gamogvaqvs shemtxvevit shercheuli kategoriebis id ebi 1-5 amde;
            $categories = Category::all()->random(mt_rand(1, 5))->pluck('id'); 
            //pluck methodi gaaertianebs yvelas ert collectionshi da gamoitans shercheulis mxolod id-s
            // attach is shemtxvevashi masivi miebmeva masivs tavisi id ebidan gamomdinare
            $product->categories()->attach($categories);
        });

        factory(Transaction::class, $transactionsQuantity)->create();
        
    }
}
