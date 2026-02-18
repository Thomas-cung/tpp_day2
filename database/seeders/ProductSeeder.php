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
                'name'=>'laptop',
                'description'=>'high quality',
                'price'=> 700000
            ],
            [
                'name'=>'Desk Chair',
                'description'=>'comfortable and good quality',
                'price'=>90000
            ],
            [
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