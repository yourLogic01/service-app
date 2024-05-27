<?php

namespace App\Http\Controllers;

use App\Models\IndexData;
use Illuminate\Http\Request;

class IndexDataController extends Controller
{
    public function index()
    {
        $data = IndexData::first();
        return view('dashboard.data-setting.index', compact('data'));
    }
    public function updateIndexData(Request $request, $id)
    {
        $request->validate([
            'address' => 'required',
            'phone' => 'required|numeric|digits_between:10,13',
            'email' => 'required|email',
            'gmaps_url' => 'nullable',
        ], [
            'address.required' => 'Alamat harus diisi',
            'phone.required' => 'Nomor telepon harus diisi',
            'phone.numeric' => 'Nomor telepon harus berupa angka',
            'phone.digits_between' => 'Nomor telepon harus 10-13 angka',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email harus berupa email',
        ]);

        IndexData::find($id)->update($request->all());
        
        return redirect()->route('admin.indexData')->with('success', 'Data index berhasil diperbarui');
    }
}
