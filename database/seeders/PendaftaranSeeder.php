<?php
namespace Database\Seeders;

use App\Models\Pendaftaran;
use Illuminate\Database\Seeder;

class PendaftaranSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['tahun' => 2021, 'jumlah_pendaftar' => 200, 'jumlah_diterima' => 150],
            ['tahun' => 2022, 'jumlah_pendaftar' => 350, 'jumlah_diterima' => 300],
            ['tahun' => 2023, 'jumlah_pendaftar' => 400, 'jumlah_diterima' => 320],
            ['tahun' => 2024, 'jumlah_pendaftar' => 500, 'jumlah_diterima' => 450],
            ['tahun' => 2025, 'jumlah_pendaftar' => 620, 'jumlah_diterima' => 560],
        ];

        foreach ($data as $item) {
            Pendaftaran::create($item);
        }
    }
}
