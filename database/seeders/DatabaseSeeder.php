<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@upnvj.ac.id'],
            [
                'name' => 'Admin VeteranMart',
                'password' => 'password',
                'role' => 'admin',
            ],
        );

        User::updateOrCreate(
            ['email' => 'mahasiswa@upnvj.ac.id'],
            [
                'name' => 'Mahasiswa Demo',
                'password' => 'password',
                'role' => 'mahasiswa',
            ],
        );

        $this->call([
            CategorySeeder::class,
            ProductSeeder::class,
        ]);
    }
}
