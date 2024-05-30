<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexDataController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
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
// Route::get('/order', [OrderController::class, 'index'])->name('order');
// blog
Route::get('/post', [PostController::class, 'index'])->name('post');
Route::get('/post/detail/{post:slug}', [PostController::class, 'show'])->name('post.show');

//login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.store');

//register
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

//forgot password
Route::get('/forgot-password', [ForgotPasswordController::class, 'forgot_password'])->name('forgot-password');
Route::get('/new-password/{token}', [ForgotPasswordController::class, 'new_password'])->name('new-password');
Route::post('/forgot-password', [ForgotPasswordController::class, 'forgot_password_action'])->name('forgot-password.action');
Route::post('/new-password', [ForgotPasswordController::class, 'new_password_action'])->name('newPassword.auth');

//add comment
Route::post('/post/detail/{slug}/comment', [CommentController::class, 'store'])->middleware('auth');

Route::middleware(['auth', 'inactivityTimeout:1800'])->group(function () {
    Route::middleware('role:admin|teknisi')->group(function () {
        Route::prefix('admin')->group(function () {
            Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');


            // barang /item
            Route::get('/item', [ItemController::class, 'index'])->name('admin.itemIndex');
            Route::get('/item/create', [ItemController::class, 'create'])->name('admin.itemCreate');
            Route::post('/item/store', [ItemController::class, 'store'])->name('admin.itemStore');
            Route::get('/item/edit/{id}', [ItemController::class, 'edit'])->name('admin.itemEdit');
            Route::put('/item/update/{id}', [ItemController::class, 'update'])->name('admin.itemUpdate');
            Route::delete('/item/delete/{id}', [ItemController::class, 'destroy'])->name('admin.itemDelete');

            // // Booking
            // Route::get('/booking', [BookingController::class, 'index'])->name('admin.bookingIndex');

            // // Transaction
            // Route::get('/transaction', [BookingController::class, 'transactionIndex'])->name('admin.transactionIndex');
            // Route::get('/transaction/load-transactions', [BookingController::class, 'loadTransactions'])->name('admin.loadTransactions');
            // Route::get('/transaction/export-pdf', [BookingController::class, 'transactionExportPDF'])->name('admin.transactionExportPDF');

            // // User
            Route::get('/user', [UserController::class, 'index'])->name('admin.userIndex');
            Route::get('/user/create', [UserController::class, 'create'])->name('admin.userCreate');
            Route::post('/user/store', [UserController::class, 'store'])->name('admin.userStore');
            Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('admin.userEdit');
            Route::put('/user/update/{id}', [UserController::class, 'update'])->name('admin.userUpdate');
            Route::delete('/user/delete/{id}', [UserController::class, 'destroy'])->name('admin.userDelete');

            // // Post
            Route::get('/post', [DashboardPostController::class, 'index'])->name('admin.postIndex');
            Route::get('/post/create', [DashboardPostController::class, 'create'])->name('admin.postCreate');
            Route::get('/post/detail/{id}', [DashboardPostController::class, 'show'])->name('admin.postDetail');
            Route::get('/post/edit/{id}', [DashboardPostController::class, 'edit'])->name('admin.postEdit');
            Route::get('/post/checkSlug', [DashboardPostController::class, 'checkSlug']);
            Route::post('/post/store', [DashboardPostController::class, 'store'])->name('admin.postStore');
            Route::put('/post/update/{id}', [DashboardPostController::class, 'update'])->name('admin.postUpdate');
            Route::delete('/post/delete/{id}', [DashboardPostController::class, 'destroy'])->name('admin.postDelete');

            // // Profile
            Route::get('/profile', [ProfileController::class, 'index'])->name('admin.profile');
            Route::get('/profile/edit/{id}', [ProfileController::class, 'editProfile'])->name('admin.editProfile');
            Route::put('/profile/update/{id}', [ProfileController::class, 'updateProfile'])->name('admin.updateProfile');

            // Index Data
            Route::get('/index-data', [IndexDataController::class, 'index'])->name('admin.indexData');
            Route::put('/index-data/update/{id}', [IndexDataController::class, 'updateIndexData'])->name('admin.updateIndexData');
        });
    });
    Route::middleware('role:user')->group(function () {
        Route::prefix('user')->group(function () {
            Route::get('/home', [HomeController::class, 'index'])->name('user.index');
            Route::get('/order', [OrderController::class, 'index'])->name('order');
            Route::post('/order', [OrderController::class, 'create'])->name('order.create');
            
    //         // Transaction History
    //         Route::get('/transaction/history', [TransactionController::class, 'transactionHistory'])->name('user.transactionHistory');
    //         Route::get('/transaction/history/{id}', [TransactionController::class, 'transactionHistoryShow'])->name('user.transactionHistoryDetail');

    //         // Profile
            Route::get('/profile', [ProfileController::class, 'index'])->name('user.profile');
            Route::get('/profile/edit/{id}', [ProfileController::class, 'editProfile'])->name('user.editProfile');
            Route::put('/profile/update/{id}', [ProfileController::class, 'updateProfile'])->name('user.updateProfile');
        });
    });
    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
});