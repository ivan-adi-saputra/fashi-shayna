<?php

use App\Http\Controllers\DashboardProductController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');
Route::get('dashboard', function () {
    return view('dashboard.pages.dashboard');
})->name('dashboard')->middleware('auth');

Route::get('register', [RegisterController::class, 'index'])->name('register')->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->name('register.store');

Route::get('login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('login', [LoginController::class, 'authenticate'])->name('authenticate');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::resource('dashboard/products', DashboardProductController::class);
