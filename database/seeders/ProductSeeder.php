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
        Product::create([
            "name" => "Paket A",
            "description" => "Paket rawat jalan 30 hari",
            "price" => 15000,
            "faskes_id" => 1
        ]);

        Product::create([
            "name" => "Paket B",
            "description" => "Paket rawat jalan 20 hari",
            "price" => 12000,
            "faskes_id" => 1
        ]);
    }
}
