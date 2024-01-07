<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function register()
    {
        $data['title'] = 'Register';
        return view('user/register', $data);
    }

    public function register_action(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required',
            'password_confirm' => 'required|same:password',
        ]);

        $user = new User([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);
        $user->save();

        return redirect()->route('login')->with('success', 'Registrasi Berhasil. Silahkan login!');
    }


    public function login()
    {
        if (Auth::check()) {
            return redirect('/');
        }

        $data['title'] = 'Login';
        return view('user/login', $data);
    }

    public function login_action(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('username', $request->username)->first();

        if ($user && $user->role === 'admin') {
            return back()->withInput()->withErrors(['error' => 'Akses Dibatasi']);
        }

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password, 'role' => 'user'])) {
            $request->session()->regenerate();

            return redirect()->route('login');
        }

        return back()->withErrors([
            'password' => 'Username atau Password salah',
        ]);
    }

    public function password()
    {
        $data['title'] = 'Change Password';
        return view('user/password', $data);
    }

    public function password_action(Request $request)
    {
        $request->validate([
            'username' => 'required|exists:users,username',
            'new_password' => 'required|confirmed',
        ]);

        $user = User::where('username', $request->username)->first();

        if ($user) {
        
            $user->password = Hash::make($request->new_password);
            $user->save();

            if (Auth::check()) {
                $request->session()->regenerate();
            }

            return back()->with('success', 'Password berhasil diubah!');
        }

        return back()->withErrors([
            'username' => 'Username tidak ditemukan',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
