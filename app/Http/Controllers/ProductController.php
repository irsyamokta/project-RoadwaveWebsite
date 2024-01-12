<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;

class ProductController extends Controller
{
    public function tshirt()
    {
        $products = Product::where('category', 'T-Shirt')->get();

        return view('layouts.footer.collections.tshirt', compact('products'));
    }
    public function shirt()
    {
        $products = Product::where('category', 'Shirt')->get();

        return view('layouts.footer.collections.shirt', compact('products'));
    }
    public function pants()
    {
        $products = Product::where('category', 'Pants')->get();

        return view('layouts.footer.collections.pants', compact('products'));
    }
    public function outwear()
    {
        $products = Product::where('category', 'Outwear')->get();

        return view('layouts.footer.collections.outwear', compact('products'));
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

    public function addtocart($id){
        $products = Product::where('id', $id)->get();
        return view('layouts.checkout.checkout', compact('products'));
    }

    public function checkout(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'size' => 'required',
            'image' => 'required',
        ]);
        
        $cart = new Cart();
        $cart->name = $request->name;
        $cart->price = $request->price;
        $cart->size = $request->size;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imagePath = $request->file('image')->store('public/assets/product');
            $cart->image = basename($imagePath);
        } else {
            return redirect()->route('addtocart', $id)->with('error', 'Gagal menambahkan produk. File gambar tidak valid atau tidak diunggah.');
        }
        $cart->save();
        return redirect()->route('productdetail', $id)->with('success', 'Berhasil mengedit produk');
    }
    
}
