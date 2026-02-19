<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'category_id'=>1,
                'name'=>'laptop',
                'description'=>'high quality',
                'price'=> 700000
            ],
            [
                'category_id'=>2,
                'name'=>'Desk Chair',
                'description'=>'comfortable and good quality',
                'price'=>90000
            ],
            [
                'category_id'=>3,
                'name'=>'Iphone 17',
                'description'=>'high selling in the world',
                'price'=>590000
            ],
        ];
        foreach($products as $product){
            Product::create($product);
        }
    }
}