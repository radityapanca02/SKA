<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // === Jalankan semua seeder konten ===
        $this->call([
            UserSeeder::class,
            BeritaSeeder::class,
            PrestasiSeeder::class,
            KegiatanSeeder::class,
            ContentAlumniSeeder::class,
            PendaftaranSeeder::class,
            EkstrakurikulerSeeder::class,
        ]);
    }
}
