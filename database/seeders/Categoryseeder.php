<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Categoryseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories =[
            [
                'name'=>'food',
                'description'=>'testing good',
            ],
            [
                'name'=>'Travel',
                'description'=>'get good vibe',
            ],
            [
                'name'=>'Technology',
                'description'=>'Get a good job',
            ]
        ];
        foreach($categories as $category){
            Category::create($category);
        }
    }
}