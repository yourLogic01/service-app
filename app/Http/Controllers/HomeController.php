<?php

namespace App\Http\Controllers;

use App\Models\IndexData;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view('home', [
            "currentPage" => "home",
            'data' => IndexData::first(),
            'posts' => Post::latest()->take(3)->get(),
        ]);
    }
}
