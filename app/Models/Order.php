<?php

namespace App\Models;

use App\Models\User;
use App\Models\Faskes;
use App\Models\OrderDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $casts = [
        'faskes_id' => 'integer',
        'user_id' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function customer()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function faskes()
    {
        return $this->belongsTo(Faskes::class, 'faskes_id');
    }

    public function details()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
