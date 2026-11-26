<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MeetingPointController;
use App\Http\Middleware\AdminMiddleware;

Route::get('/', fn () => view('auth.login'));
Route::get('/login', [AuthController::class, 'create'])->name('login');
Route::post('/login', [AuthController::class, 'store'])->name('login.store');
Route::post('/logout', [AuthController::class, 'destroy'])->middleware('auth')->name('logout');

Route::view('/dashboard', 'dashboard')->middleware('auth')->name('dashboard');

// Pengelolaan titik temu: untuk admin yang udah login
Route::middleware(['auth', AdminMiddleware::class])
    ->prefix('admin')
    ->group(function () {
        Route::resource('meeting-points', MeetingPointController::class)->except(['show']);
    });
