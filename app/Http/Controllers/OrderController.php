<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){

        return view('admin.dashboard');
    }

    public function order(){
        $orders = Order::all();
        $products = Product::all();
        return view('admin.index', compact('orders', 'products'));
    }
}
