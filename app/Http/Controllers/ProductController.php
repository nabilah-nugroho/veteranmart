<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json([
            'message' => 'Products retrieved successfully',
            'data' => Product::with(['seller', 'category'])->latest()->get(),
        ]);
    }

    public function store(ProductRequest $request): JsonResponse
    {
        $data = $request->safe()->except(['image']);

        $product = Product::create([
            ...$data,
            'seller_id' => $request->user()->id,
            'slug' => Str::slug($data['title']) . '-' . Str::lower(Str::random(6)),
        ]);

        return response()->json([
            'message' => 'Product created successfully',
            'data' => $product->load(['seller', 'category']),
        ], 201);
    }

    public function show(Product $product): JsonResponse
    {
        return response()->json([
            'message' => 'Product retrieved successfully',
            'data' => $product->load(['seller', 'category']),
        ]);
    }

    public function update(ProductRequest $request, Product $product): JsonResponse
    {
        abort_unless($product->seller_id === $request->user()->id, 403);

        $data = $request->safe()->except(['image']);
        if (isset($data['title'])) {
            $data['slug'] = Str::slug($data['title']) . '-' . Str::lower(Str::random(6));
        }

        $product->update($data);

        return response()->json([
            'message' => 'Product updated successfully',
            'data' => $product->fresh()->load(['seller', 'category']),
        ]);
    }

    public function destroy(Product $product): JsonResponse
    {
        abort_unless($product->seller_id === request()->user()->id, 403);

        $product->delete();

        return response()->json([
            'message' => 'Product deleted successfully',
        ]);
    }
}
