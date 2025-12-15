<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // 🔀 ARAHKAN SESUAI ROLE
            if (Auth::user()->role === 'admin') {
                return redirect()->route('produk.index');
            }

            if (Auth::user()->role === 'petugas') {
                return redirect()->route('produk.index');
            }

            Auth::logout();
            return back()->with('error', 'Role tidak dikenali');
        }

        return back()->with('error', 'Email atau password salah');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

}
