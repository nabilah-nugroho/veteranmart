<?php

use App\Http\Controllers\FavoriteController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/api/favorites', [FavoriteController::class, 'index']);
    Route::post('/api/favorites', [FavoriteController::class, 'store']);
    Route::delete('/api/favorites/{productId}', [FavoriteController::class, 'destroy']);
});