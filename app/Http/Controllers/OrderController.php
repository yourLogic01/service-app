<?php

namespace App\Http\Controllers;

use App\Models\IndexData;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return view('order.index', [
            "currentPage" => "order",
            'data' => IndexData::first(),
        ]);
    }
}
