<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;

class HomeController extends Controller
{
    public function product()
    {
        $orders = Order::all();
        $products = Product::all();

        return view('home', compact('products', 'orders'));
    }
}
