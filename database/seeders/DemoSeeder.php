<?php

namespace Database\Seeders;

use App\Models\Extracurricular;
use App\Models\Facility;
use App\Models\Achievement;
use App\Models\Staff;
use Illuminate\Database\Seeder;

class DemoSeeder extends Seeder
{
    public function run(): void
    {
        Extracurricular::firstOrCreate(
            ['slug' => 'pramuka'],
            ['name' => '[CONTOH] Pramuka', 'description' => 'Kegiatan kepramukaan rutin.']
        );

        Facility::firstOrCreate(
            ['slug' => 'laboratorium-komputer'],
            ['name' => '[CONTOH] Laboratorium Komputer', 'description' => 'Lab dengan 40 PC.', 'sort_order' => 1]
        );

        Achievement::firstOrCreate(
            ['title' => '[CONTOH] Juara 1 Olimpiade Matematika'],
            ['description' => 'Tingkat provinsi Riau.', 'date' => '2026-05-10', 'level' => 'Provinsi']
        );

        Staff::firstOrCreate(
            ['name' => '[CONTOH] Ahmad Fulan, M.Pd'],
            ['position' => 'Kepala Sekolah', 'sort_order' => 1]
        );
    }
}
