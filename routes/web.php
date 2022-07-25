<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardCategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardGalleryController;
use App\Http\Controllers\DashboardProductController;
use App\Http\Controllers\DashboardTransactionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Models\Cart;
use App\Models\Product;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('product', [ProductController::class, 'index'])->name('product')->middleware('auth');
Route::get('product/{id}/details', [ProductController::class, 'details'])->name('product-details')->middleware('auth');
Route::post('product/{id}', [ProductController::class, 'comment'])->name('add-comment')->middleware('auth');

Route::get('cart', [CartController::class, 'index'])->name('cart');
Route::post('cart/{id}', [CartController::class, 'cart'])->name('add-cart')->middleware('auth');
Route::delete('cart/{id}', [CartController::class, 'destroy'])->name('destroy-cart');

Route::get('register', [RegisterController::class, 'index'])->name('register')->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->name('register.store');

Route::get('login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('login', [LoginController::class, 'authenticate'])->name('authenticate');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

Route::get('dashboard/products/{id}/gallery', [DashboardProductController::class, 'gallery'])->name('products-gallery')->middleware('auth');

Route::resource('dashboard/products', DashboardProductController::class)->middleware('auth');

Route::resource('dashboard/galleries', DashboardGalleryController::class)->middleware('auth');

Route::get('dashboard/transaction/{id}/setstatus', [DashboardTransactionController::class, 'setStatus'])->name('transaction.status');
Route::resource('dashboard/transaction', DashboardTransactionController::class)->middleware('admin');

Route::resource('dashboard/category', DashboardCategoryController::class)->middleware('admin');
