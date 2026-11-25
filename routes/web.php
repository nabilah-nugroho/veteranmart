<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', fn () => view('auth.login'));
Route::get('/login', [AuthController::class, 'create'])->name('login');
Route::post('/login', [AuthController::class, 'store'])->name('login.store');
Route::post('/logout', [AuthController::class, 'destroy'])->middleware('auth')->name('logout');

Route::view('/dashboard', 'dashboard')->middleware('auth')->name('dashboard');
Route::view('/produk', 'products.index')->name('products.index'); //untuk katalog

require __DIR__.'/favorites.php';