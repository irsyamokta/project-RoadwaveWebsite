<?php

use App\Http\Controllers\UserController;
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


Route::get('/', function () {
    return view('home');
});

Route::get('/home', [UserController::class, 'index'])->name('home');
Route::get('register', [UserController::class, 'register'])->name('register');
Route::post('register', [UserController::class, 'register_action'])->name('register.action');
Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('login', [UserController::class, 'login_action'])->name('login.action');
Route::get('password', [UserController::class, 'password'])->name('password');
Route::post('password', [UserController::class, 'password_action'])->name('password.action');
Route::get('logout', [UserController::class, 'logout'])->name('logout');

Route::get('/panduanukuran', function () {
    return view('layouts.bantuan.panduanukuran');
});
Route::get('/pertanyaanumum', function () {
    return view('layouts.bantuan.pertanyaanumum');
});
Route::get('/pengiriman', function () {
    return view('layouts.bantuan.pengiriman');
});
Route::get('/ketentuan', function () {
    return view('layouts.bantuan.ketentuan');
});
Route::get('/retur', function () {
    return view('layouts.bantuan.retur');
});
Route::get('/tentangkami', function () {
    return view('layouts.informasi.tentang');
});
Route::get('/aturanpenggunaan', function () {
    return view('layouts.informasi.aturanpengguna');
});
Route::get('/kebijakanprivasi', function () {
    return view('layouts.informasi.kebijakanprivasi');
});
Route::get('/kebijakanhakcipta', function () {
    return view('layouts.informasi.kebijakanhakcipta');
});
Route::get('/syaratketentuan', function () {
    return view('layouts.informasi.syaratketentuan');
});
Route::get('/aturan', function () {
    return view('layouts.informasi.aturan');
});
Route::get('/tshirt', function () {
    return view('layouts.collections.tshirt');
});

