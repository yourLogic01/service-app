<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $item = Item::all();

        return view('dashboard.item.index', compact('item'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.item.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:items,name',
        ]);

        Item::create([
            'name' => $request->name
        ]);
        session()->flash('success', 'Data barang berhasil ditambahkan');
        return redirect()->route('admin.itemIndex');
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $item = Item::find($id);

        if(!$item) {
            return view('dashboard.404');
        }
        return view('dashboard.item.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:items,name,',
        ]);
        $item = Item::find($id);
        $item->update([
            'name' => $request->name
        ]);

        session()->flash('success', 'Data barang berhasil diubah');
        return redirect()->route('admin.itemIndex');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $item = Item::find($id);
        if(!$item) {
            session()->flash('error', 'Data barang tidak ditemukan');
            return redirect()->back();
        }
        $item->delete();
        session()->flash('success', 'Data barang berhasil dihapus');
        return redirect()->route('admin.itemIndex');
    }
}
