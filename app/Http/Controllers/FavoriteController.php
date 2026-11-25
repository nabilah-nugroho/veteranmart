<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    /**
     * Menampilkan daftar produk favorit milik user yang sedang login.
     */
    public function index(Request $request): JsonResponse
    {
        $favorites = $request->user()->favorites()->get();

        return response()->json([
            'message' => 'Favorites retrieved successfully',
            'data' => $favorites,
        ]);
    }

    /**
     * Menambahkan produk ke daftar favorit user (mencegah duplikasi).
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        $user = $request->user();
        $productId = $request->product_id;

        // Cek apakah produk sudah ada di favorit user
        if ($user->favorites()->where('product_id', $productId)->exists()) {
            return response()->json([
                'message' => 'Product is already in favorites',
            ], 409);
        }

        $user->favorites()->attach($productId);

        return response()->json([
            'message' => 'Product added to favorites successfully',
        ], 201);
    }

    /**
     * Menghapus produk dari daftar favorit user.
     */
    public function destroy(Request $request, $productId): JsonResponse
    {
        $user = $request->user();

        $detached = $user->favorites()->detach($productId);

        if (!$detached) {
            return response()->json([
                'message' => 'Product not found in favorites',
            ], 404);
        }

        return response()->json([
            'message' => 'Product removed from favorites successfully',
        ]);
    }
}