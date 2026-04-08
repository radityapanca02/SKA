<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class KegiatanSeeder extends Seeder
{
    /**
     * Jalankan seeder untuk data kegiatan (folder = kegiatan)
     */
    public function run(): void
    {
        $now = Carbon::now();

        DB::table('contents')->insert([
            [
                'title' => 'Upacara memperingati hari pendidikan nasional',
                'body' => '-2 Agustus 2025',
                'credit' => null,
                'folder' => 'kegiatan',
                'image' => '1760634239_Kegiatan2.png',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Event tahunan 5kariga LebaRun',
                'body' => '-14 Juni 2025',
                'credit' => null,
                'folder' => 'kegiatan',
                'image' => '1760634338_Kegiatan3.png',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Acara Halal Bihalal Skariga',
                'body' => '-2 Mei 2025',
                'credit' => null,
                'folder' => 'kegiatan',
                'image' => '1760634375_Kegiatan4.png',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Pembekalan softskill persiapan prakerin',
                'body' => '-2 November 2025',
                'credit' => null,
                'folder' => 'kegiatan',
                'image' => '1760634407_Kegiatan5.png',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Acara maulid Nabi Muhammad SAW',
                'body' => '-2 Mei 2025',
                'credit' => null,
                'folder' => 'kegiatan',
                'image' => '1760634518_Kegiatan6.png',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Memperingati Isra mi\'raj Nabi Muhammad SAW',
                'body' => '-28 November 2025',
                'credit' => null,
                'folder' => 'kegiatan',
                'image' => '1760634753_Kegiatan1.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Gebyar Kemerdekaan Skariga',
                'body' => '-20 Agustus 2025',
                'credit' => null,
                'folder' => 'kegiatan',
                'image' => '1760635076_Kegiatan7.png',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Pendidikan Penguatan dan Budi Pekerti',
                'body' => '-18 Oktober 2025',
                'credit' => 'admin',
                'folder' => 'kegiatan',
                'image' => '1760635210_Kegiatan8.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Lomba Mural Agustusan',
                'body' => '-25 Agustus 2025',
                'credit' => null,
                'folder' => 'kegiatan',
                'image' => '1760637577_Kegiatan8.png',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Boombastic SKARIGA',
                'body' => '-28 Agustus 2025',
                'credit' => null,
                'folder' => 'kegiatan',
                'image' => '1760637627_Kegiatan9.png',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Kegiatan acara demonstrasi ekstrakurikuler',
                'body' => '-30 Agustus 2025',
                'credit' => null,
                'folder' => 'kegiatan',
                'image' => '1760637683_Kegiatan1.png',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
