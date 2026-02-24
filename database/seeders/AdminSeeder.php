<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => "Thomas",
            'email' => "thomas@mail.com",
            'password' => Hash::make('password'),
            'address' => "Yangon",
            'phone' => '09440981314',
            'gender' => 'male',
        ]);
    }
}
