<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){

        return view('layouts.product.viewproduct');
    }

    public function order(){
        $orders = Order::all();
        $products = Product::all();
        return view('admin.order.vieworderproduct', compact('orders', 'products'));
    }

    public function orderinfo(Request $request, $id){
        $orders = Order::where('id', $id)->get();
        $products = Product::all();
        return view('admin.order.vieworderproduct', compact('orders', 'products'));
    }
}
