<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usres =[
            [
                'name'=>'kyaw kyaw',
                'email'=>'kyaw@gamil.com',
                'password'=>'password123',
                'address'=>'Yangon',
                'phone'=>'0987654327',
                'gender'=>'male',
            ],
            [
                'name'=>'Jonh',
                'email'=>'jonh@gamil.com',
                'password'=>'password123',
                'address'=>'Yangon',
                'phone'=>'0987654327',
                'gender'=>'male',
            ],
            [
                'name'=>'David',
                'email'=>'david@gamil.com',
                'password'=>'password123',
                'address'=>'Yangon',
                'phone'=>'0987654327',
                'gender'=>'male',
            ],
            [
                'name'=>'Rechal',
                'email'=>'rechal@gamil.com',
                'password'=>'password123',
                'address'=>'Yangon',
                'phone'=>'0987654327',
                'gender'=>'femal',
            ]
        ];
    }
}