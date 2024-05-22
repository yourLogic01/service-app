<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/order', [OrderController::class, 'index'])->name('order');
// blog
Route::get('/post', [PostController::class, 'index'])->name('post');
Route::get('/post/detail/{post:slug}', [PostController::class, 'show'])->name('post.show');

//login
Route::get('/login', [LoginController::class, 'index'])->name('login');
//register
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

//add comment
Route::post('/post/detail/{slug}/comment', [CommentController::class, 'store'])->middleware('auth');