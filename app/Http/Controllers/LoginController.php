<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'login' => 'required',
            'password' => 'required',
        ]);

        if (
            Auth::attempt(['email' => $credentials['login'], 'password' => $credentials['password']]) ||
            Auth::attempt(['username' => $credentials['login'], 'password' => $credentials['password']])
        ) {
            if (Auth::user()->role->name == 'admin') {
                return redirect()->route('admin.dashboard');
            } else if (Auth::user()->role->name == 'user') {
                return redirect()->route('home');
            }
        }

        session()->flash('error', 'Username atau Password salah!');
        return back();
    }
}
