<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::controller(AdminController::class)->group(function () {
    Route::get('admin', [AdminController::class, 'loginAdmin'])->name('loginAdmin');
    Route::post('admin', [AdminController::class, 'loginAdmin_action'])->name('loginAdmin.action');
    Route::prefix('homepage')->middleware('user.role:admin')->group(function () {
        Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('products', [AdminController::class, 'products'])->name('products');
        Route::get('addproduct', [AdminController::class, 'addproduct'])->name('addproduct');
        Route::post('addproduct', [AdminController::class, 'addproduct_action'])->name('addproduct.action');
        Route::get('editproduct/{id}', [AdminController::class, 'editproduct'])->name('editproduct');
        Route::post('editproduct/{id}', [AdminController::class, 'editproduct_action'])->name('editproduct.action');
        Route::delete('deleteproduct/{id}', [AdminController::class, 'deleteproduct_action'])->name('deleteproduct.action');
    });
});

Route::controller(UserController::class)->group(function () {
    Route::get('home', [UserController::class, 'index'])->name('home');
    Route::get('register', [UserController::class, 'register'])->name('register');
    Route::post('register', [UserController::class, 'register_action'])->name('register.action');
    Route::get('login', [UserController::class, 'login'])->name('login');
    Route::post('login', [UserController::class, 'login_action'])->name('login.action');
    Route::get('password', [UserController::class, 'password'])->name('password');
    Route::post('password', [UserController::class, 'password_action'])->name('password.action');
    Route::get('logout', [UserController::class, 'logout'])->name('logout');
});

Route::controller(HomeController::class)->group(function (){
    Route::prefix('/')->group(function (){
        Route::get('', [HomeController::class, 'product'])->name('product');
        Route::get('/home', [HomeController::class, 'product'])->name('product');
    });
});

Route::controller(OrderController::class)->group(function (){
    Route::get('order/{id}', [OrderController::class, 'order'])->name('order');
    
});

Route::controller(ProductController::class)->group(function (){
    Route::get('tshirt', [ProductController::class, 'product'])->name('product');
    Route::get('cart', [ProductController::class, 'cart'])->name('cart');
    Route::get('productdetail/{id}', [ProductController::class, 'productdetail'])->name('productdetail');
});


Route::get('/panduanukuran', function () {
    return view('layouts.footer.bantuan.panduanukuran');
});
Route::get('/pertanyaanumum', function () {
    return view('layouts.footer.bantuan.pertanyaanumum');
});
Route::get('/pengiriman', function () {
    return view('layouts.footer.bantuan.pengiriman');
});
Route::get('/ketentuan', function () {
    return view('layouts.footer.bantuan.ketentuan');
});
Route::get('/retur', function () {
    return view('layouts.footer.bantuan.retur');
});
Route::get('/tentangkami', function () {
    return view('layouts.footer.informasi.tentang');
});
Route::get('/aturanpenggunaan', function () {
    return view('layouts.footer.informasi.aturanpengguna');
});
Route::get('/kebijakanprivasi', function () {
    return view('layouts.footer.informasi.kebijakanprivasi');
});
Route::get('/kebijakanhakcipta', function () {
    return view('layouts.footer.informasi.kebijakanhakcipta');
});
Route::get('/syaratketentuan', function () {
    return view('layouts.footer.informasi.syaratketentuan');
});
Route::get('/aturan', function () {
    return view('layouts.footer.informasi.aturan');
});