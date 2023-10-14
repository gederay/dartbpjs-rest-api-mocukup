<?php

namespace Database\Seeders;

use App\Models\Faskes;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FaskesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Faskes::create([
            "name" => "Klinik Tamba",
            "phone" => "+628512341234",
            "email" => "tamba@mail.com",
            "coordinate" => "-8.538872231196716, 115.12707896602326",
            "address" => "Jl. Gunung Semeru No.32, Delod Peken, Kec. Tabanan, Kabupaten Tabanan, Bali 82121, Indonesia",
        ]);
    }
}
