<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(): JsonResponse
    {
        $products = Product::with(['seller', 'category', 'images'])
            ->latest()
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'Products retrieved successfully',
            'data' => $products,
        ], 200);
    }

    public function store(ProductRequest $request): JsonResponse
    {
        $data = $request->safe()->except(['image', 'images']);

        $product = DB::transaction(function () use ($request, $data) {
        $product = Product::create([
            ...$data,
            'seller_id' => $request->user()->id,
            'slug' => Str::slug($data['title']) . '-' . Str::lower(Str::random(6)),
        ]);

        $this->handleImageUploads($request, $product);

            return $product;
        });

        return response()->json([
            'success' => true,
            'message' => 'Product created successfully',
            'data' => $product->load(['seller', 'category', 'images']),
        ], 201);
    }

    public function show(Product $product): JsonResponse
    {
        $product = Product::with(['seller', 'category', 'images'])->find($id);

        if (! $product) {
            return response()->json([
                'success' => false,
                'message' => 'Product not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Product retrieved successfully',
            'data' => $product,
        ], 200);
    }

  public function update(ProductRequest $request, string $id): JsonResponse
    {
        $product = Product::with('images')->find($id);

        if (! $product) {
            return response()->json([
                'success' => false,
                'message' => 'Product not found',
            ], 404);
        }

        if ($product->seller_id !== $request->user()->id) {
            return response()->json([
                'success' => false,
                'message' => 'Forbidden: You are not allowed to update this product',
            ], 403);
        }

        $data = $request->safe()->except(['image', 'images']);
        if (isset($data['title'])) {
            $data['slug'] = Str::slug($data['title']) . '-' . Str::lower(Str::random(6));
        }

        DB::transaction(function () use ($request, $product, $data) {
            $product->update($data);
            $this->handleImageUploads($request, $product);
        });

        return response()->json([
            'success' => true,
            'message' => 'Product updated successfully',
            'data' => $product->fresh()->load(['seller', 'category', 'images']),
        ], 200);
    }

    public function destroy(Request $request, string $id): JsonResponse
    {
        $product = Product::with('images')->find($id);

        if (! $product) {
            return response()->json([
                'success' => false,
                'message' => 'Product not found',
            ], 404);
        }

        if ($product->seller_id !== $request->user()->id) {
            return response()->json([
                'success' => false,
                'message' => 'Forbidden: You are not allowed to delete this product',
            ], 403);
        }

        foreach ($product->images as $image) {
            Storage::disk('public')->delete($image->path);
        }

        $product->delete();

        return response()->json([
            'success' => true,
            'message' => 'Product deleted successfully',
        ], 200);
    }

    private function handleImageUploads(Request $request, Product $product): void
    {
        $files = [];

        if ($request->hasFile('images')) {
            $files = $request->file('images');
        } elseif ($request->hasFile('image')) {
            $files = [$request->file('image')];
        }

        if (empty($files)) {
            return;
        }

        $hasPrimary = $product->images()->where('is_primary', true)->exists();

        foreach ($files as $index => $file) {
            $path = $file->store('products', 'public');

            $product->images()->create([
                'path' => $path,
                'is_primary' => ! $hasPrimary && $index === 0,
            ]);
        }
    }
}