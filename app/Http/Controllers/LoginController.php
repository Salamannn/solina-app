<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        //dd($request);
        if (Auth::attempt(['name' => $request->username, 'password' => $request->password])) {
            // Jika berhasil login, redirect ke halaman yang diinginkan
            return redirect()->route('admin.dashboard'); // Ganti 'dashboard' dengan route yang sesuai
        }

        // Jika gagal login, kembali ke halaman login dengan error message
        return redirect()->back()->with('loginError', 'Username atau password salah.');

    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();

        return redirect('/');
    }
}
