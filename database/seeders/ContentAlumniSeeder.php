<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContentAlumniSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $alumniData = [
            [
                'title' => 'Raditya Mahatma',
                'body' => 'Berawal dari jurusan TKJ di SMK PGRI 3 Malang, kini saya melanjutkan kuliah dengan bekal ilmu dan disiplin yang luar biasa dari sekolah ini.',
                'credit' => NULL,
                'folder' => 'alumni',
                'image' => '["1760641284_Radit.jpg"]',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Aditia Tantra Permana',
                'body' => 'Selama belajar di jurusan TKR SMK PGRI 3, saya mendapatkan banyak ilmu dan pengalaman praktik yang sangat berguna — berkat itu, sekarang saya bisa bekerja dan menerapkan semua yang telah saya pelajari di dunia industri.',
                'credit' => NULL,
                'folder' => 'alumni',
                'image' => '["1760641642_Aditia.png"]',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Khoko Rama Viera',
                'body' => 'Belajar di jurusan Teknik Pemesinan SMK SKARIGA memberi saya pengalaman luar biasa dari mengenal mesin hingga praktik langsung di bengkel, semua itu menjadi bekal berharga yang mengantarkan saya ke dunia kerja.',
                'credit' => NULL,
                'folder' => 'alumni',
                'image' => '["1760641749_Khoko.png"]',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('contents')->insert($alumniData);
    }
}