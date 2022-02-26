<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductController;
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

/* ---------- Start of PagesController ---------- */
Route::get('/', [PagesController::class, 'index'])->name('home');
/* ---------- End of PagesController ---------- */

/* ---------- Start of ProductController ---------- */
Route::get('/shop', [ProductController::class, 'index'])->name('shop');
Route::get('/shop/{shop}', [ProductController::class, 'show'])->name('product');
/* ---------- End of ProductController ---------- */

/* ---------- Start of CartController ---------- */
Route::get('/cart', [CartController::class, 'index'])->name('cart');
/* ---------- End of CartController ---------- */
