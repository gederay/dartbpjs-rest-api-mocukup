<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "name" => "Rai Sudana",
            "phone" => "+6285157279990",
            "email" => "raisudana@mail.com",
            "password" => bcrypt('password')
        ]);
        User::create([
            "name" => "Asep Munandar",
            "phone" => "+62851122334455",
            "email" => "asep@mail.com",
            "password" => bcrypt('password')
        ]);
    }
}
