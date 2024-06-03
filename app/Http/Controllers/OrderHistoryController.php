<?php

namespace App\Http\Controllers;

use App\Models\IndexData;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderHistoryController extends Controller
{
    public function index()
    {
        $orders = Order::with('item')->where('user_id', auth()->user()->id)->get();
        return view('order.history-order', [
            'orders' => $orders,
            'data' => IndexData::first(),
        ]);
    }

    public function show($id)
    {
        $order = Order::with('item')->find($id);
        return view('order.history-detail', [
            'order' => $order,
        ]);
    }
}
