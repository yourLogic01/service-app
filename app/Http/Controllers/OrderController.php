<?php

namespace App\Http\Controllers;

use App\Models\IndexData;
use App\Models\Item;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return view('order.index', [
            "currentPage" => "order",
            'data' => IndexData::first(),
            'items' => Item::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'address' => 'required',
            'date' => 'required',
            'item_id' => 'required',
            'description' => 'required',
            'item_picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ],
        [
        'address.required' => 'Alamat harus diisi',
        'date.required' => 'Tanggal harus diisi',
        'item_id.required' => 'Item harus diisi',
        'description.required' => 'Deskripsi harus diisi',
        'item_picture.required' => 'Foto harus diisi',
        'item_picture.image' => 'File harus berupa gambar',
        'item_picture.mimes' => 'File harus berupa jpeg, png, atau jpg',
         ]);

         $itemPicturePath = $request->file('item_picture')->store('item-picture', 'public');
         Order::create([
            'user_id' => auth()->user()->id,
            'item_id' => $request->item_id,
            'date' => $request->date,
            'address' => $request->address,
            'description' => $request->description,
            'item_picture' => $itemPicturePath,
            'status' => 1
         ]);
        
        return redirect()->route('order')->with('success', 'Order berhasil dilakukan');
    }
}
