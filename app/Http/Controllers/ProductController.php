<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function product()
    {
        $products = Product::all();

        return view('layouts.collections.tshirt', compact('products'));
    }
}
