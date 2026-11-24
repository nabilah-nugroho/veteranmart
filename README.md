# VeteranMart

Marketplace untuk mahasiswa UPNVJ. Email login wajib berdomain `@upnvj.ac.id`. Mahasiswa dapat membeli sekaligus menjual produk.

## Menjalankan proyek

1. Nyalakan **Apache** dan **MySQL** di XAMPP.
2. Buat database kosong `db_veteranmart` di phpMyAdmin.
3. Jalankan:

```bash
composer install
npm install
copy .env.example .env
php artisan key:generate
php artisan migrate --seed
npm run build
php artisan serve
```

## pull req template
~~~bash
## Description
Apa yang dikerjakan?

## Related Issue
Closes #1

## Changes
- [ ] Implementasi fitur
- [ ] Testing
- [ ] Dokumentasi

## Checklist
- [ ] Tidak ada error
- [ ] Sudah dites
- [ ] Siap direview

~~~

Buka http://127.0.0.1:8000/login.

## Akun dummy

| Role | Email | Password |
|---|---|---|
| Admin | `admin@upnvj.ac.id` | `password` |
| Mahasiswa | `mahasiswa@upnvj.ac.id` | `password` |

## Deploy

Atur `APP_KEY`, `APP_URL`, `APP_ENV=production`, `APP_DEBUG=false`, dan kredensial database dari hosting. Pastikan document root mengarah ke folder `public`, lalu build asset dengan `npm ci` dan `npm run build`. Jalankan migrasi sekaligus seed akun demo saat release pertama:

```bash
php artisan migrate --force --seed
```

Seeder aman dijalankan ulang dan akan mengatur ulang password akun demo menjadi `password`. Jangan gunakan akun demo ini sebagai akun admin untuk lingkungan produksi berisi data nyata.

## File penting

- `app/Http/Controllers/AuthController.php` — login dan logout.
- `resources/views/auth/login.blade.php` — halaman login.
- `database/seeders/DatabaseSeeder.php` — akun dummy.
- `database/migrations/*add_role_to_users_table.php` — role admin/mahasiswa.
- `routes/web.php` — route aplikasi.

## Reset database

```bash
php artisan migrate:fresh --seed
```

> Jangan commit `.env`; gunakan `.env.example` sebagai template.
