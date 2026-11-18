# Veteranmart

Proyek akhir Pemrograman Web - S1 Sains Data UPNVJ (Kelompok 1)
Platform digital berbasis web sebagai wadah jual-beli antar mahasiswa dan civitas aktif Universitas Pembangunan Nasional "Veteran" Jakarta (UPNVJ)

## Kebutuhan
- PHP 8.3 atau lebih baru
- Composer
- Node.js & NPM (untuk aset frontend/Laravel Breeze)
- MySQL (XAMPP)

## Cara menjalankan dari nol
1. `git clone https://github.com/USERNAME/upnvj-marketplace.git`
2. `cd upnvj-marketplace`
3. `composer install`
4. `npm install && npm run build`
5. `cp .env.example .env`   (Windows: `copy .env.example .env`)
6. Buat basis data kosong bernama `db_upnvj_marketplace` di phpMyAdmin
7. Sesuaikan `DB_DATABASE` pada berkas `.env`
8. `php artisan key:generate`
9. `php artisan migrate --seed`
10. `php artisan storage:link` (untuk menampilkan foto profil dan gambar produk)
11. `php artisan serve` lalu buka http://127.0.0.1:8000

## Pembagian tugas
| Nama | NIM | Bagian yang dikerjakan |
|---|---|---|
| Bersama | - | UX Research & Design|
| Nabilah Nur Aisyah Nugroho | 2510514020 | Authentication & User Profile (registrasi, login, pengelolaan profil)|
| Nazla Aliza Pasya | 2510514002 | Product Management (tambah, edit, hapus, pengelolaan informasi produk)|
| Jelli Wanti Eriska Pardosi | 2510514010 | Product Discovery (katalog produk, pencarian, filter, sorting, detail produk)|
| Muhammad Diyar | 2510514032 | Transaction Management (pemesanan produk, konfirmasi pesanan, riwayat transaksi)|
| Ananda Darryl | 2510514028 | User Interaction (wishlist, rating, review, komunikasi pembeli & penjual)|
| Raissa Ariya Antya | 2510514011 | Admin Management (pengelolaan pengguna, moderasi produk, pengawasan aktivitas)|


raissa nabilah nazla jelli <3