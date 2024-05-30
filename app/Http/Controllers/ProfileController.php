<?php

namespace App\Http\Controllers;

use App\Models\IndexData;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $profile = Auth::user();
        $data = IndexData::first();

        if ($user->role_id == 1 || $user->role_id == 3) {
            return view('dashboard.profile.index', compact('profile'));
        } else if ($user->role_id == 2) {
            return view('profile.index',['currentPage' => 'profile'], compact('profile','data'));
        } else {
            return abort(403);
        }
    }

    public function editProfile($id)
    {
        $user = auth()->user();
        $data = IndexData::first();
        $profile = User::find($id);
        if (Auth::user()->id != $id) {
            return abort(403);
        }

        if ($user->role_id == 1 || $user->role_id == 3) {
            return view('dashboard.profile.edit', compact('profile'));
        } else if ($user->role_id == 2) {
            return view('profile.edit', compact('profile','data'));
        } else {
            return abort(403);
        }
    }

    public function updateProfile(Request $request, $id)
    {
        $user = auth()->user();
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username,' . $id,
            'email' => 'required|email|unique:users,email,' . $id,
            'phone' => 'required|numeric|digits_between:10,13',
            'password' => 'nullable|min:6',
        ], [
            'name.required' => 'Nama lengkap harus diisi',
            'username.required' => 'Username harus diisi',
            'username.unique' => 'Username sudah terdaftar',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email harus berupa email',
            'email.unique' => 'Email sudah terdaftar',
            'phone.required' => 'Nomor telepon harus diisi',
            'phone.numeric' => 'Nomor telepon harus berupa angka',
            'phone.digits_between' => 'Nomor telepon harus 10-13 angka',
            'password.min' => 'Password minimal 6 karakter',
        ]);

        $profile = User::find($id);

        if (Auth::user()->id != $id) {
            return abort(403);
        }

        $profile->fill([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        if (!empty($request->password)) {
            $profile->password = bcrypt($request->password);
        }

        if ($request->hasFile('avatar')) {
            if ($profile->avatar) {
                Storage::disk('public')->delete($profile->avatar);
            }

            $profile->avatar = $request->file('avatar')->store('avatars', 'public');
        }

        $profile->save();

        if ($user->role_id == 1 || $user->role_id == 3) {
            return redirect()->route('admin.profile')->with('success', 'Profile berhasil diperbarui');
        } elseif ($user->role_id == 2) {
            return redirect()->route('user.profile')->with('success', 'Profile berhasil diperbarui');
        } else {
            return abort(403);
        }
    }
}
