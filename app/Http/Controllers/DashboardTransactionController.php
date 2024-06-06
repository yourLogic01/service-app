<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardTransactionController extends Controller
{
    public function index()
    {
        $startDate = Carbon::now()->startOfDay();
        $endDate = Carbon::now()->endOfDay();
    
        
        
        $orders = Order::where('status', '>=', 2)
        ->whereBetween('created_at', [$startDate, $endDate])
        ->with('item')
        ->get();
    
        $totalTransaction = $orders->sum('price');
        
        
        return view('dashboard.transaction.index', compact('orders', 'startDate', 'endDate', 'totalTransaction'));
    }
    

    public function loadTransactions(Request $request)
    {
        $startDate = Carbon::parse($request->start_date)->startOfDay();
        $endDate = Carbon::parse($request->end_date)->endOfDay();

        $orders = Order::whereBetween('created_at', [$startDate, $endDate])
            ->with('item') // include related item data
            ->get();

        foreach ($orders as $order) {
            $order->actions = '<a href="' . route('admin.detailTransaction', $order->id) . '" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Detail" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>';
        }

        $totalTransaction = $orders->sum('price');

        return response()->json([
            'orders' => $orders,
            'totalTransaction' => $totalTransaction,
        ]);
        // $startDate = Carbon::parse($request->start_date)->startOfDay();
        // $endDate = Carbon::parse($request->end_date)->endOfDay();

        // // Query transactions within date range
        // $orders = Order::where('status', '>=', 2)
        // ->whereBetween('created_at', [$startDate, $endDate])
        // ->with('item')
        // ->get();
        // $totalTransaction = $orders->sum('price');

        // return response()->json([
        //     'orders' => $orders,
        //     'totalTransaction' => $totalTransaction
        // ]);
    }

    public  function detailTransaction($id)
    {
        $order = Order::find($id);
        return view('dashboard.transaction.show', compact('order'))->with('item');
    }
    // public function index()
    // {
        
    //     // Mengambil data order dari database
    //     $orders = Order::all();
    //     // Mendapatkan total transaksi dari database
    //     $totalTransaction = $orders->sum('price');
        
    //     return view('dashboard.transaction.index', compact('totalTransaction', 'orders'));
    // }

    // public function loadTransactions(Request $request)
    // {
    //     // Mengambil tanggal awal dan akhir dari permintaan
    //     $startDate = $request->input('start_date');
    //     $endDate = $request->input('end_date');

    //     // Mengambil data transaksi berdasarkan rentang tanggal
    //     $transactions = Order::whereBetween('created_at', [$startDate, $endDate])->get();

    //     // Menghitung total transaksi dalam rentang tanggal
    //     $totalTransaction = $transactions->sum('price');

    //     // Mengembalikan data transaksi dan total transaksi dalam format JSON
    //     return response()->json([
    //         'transactions' => $transactions,
    //         'totalTransaction' => $totalTransaction,
    //     ]);
    // }
}
