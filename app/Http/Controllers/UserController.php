<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('role')->get();
        return view('dashboard.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('dashboard.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'phone' => 'required|numeric|digits_between:10,13',
            'role' => 'required',
        ],[
            'name.required' => 'Nama lengkap harus diisi',
            'username.required' => 'Username harus diisi',
            'username.unique' => 'Username sudah terdaftar',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email harus berupa email',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 6 karakter',
            'phone.required' => 'Nomor telepon harus diisi',
            'phone.numeric' => 'Nomor telepon harus berupa angka',
            'phone.digits_between' => 'Nomor telepon harus 10-13 angka',
            'role.required' => 'Role harus dipilih',
        ]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
            'role_id' => $request->role
        ]);
        if($user)
        {
            session()->flash('success', 'Data user berhasil ditambahkan');
            return redirect()->route('admin.userIndex');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        if(!$user) {
            return view('dashboard.404');
        }

        return view('dashboard.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric|digits_between:10,13',
            'role' => 'required',
        ],[
            'name.required' => 'Nama lengkap harus diisi',
            'username.required' => 'Username harus diisi',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email harus berupa email',
            'phone.required' => 'Nomor telepon harus diisi',
            'phone.numeric' => 'Nomor telepon harus berupa angka',
            'phone.digits_between' => 'Nomor telepon harus 10-13 angka',
            'role.required' => 'Role harus dipilih',
        ]);

        $user = User::find($id);
        if($user) {
            $user->fill([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'phone' => $request->phone,
                'role_id' => $request->role
            ]);
            if(!empty($request->password)) {
                $user->password = bcrypt($request->password);
            }
            $user->save();
            session()->flash('success', 'Data user berhasil diedit');
            return redirect()->route('admin.userIndex');
        } else {
            return redirect()->back()->with('error', 'User not found.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if($user) {
            $user->delete();
            session()->flash('success', 'Data user berhasil dihapus');
            return redirect()->route('admin.userIndex');
        } else {
            return redirect()->back()->with('error', 'User not found.');
        }
    }
}
