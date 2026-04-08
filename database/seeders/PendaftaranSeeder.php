<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PendaftaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        $ssbContents = [
            [
                'id' => 50,
                'title' => 'Pendaftaran jalur Makmur 2025 telah dibuka!',
                'body' => 'Segera daftarkan dirimu melalui Jalur Makmur 2025! Program ini memberikan kesempatan bagi calon peserta didik berprestasi untuk bergabung dan berkembang bersama dalam lingkungan pendidikan unggulan. Jangan lewatkan kesempatan emas ini!',
                'credit' => NULL,
                'folder' => 'ssb',
                'image' => '["1760672589_1760449242_1760086288.png"]',
                'created_at' => '2025-10-16 20:42:44',
                'updated_at' => '2025-10-16 20:43:09',
            ],
        ];

        foreach ($ssbContents as $content) {
            DB::table('contents')->insert($content);
        }
    }
}