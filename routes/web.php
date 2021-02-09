<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CartItemController;
use App\Http\Controllers\ProductCartController;
use App\Http\Controllers\StoreController;
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
    return view('welcome');
});



Route::middleware('auth')->group(function() {
    Route::get('/dashboard', [StoreController::class, 'index'])->name('dashboard');
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::post('/api/cart', [ProductCartController::class, 'store']);
    Route::post('/api/cart/checkout', [CartController::class, 'checkout']);
    Route::delete('/api/cart_items/{id}', [CartItemController::class, 'destroy']);
});

require __DIR__.'/auth.php';

Route::get('/{any?}', App\Http\Controllers\PagesController::class);
