<?php

namespace App\Http\Controllers;

use App\Mail\NewOrder;
use App\Models\IndexData;
use App\Models\Item;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        $order = Order::create([
            'user_id' => auth()->user()->id,
            'item_id' => $request->item_id,
            'customer_name' => auth()->user()->name,
            'date' => $request->date,
            'address' => $request->address,
            'description' => $request->description,
            'item_picture' => $itemPicturePath,
            'status' => 1
         ]);
        // Ambil email dari pengguna dengan role_id 1 dan 3
        $recipientsRole1 = User::where('role_id', 1)->pluck('email')->toArray();
        $recipientsRole3 = User::where('role_id', 3)->pluck('email')->toArray();

        // Gabungkan email-email tersebut
        $recipients = array_merge($recipientsRole1, $recipientsRole3);

        // Kirim email ke semua penerima
        Mail::to($recipients)->send(new NewOrder($order));
        return redirect()->route('order')->with('success', 'Order berhasil dilakukan');
    }
}
