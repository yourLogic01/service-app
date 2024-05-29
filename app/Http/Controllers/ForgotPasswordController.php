<?php

namespace App\Http\Controllers;

use App\Mail\ResetPassword;
use App\Models\IndexData;
use Illuminate\Support\Facades\Mail;
use App\Models\PasswordResetToken;
use App\Models\User;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    public function forgot_password()
    {
        return view('auth.forgot-password',[
            'data' => IndexData::first(),
        ]);
    }

    public function forgot_password_action(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ], [
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email harus berupa email',
            'email.exists' => 'Email tidak terdaftar',
        ]);

        $token = \Str::random(60);

        PasswordResetToken::updateOrCreate(
            [
                'email' => $request->email
            ],
            [
                'email' => $request->email,
                'token' => $token,
                'created_at' => now(),
            ]
        );

        Mail::to($request->email)->send(new ResetPassword($token));

        $data = [
            'email' => $request->email,
        ];

        return redirect()->route('forgot-password')->with('success', 'Link telah dikirim ke email anda');
    }

    public function new_password($token)
    {
        $getToken = PasswordResetToken::where('token', $token)->first();

        if (!$getToken) {
            return redirect()->route('login')->with('error', 'Token tidak valid');
        }
        $data = IndexData::first();

        return view('auth.new-password', compact('token','data'));
    }

    public function new_password_action(Request $request)
    {
        $request->validate([
            'password' => 'required|min:6',
        ], [
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 6 karakter',
        ]);

        $token = PasswordResetToken::where('token', $request->token)->first();
        $user = User::where('email', $token->email)->first();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Email tidak terdaftar');
        }

        $user->update([
            'password' => bcrypt($request->password)
        ]);

        $token->delete();

        return redirect()->route('login')->with('success', 'Password berhasil diubah');
    }
}
