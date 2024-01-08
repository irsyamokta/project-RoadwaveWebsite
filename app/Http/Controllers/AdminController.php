<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{

    public function index()
    {
        return view('admin.dashboard.dashboard');
    }

    public function loginAdmin()
    {
        if (Auth::check()) {
            return redirect('/');
        }

        $data['title'] = 'Login Admin';
        return view('admin.auth.login', $data);
    }

    public function loginAdmin_action(Request $request) {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('username', $request->username)->first();

        $user = User::where('username', $request->username)->first();

        if ($user && $user->role === 'user') {
            return back()->withInput()->withErrors(['error' => 'Akses Dibatasi']);
        }

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password, 'role' => 'admin'])) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        } 

        return back()->withErrors([
            'password' => 'Username atau Password salah',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function dashboard(){
        $orders = Order::all();
        $products = Product::all();
        return view('admin.dashboard.dashboard', compact('orders', 'products'));
    }

    public function products(){
        $products = Product::all();
        return view('admin.crud.viewproduct', compact('products'));
    }

    public function addProduct(){
        return view('admin.crud.addproduct');
    }

    public function addProduct_action(Request $request){
        $request->validate([
            'name' => 'required|string',
            'price'=> 'required|numeric',
            'description'=> 'required',
            'category'=> 'required',
            'quantity'=> 'required|numeric',
            'color'=> 'required',
            'size'=> 'required',
            'image'=> 'required',
        ]);
 
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->category = $request->category;
        $product->quantity = $request->quantity;
        $product->color = $request->color;
        $product->size = $request->size;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imagePath = $request->file('image')->store('public/assets/product');
            $product->image = basename($imagePath);
        } else {
            return redirect()->route('products')->with('error', 'Gagal menambahkan produk. File gambar tidak valid atau tidak diunggah.');
        }

        $product->save();

        return redirect()->route('products')->with('success', 'Berhasil menambahkan produk');
    }

    public function editProduct($id){
        $product = Product::find($id);
    
        if (!$product) {
            abort(404);
        }
    
        return view('admin.crud.updateproduct', compact('product'));
    }

    public function editProduct_action(Request $request, $id){
        $request->validate([
            'name' => 'required|string',
            'price'=> 'required|numeric',
            'description'=> 'required',
            'category'=> 'required',
            'quantity'=> 'required|numeric',
            'size'=> 'required',
            'color'=> 'required',
            'image'=> 'required|image|max:2048',
        ]);

        $product = Product::find($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->category = $request->category;
        $product->quantity = $request->quantity;
        $product->color = $request->color;
        $product->size = $request->size;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imagePath = $request->file('image')->store('public/assets/product');
            $product->image = basename($imagePath);
        } else {
            return redirect()->route('addproduct')->with('error', 'Gagal menambahkan produk. File gambar tidak valid atau tidak diunggah.');
        }
        $product->save();
        return redirect()->route('products')->with('success', 'Berhasil mengedit produk');
    }


    public function deleteProduct_action($id){
        $product = Product::find($id);

        if (!$product) {
            return redirect()->route('products')->with('error', 'Produk tidak ditemukan');
        }

        $imagePath = public_path("storage/assets/product/{$product->image}");
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        $product->delete();
        return redirect()->route('products')->with('success', 'Produk berhasil dihapus');
    }
}
