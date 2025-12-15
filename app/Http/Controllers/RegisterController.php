<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    
    public function createPetugas()
    {
        abort_unless(auth()->user()->role === 'admin', 403);

        $petugas = User::where('role', 'petugas')
            ->orderBy('name')
            ->get();

        return view('admin.register', compact('petugas'));
    }

    public function storePetugas(Request $request)
    {
        abort_unless(auth()->user()->role === 'admin', 403);

        $request->validate([
            'name'     => 'required|string|max:100',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'petugas' // DIPAKSA PETUGAS
        ]);

        return redirect()->route('admin.petugas.create')
            ->with('success', 'Petugas berhasil ditambahkan');
    }
}
