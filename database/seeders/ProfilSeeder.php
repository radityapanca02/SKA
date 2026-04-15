<?php
// database/seeders/ProfilSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Profil;

class ProfilSeeder extends Seeder
{
    public function run()
    {
        $profil = Profil::create([
            'heroImage' => null,
            'heroTitle' => 'SKARIGA!',

            'profilImage1' => null,
            'profilImage2' => null,
            'profilImage3' => null,
            'profilDesc' => 'SMK PGRI 3 Malang dirintis sejak tahun 1986 atas prakarsa sebanyak 16 dosen dari Universitas Brawijaya, Kota Malang. Pada bulan September 1986, SMK PGRI Malang didirikan dengan nama STM PGRI Dau Malang. Pengelolaan dilakukan oleh Yayasan PGRI Kecamatan DAU Kabupaten Malang. Lokasi pembelajaran awalnya dilakukan di SD Negeri Tlogomas 2 Malang yang berlokasi di wilayah Kecamatan Dau, Kabupaten Malang.',

            'visiImage' => null,
            'visiImageName' => 'Moch. Lukman Hakim, S.T, M.M.',
            'visiDesc' => 'Menjadi SMK yang unggul dalam prestasi dengan dilandasi Iman & Taqwa serta menghasilkan tamatan yang mampu bersaing di tingkat Nasional maupun Internasional.',

            'youtubeSrc' => 'https://www.youtube.com/embed/FAwdUR9SFRU'
        ]);

        $misis = [
            [
                'misiImage' => null,
                'misiTitle' => 'Unggul & Beriman',
                'misiDesc' => 'Menjadi SMK yang unggul dalam prestasi dengan dilandasi Iman & Taqwa serta menghasilkan tamatan yang mampu bersaing di tingkat Nasional maupun Internasional.',
                'misiColor' => 'BLUE'
            ],
            [
                'misiImage' => null,
                'misiTitle' => 'Akreditasi A',
                'misiDesc' => 'Mempertahankan dan meningkatkan akreditasi A yang telah ditetapkan oleh BAN-PDM dengan sk 1857/BAN-SM/SK/2022.',
                'misiColor' => 'GREEN'
            ],
            [
                'misiImage' => null,
                'misiTitle' => 'Success By Discipline',
                'misiDesc' => 'Dengan motto tersebut SMK PGRI 3 MALANG mampu menghasilkan lulusan yang sukses dan berkarakter disiplin.',
                'misiColor' => 'ORANGE'
            ],
            [
                'misiImage' => null,
                'misiTitle' => 'Lulus Siap Kerja',
                'misiDesc' => 'Menghasilkan lulusan yang kompeten dan siap bekerja di berbagai bidang industri dengan skill yang relevan.',
                'misiColor' => 'RED'
            ]
        ];

        foreach ($misis as $index => $misi) {
            $profil->misis()->create(array_merge($misi, [
                'order' => $index
            ]));
        }
    }
}
