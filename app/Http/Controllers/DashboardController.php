<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $currentYear = date('Y');
        $currentMonth = date('m');

        $transactionsYear = Order::whereYear('created_at', $currentYear)
            ->where('status', '>=', 2)->get();

        $totalCurrentYear = $transactionsYear->sum('price');

        $transactionsMonth = Order::whereMonth('created_at', $currentMonth)
            ->where('status', '>=', 2)->get();

        $totalCurrentMonth = $transactionsMonth->sum('price');

        $earningsPerMonth = [];
        for ($month = 1; $month <= 12; $month++) {
            $transactions = Order::whereYear('created_at', $currentYear)
                ->whereMonth('created_at', $month)
                ->where('status', '>=', 2)->get();

            $currentMonthSum = $transactions->sum('price');

            $earningsPerMonth[] = $currentMonthSum;
        }

        // Mengambil total transaksi yang sukses berdasarkan field_type menggunakan Eloquent
        $transactionSuccess = Order::where('status', '>=', 2)->get();

        // Mengubah data yang dihasilkan ke format yang cocok untuk digunakan dalam grafik
        $labels = $transactionSuccess->pluck('created_at');
        $data = $transactionSuccess->pluck('price');

        return view('dashboard.index', compact('totalCurrentYear', 'totalCurrentMonth', 'earningsPerMonth', 'labels', 'data'));
    }
}
