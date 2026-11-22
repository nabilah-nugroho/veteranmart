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
            'name' => 'Ahmad Fauzan',
            'email' => 'ahmad.fauzan@upnvj.ac.id',
            'password' => 'password',
        ]);

        User::factory()->create([
            'name' => 'Siti Rahma',
            'email' => 'siti.rahma@upnvj.ac.id',
            'password' => 'password',
        ]);
    }
}
