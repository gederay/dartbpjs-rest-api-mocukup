<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faskes extends Model
{
    use HasFactory;

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    // public function deliverymen() {
    //     return $this->hasMany();
    // }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
