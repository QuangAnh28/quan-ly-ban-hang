<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Trang chủ → chuyển về login
Route::get('/', function () {
    return redirect('/login');
});

/* ======================
   AUTH ROUTES
====================== */

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');


/* ======================
   DASHBOARD (CHUNG)
====================== */

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');


/* ======================
   QUẢN LÝ USER
   (CHỈ ADMIN)
====================== */

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::resource('users', UserController::class);

});


/* ======================
   ROUTE TEST ROLE
====================== */

Route::get('/admin', function () {
    return "Trang quản trị Admin";
})->middleware(['auth', 'role:admin']);

Route::get('/staff', function () {
    return "Trang nhân viên";
})->middleware(['auth', 'role:staff']);