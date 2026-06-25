<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\HistoryController;

Route::get('/', [AuthController::class, 'showLoginForm'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

Route::middleware('auth')->group(function () {

    // Produk
    Route::resource('products', ProductController::class);

    Route::get('/products-pdf', [ProductController::class, 'generatePDF'])
        ->name('products.pdf');

    // Transaksi
    Route::get('/transactions', [TransactionController::class, 'index'])
        ->name('transactions.index');

    Route::post('/transactions', [TransactionController::class, 'store'])
        ->name('transactions.store');

    Route::get('/history', [HistoryController::class, 'index'])
        ->name('history.index');
});