<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $seller = User::where('role', 'mahasiswa')->first() ?? User::first();
        $categories = Category::query()->pluck('id')->values();

        if (! $seller || $categories->isEmpty()) {
            $this->command?->warn('ProductSeeder dilewati: user atau kategori belum tersedia.');

            return;
        }

        $products = [
            'Jaket almamater UPN Veteran Jakarta',
            'Buku Pengantar Ekonomi',
            'Laptop ASUS VivoBook',
            'Kemeja putih mahasiswa',
            'Kalkulator scientific Casio',
            'Tas ransel kuliah',
            'Headset Bluetooth',
            'Keyboard mechanical',
            'Mouse wireless',
            'Power bank 10000 mAh',
            'Buku catatan A5',
            'Pulpen gel hitam satu set',
            'Flashdisk 64GB',
            'Monitor LED 22 inch',
            'Webcam USB',
            'Sepatu sneakers casual',
            'Hoodie hitam polos',
            'Celana jeans biru',
            'Kamera digital bekas',
            'Tripod kamera mini',
            'Lampu meja belajar',
            'Kipas USB portable',
            'Botol minum stainless',
            'Kotak makan portable',
            'Buku pemrograman Laravel',
            'Buku desain UI/UX',
            'Stabilo warna-warni',
            'Map folder kuliah',
            'Printer inkjet bekas',
            'Kabel data type C',
            'Charger laptop universal',
            'Smartwatch',
            'Earphone kabel',
            'Rak buku minimalis',
            'Kursi belajar',
            'Meja laptop lipat',
            'Jasa desain poster',
            'Jasa edit video',
            'Jasa pembuatan presentasi',
            'Jasa fotografi acara',
        ];

        foreach ($products as $index => $title) {
            $slug = Str::slug($title) . '-' . ($index + 1);

            Product::updateOrCreate(
                ['slug' => $slug],
                [
                    'seller_id' => $seller->id,
                    'category_id' => $categories[$index % $categories->count()],
                    'title' => $title,
                    'description' => 'Produk contoh VeteranMart untuk kebutuhan mahasiswa.',
                    'price' => ( ($index + 2) * 25000 ),
                    'stock' => ($index % 5) + 1,
                    'condition' => $index % 3 === 0 ? 'baru' : 'bekas',
                    'status' => $index % 10 === 0 ? 'terjual' : 'aktif',
                ],
            );
        }
    }
}
