<?php

namespace Database\Seeders;

use App\Models\MeetingPoint;
use Illuminate\Database\Seeder;

class MeetingPointSeeder extends Seeder
{
    /*
     * Run the database seeds.
     */
    public function run(): void
    {
        //daftar titik temu awal (nama contoh)
        $points =[
            ['name' => 'Pintu Belakang UPN', 'description' => 'Di dekat Post Satpam', 'is_active' => true],
            ['name' => 'Perpustakaan', 'description' => 'Di depan perpustakaan', 'is_active' => true],
            ['name' => 'Kantin', 'description' => 'Area kantin kampus', 'is_active' => true],
            ['name' => 'Selasar  Fakultas', 'description' => 'Selasar FIK', 'is_active' => true],
            ['name' => 'Pintu Depan  UPN', 'description' => 'area gerbang depan upn', 'is_active' => true],
        ];  

        foreach ($points as $point) {
            MeetingPoint::updateOrCreate(['name' => $point['name']], $point);
        }
    }
}
