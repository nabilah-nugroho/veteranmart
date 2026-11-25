<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProductRequest extends FormRequest
{
    /**
     * Tentukan apakah user berwenang membuat request ini.
     */
    public function authorize(): bool
    {
        return auth()->check(); // Pastikan user sudah login
    }

    /**
     * Aturan validasi sesuai ketentuan scope of work.
     */
    public function rules(): array
    {
        return [
            'title'       => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'price'       => ['required', 'numeric', 'gt:0'],
            'stock'       => ['required', 'integer', 'min:0'],
            'category_id' => ['required', 'exists:categories,id'],
            'image'       => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ];
    }

    /**
     * Kustomisasi pesan error dalam Bahasa Indonesia.
     */
    public function messages(): array
    {
        return [
            'title.required'       => 'Judul produk wajib diisi.',
            'title.string'         => 'Judul produk harus berupa teks.',
            'title.max'            => 'Judul produk maksimal 255 karakter.',
            'price.required'       => 'Harga produk wajib diisi.',
            'price.numeric'        => 'Harga produk harus berupa angka.',
            'price.gt'             => 'Harga produk harus lebih dari 0.',
            'stock.required'       => 'Stok produk wajib diisi.',
            'stock.integer'        => 'Stok produk harus berupa angka bulat.',
            'stock.min'            => 'Stok tidak boleh kurang dari 0.',
            'category_id.required' => 'Kategori produk wajib dipilih.',
            'category_id.exists'   => 'Kategori produk tidak valid.',
            'image.image'          => 'File harus berupa gambar.',
            'image.mimes'          => 'Format gambar harus JPG, JPEG, PNG, atau WEBP.',
            'image.max'            => 'Ukuran gambar maksimal 2 MB.',
        ];
    }

    /**
     * Menangani kegagalan validasi agar merespons dalam format JSON 
     * sesuai Acceptance Criteria.
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Validasi gagal',
            'errors'  => $validator->errors()
        ], 422));
    }
}
