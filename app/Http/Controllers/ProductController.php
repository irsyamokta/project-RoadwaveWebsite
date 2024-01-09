<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function product()
    {
        $products = Product::all();

        return view('layouts.footer.collections.tshirt', compact('products'));
    }

    public function cart(){
        $products = Product::take(5)->get();
        if(Auth::check()){
            return view('layouts.checkout.cartauth', compact('products'));
        }else{
            return view('layouts.checkout.cartguest', compact('products'));
        }
    }

    public function productdetail($id){
        $products = Product::where('id', $id)->get();
        if(Auth::check()){
            return view('layouts.product.viewproductauth', compact('products'));
        }else{
            return view('layouts.product.viewproduct', compact('products'));
        }
    }

}
