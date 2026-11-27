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
        User::factory()->create([
            'name' => 'Admin VeteranMart',
            'email' => 'admin@upnvj.ac.id',
            'password' => 'password',
            'role' => 'admin',
        ]);

        User::factory()->create([
            'name' => 'Mahasiswa Demo',
            'email' => 'mahasiswa@upnvj.ac.id',
            'password' => 'password',
            'role' => 'mahasiswa',
        ]);
        //data awal titik temu
        $this->call(MeetingPointSeeder::class);
    }
}
