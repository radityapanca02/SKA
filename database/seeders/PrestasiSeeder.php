<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrestasiSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'title' => 'Juara 1 LKS Jatim Bidlom Electronics',
                'body' => 'Salah satu kebanggaan SMK PGRI 3 Malang! Yohan berhasil meraih Juara 1 LKS Jawa Timur ke-32 pada Bidang Lomba Electronics.
Prestasinya menjadi bukti bahwa ketekunan dan kerja keras mampu menghasilkan pencapaian gemilang di tingkat provinsi.',
                'credit' => 'Yohan Aldi Pratama',
                'folder' => 'prestasi',
                'image' => json_encode(['1760638262_Prestasi3.jpg']),
                'created_at' => '2025-10-16 11:11:02',
                'updated_at' => '2025-10-16 11:13:58'
            ],
            [
                'title' => 'Juara 2 LKS Jatim Bidlom Web Technology',
                'body' => 'Arif menunjukkan kemampuan terbaiknya dalam dunia pemrograman web dan sukses meraih Juara 2 LKS Jawa Timur ke-32 di Bidang Lomba Web Technology.
Dedikasi dan kerja kerasnya menjadi inspirasi bagi generasi berikutnya.',
                'credit' => 'Arif Kurniawan',
                'folder' => 'prestasi',
                'image' => json_encode(['1760638414_Prestasi4.jpg']),
                'created_at' => '2025-10-16 11:13:34',
                'updated_at' => '2025-10-16 11:14:08'
            ],
            [
                'title' => 'Juara 1 LKS Jatim Bidlom Prototype Modeling',
                'body' => 'Dengan kemampuan luar biasa di bidang teknologi, Iza berhasil meraih Juara 1 LKS Jawa Timur ke-32 dalam Bidang Lomba Prototype Modeling.
Prestasi ini menjadi motivasi besar bagi teman-teman lainnya untuk terus berinovasi.',
                'credit' => 'Iza Aska Risnanda',
                'folder' => 'prestasi',
                'image' => json_encode(['1760638572_Prestasi2.jpg']),
                'created_at' => '2025-10-16 11:16:12',
                'updated_at' => '2025-10-16 11:16:55'
            ],
            [
                'title' => 'Juara 1 LKS Jatim Bidlom Robot Manufacturing System',
                'body' => 'Dua siswa luar biasa ini berhasil meraih Juara 1 LKS Jawa Timur ke-32 pada Bidang Lomba Robot Manufacturing System.
Kerja sama dan kemampuan teknis yang solid menjadikan mereka tim yang hebat dan membanggakan sekolah.',
                'credit' => 'Moch. Abu Azriel Syamsudin & Celvin Aditya Putra Nugraha',
                'folder' => 'prestasi',
                'image' => json_encode(['1760638704_Prestasi5.jpg']),
                'created_at' => '2025-10-16 11:18:24',
                'updated_at' => '2025-10-16 11:20:18'
            ],
            [
                'title' => 'Juara 1 LKS Jatim Bidlom IT Software For Business Solution',
                'body' => 'Siswa berprestasi yang berhasil membawa pulang Juara 1 LKS Jawa Timur ke-32 di Bidang Lomba IT Software For Business Solution.
Tidak berhenti di situ, Edsel juga menorehkan prestasi internasional sebagai Peraih Medali Emas di ASEAN WorldSkills 2025 di Manila, Filipina.
Luar biasa!',
                'credit' => 'Edsel Parama Mustapa',
                'folder' => 'prestasi',
                'image' => json_encode(['1760638974_Prestasi1.jpg']),
                'created_at' => '2025-10-16 11:22:54',
                'updated_at' => '2025-10-16 11:23:32'
            ],
            [
                'title' => 'Juara 1 LKS Nasional Bidlom Robot Manufacturing System',
                'body' => 'Dua siswa berbakat dari SMK PGRI 3 Malang yang kembali mengharumkan nama sekolah di tingkat nasional!
Rafif dan Novaldi berhasil meraih Juara 1 LKS Nasional 2025 dalam Bidang Lomba Robot Manufacturing System.
Prestasi ini menjadi bukti bahwa kerja sama tim, inovasi, dan dedikasi tinggi mampu membawa hasil luar biasa di dunia teknologi robotika.',
                'credit' => 'Rafif Miftah Aryasatya Bifatoni & Novaldi Candra Putra Budikusuma',
                'folder' => 'prestasi',
                'image' => json_encode(['1760639658_Prestasi11.png']),
                'created_at' => '2025-10-16 11:34:18',
                'updated_at' => '2025-10-16 11:34:34'
            ],
            [
                'title' => 'Juara 2 LKS Nasional Bidlom Industrial Control',
                'body' => 'Kebanggaan SMK PGRI 3 Malang!
Syahril berhasil meraih Juara 2 LKS Nasional 2025 di Bidang Lomba Industrial Control.
Ketekunan dan kemampuannya dalam sistem kendali industri menjadi inspirasi bagi seluruh siswa untuk terus berprestasi dan berinovasi di era industri modern.',
                'credit' => 'Syahril Faisal Ramadani',
                'folder' => 'prestasi',
                'image' => json_encode(['1760639829_Prestasi12.png']),
                'created_at' => '2025-10-16 11:37:09',
                'updated_at' => '2025-10-16 11:37:43'
            ],
            [
                'title' => 'Juara 1 & 2 Asean World Skills',
                'body' => 'Kebanggaan Indonesia di kancah internasional!
Mereka berhasil menjadi Peraih Medali Emas dan Perunggu dalam ASEAN WorldSkills 2025 di Manila, Filipina.
Prestasi luar biasa yang mengharumkan nama SMK PGRI 3 Malang di tingkat dunia.',
                'credit' => 'Edsel Parama Mustapa & Risca Revan Suasmara',
                'folder' => 'prestasi',
                'image' => json_encode(['1760642188_prestasi15.jpg']),
                'created_at' => '2025-10-16 12:16:28',
                'updated_at' => '2025-10-16 12:16:55'
            ]
        ];

        foreach ($data as $item) {
            DB::table('contents')->insert($item);
        }
    }
}