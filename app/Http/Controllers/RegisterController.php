<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'phone' => 'required|numeric|digits_between:10,13',
        ], [
            'name.required' => 'Nama lengkap harus diisi',
            'username.required' => 'Username harus diisi',
            'username.unique' => 'Username sudah terdaftar',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email harus berupa email',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Password harus diisi',
            'phone.required' => 'Nomor telepon harus diisi',
            'phone.numeric' => 'Nomor telepon harus berupa angka',
            'phone.digits_between' => 'Nomor telepon harus 10-13 angka',
        ]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
            'role_id' => 2,
        ]);

        if ($user) {
            session()->flash('success', 'Akun berhasil dibuat');
            return redirect()->route('login');
        } else {
            session()->flash('error', 'Akun gagal ditambahkan');
            return back();
        }
    }
}
