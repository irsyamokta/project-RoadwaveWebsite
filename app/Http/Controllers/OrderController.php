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

    public function order($id){
        $orders = Order::all();
        $products = Product::where('id', $id)->get();
        return view('layouts.product.viewproduct', compact('orders', 'products'));
    }

    // public function cart($id){
    //     $products = Product::where('id', $id)->get();
    //     return view('layouts.checkout.cartguest', compact('products'));
    // }
}
