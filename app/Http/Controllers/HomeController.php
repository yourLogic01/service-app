<?php

namespace App\Http\Controllers;

use App\Models\IndexData;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view('home', [
            "currentPage" => "home",
            'data' => IndexData::first(),
        ]);
    }
}
