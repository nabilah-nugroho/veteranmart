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

Buka http://127.0.0.1:8000/login.

## Akun dummy

| Role | Email | Password |
|---|---|---|
| Admin | `admin@upnvj.ac.id` | `password` |
| Mahasiswa | `mahasiswa@upnvj.ac.id` | `password` |

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
