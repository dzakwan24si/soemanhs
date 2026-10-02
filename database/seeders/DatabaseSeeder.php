<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Setting;
use App\Models\Page;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $adminEmail = env('ADMIN_EMAIL', 'admin@soemanhs.sch.id');
        $adminPassword = env('ADMIN_PASSWORD', 'GANTI-INI-SEBELUM-DEPLOY');
        $operatorEmail = env('OPERATOR_EMAIL', 'operator@soemanhs.sch.id');
        $operatorPassword = env('OPERATOR_PASSWORD', 'GANTI-INI-SEBELUM-DEPLOY');

        if (app()->environment('production')) {
            if (empty($adminPassword) || strlen($adminPassword) < 12 || $adminPassword === 'GANTI-INI-SEBELUM-DEPLOY') {
                throw new \Exception('KEAMANAN: Sandi admin tidak memenuhi syarat produksi (minimal 12 karakter dan tidak boleh nilai default).');
            }
            if (empty($operatorPassword) || strlen($operatorPassword) < 12 || $operatorPassword === 'GANTI-INI-SEBELUM-DEPLOY') {
                throw new \Exception('KEAMANAN: Sandi operator tidak memenuhi syarat produksi (minimal 12 karakter dan tidak boleh nilai default).');
            }
        }
        
        // 1. Admin Awal dari .env
        User::firstOrCreate(
            ['email' => $adminEmail],
            [
                'name' => 'Administrator',
                'password' => Hash::make($adminPassword),
                'role' => 'admin',
                'email_verified_at' => now(),
            ]
        );

        // Operator
        User::firstOrCreate(
            ['email' => $operatorEmail],
            [
                'name' => 'Operator Konten',
                'password' => Hash::make($operatorPassword),
                'role' => 'operator',
                'email_verified_at' => now(),
            ]
        );

        // 2. Kategori Contoh
        $categories = ['Akademik', 'Kesiswaan', 'Prestasi', 'Umum'];
        foreach ($categories as $cat) {
            Category::firstOrCreate(
                ['slug' => Str::slug($cat)],
                ['name' => $cat, 'description' => 'Kategori ' . $cat]
            );
        }

        // 3. Settings Placeholder
        $settings = [
            'site_name' => 'SMA IT Soeman HS',
            'site_description' => 'Sekolah Menengah Atas Islam Terpadu Soeman HS Pekanbaru',
            'contact_email' => 'info@soemanhs.sch.id',
            'contact_phone' => '+628111222333',
            'contact_address' => 'Jl. Soeman HS No. 1, Pekanbaru, Riau',
            'social_facebook' => '#',
            'social_instagram' => '#',
            'social_youtube' => '#',
            'hero_title' => 'Cerdas, Berkarakter, Islami',
            'hero_subtitle' => 'Mewujudkan generasi emas yang berakhlak mulia dan berprestasi.',
            'ppdb_status' => 'buka',
            'ppdb_link' => 'https://ppdb.soemanhs.sch.id',
        ];

        foreach ($settings as $key => $value) {
            Setting::firstOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        // 4. Halaman Statis Placeholder
        $pages = [
            'Profil Sekolah' => 'Ini adalah konten halaman profil sekolah SMA IT Soeman HS.',
            'Visi Misi' => 'Ini adalah visi dan misi SMA IT Soeman HS.',
            'Fasilitas' => 'Berikut adalah fasilitas yang kami tawarkan di SMA IT Soeman HS.',
        ];

        foreach ($pages as $title => $content) {
            Page::firstOrCreate(
                ['slug' => Str::slug($title)],
                ['title' => $title, 'content' => $content]
            );
        }

    }
}
