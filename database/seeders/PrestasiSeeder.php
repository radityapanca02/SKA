<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Prestasi;

class PrestasiSeeder extends Seeder
{
    public function run()
    {
        $prestasis = [
            [
                'nama' => 'Syahril Faisal Ramadani',
                'subjudul' => 'Juara 1 LKS DikMen Jatim 33 - Industrial Control',
                'gambar' => null
            ],
            [
                'nama' => 'Yohan Aldi Pratama',
                'subjudul' => 'Juara 1 LKS Jatim 32 - Electronics',
                'gambar' => null
            ],
            [
                'nama' => 'Azriel & Celvin',
                'subjudul' => 'Juara 1 LKS Jatim 32 - Robot Manufacturing System',
                'gambar' => null
            ],
            [
                'nama' => 'Arif Kurniawan',
                'subjudul' => 'Juara 2 LKS Jatim 32 - Web Technology',
                'gambar' => null
            ],
            [
                'nama' => 'Tegar Reyhan',
                'subjudul' => 'Juara 1 LKS Jatim 32 - Car Painting',
                'gambar' => null
            ],
            [
                'nama' => 'Kayana Indrasta',
                'subjudul' => 'Juara 1 Lomba Sistem Informasi Festival 2024 - UI/UX Desain',
                'gambar' => null
            ],
            [
                'nama' => 'Edsel Param Mustapa',
                'subjudul' => 'Juara 1 LKS Jatim 32 - IT Software Solution',
                'gambar' => null
            ],
            [
                'nama' => 'Iza Aska',
                'subjudul' => 'Juara 1 LKS Jatim 32 - Prototype Modeling',
                'gambar' => null
            ],
            [
                'nama' => 'Ayu Dewi',
                'subjudul' => 'Juara 3 LKS Jatim 32 - Marketing Online',
                'gambar' => null
            ],
            [
                'nama' => 'Rafif & Novaldi',
                'subjudul' => 'Juara 1 LKS DikMen Jatim 33 - Robot Manufacturing System',
                'gambar' => null
            ],
        ];

        foreach ($prestasis as $prestasi) {
            Prestasi::create($prestasi);
        }
    }
}
