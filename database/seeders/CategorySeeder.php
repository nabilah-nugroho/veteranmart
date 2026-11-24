<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Makanan & Minuman',
            'Fashion',
            'Elektronik',
            'Buku & Alat Tulis',
            'Kesehatan & Kecantikan',
            'Aksesoris',
            'Jasa',
            'Lainnya',
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate([
                'name' => $category,
            ]);
        }
    }
}