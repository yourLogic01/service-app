<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use Illuminate\Http\Request;

class DashboardOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.order.index', [
            'orders' => Order::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.order.create',[
            'items' => Item::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'address' => 'required',
            'date' => 'required',
            'price' => 'required',
            'name' => 'required',
            'item_id' => 'required',
            'description' => 'required',
            'item_picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ],
        [
        'name.required' => 'Nama harus diisi',
        'price.required' => 'Harga harus diisi',
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
            'teknisi_id' => auth()->user()->id,
            'price' => $request->price,
            'name' => $request->name,
            'date' => $request->date,
            'address' => $request->address,
            'description' => $request->description,
            'item_picture' => $itemPicturePath,
            'status' => 2
         ]);
        
        return redirect()->route('admin.orderIndex')->with('success', 'Order berhasil dilakukan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
    public function confirmOrder(Request $request, $id)
    {
        $request->validate([
            'price' => 'required',
            'message' => 'required'
        ]);
        $order = Order::find($id);
        $order->update([
            'price' => $request->price,
            'status' => 2,
            'message' => $request->message
        ]);

        session()->flash('success', 'Data Order berhasil diperbarui');
        // Redirect pengguna ke halaman transaksi
        return redirect()->route('admin.orderIndex');
    }
    public function canceledOrder(Request $request, $id)
    {
        $request->validate([
            'message' => 'required'
        ]);
        $order = Order::find($id);
        $order->update([
            'status' => 0,
            'message' => $request->message
        ]);

        session()->flash('success', 'Data Order berhasil diperbarui');
        // Redirect pengguna ke halaman transaksi
        return redirect()->route('admin.orderIndex');
    }
}
