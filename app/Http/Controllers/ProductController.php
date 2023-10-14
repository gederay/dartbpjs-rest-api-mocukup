<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function get_products()
    {
        $products = Product::all();

        return response()->json($products, 200);
    }
}
