<?php

namespace Database\Seeders;

use App\Models\OrderDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OrderDetail::create([
            "order_id" => 1,
            "product_id" => 1,
            "transactionId" => "10001",
            "faskesName" => "Klinik Tamba",
            "faskesAddress" => "Jl. Gunung Semeru No.32, Delod Peken, Kec. Tabanan, Kabupaten Tabanan, Bali 82121, Indonesia",
            "faskesCoordinate" => "-8.538872231196716, 115.12707896602326",
            "patientName" => "Asep Munandar",
            "phoneNumber" => "+6281122334455",
        ]);
    }
}
