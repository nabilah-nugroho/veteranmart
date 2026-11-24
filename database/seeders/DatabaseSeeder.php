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
        User::firstOrCreate(
            ['email' => 'admin@upnvj.ac.id'],
            [
                'name' => 'Admin VeteranMart',
                'password' => bcrypt('password'),
                'role' => 'admin',
            ]
        );

        User::firstOrCreate(
            ['email' => 'mahasiswa@upnvj.ac.id'],
            [
                'name' => 'Mahasiswa Demo',
                'password' => bcrypt('password'),
                'role' => 'mahasiswa',
            ]
        );

        $this->call([
            CategorySeeder::class,
        ]);
    }
}