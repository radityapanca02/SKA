<?php
// database/seeders/JurusanSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jurusan;
use Illuminate\Support\Facades\Storage;

class JurusanSeeder extends Seeder
{
    public function run()
    {
        $jurusans = [
            // ELEKTRO
            [
                'jurusan' => 'Teknik Elektronika & Audio Video',
                'departemen' => 'ELEKTRO',
                'gambar' => 'jurusan/jurTEAV.jpg',
                'deskripsi' => 'Dengan kode jurusan AV, merupakan jurusan yang mempelajari perancangan, instalasi, dan perawatan sistem elektronika serta peralatan audio video. Lanjutan studi meliputi S1 Teknik Elektronika, Teknik Elektro, atau pelatihan/sertifikasi teknisi AV. Berpotensi bekerja sebagai teknisi elektronika, teknisi audio video, instalator sistem, atau teknisi perawatan perangkat elektronik.'
            ],
            [
                'jurusan' => 'Teknik Elektronika Industri',
                'departemen' => 'ELEKTRO',
                'gambar' => 'jurusan/jurEI.jpg',
                'deskripsi' => 'Dengan kode jurusan EI, merupakan jurusan yang mempelajari perancangan, instalasi, dan pemeliharaan sistem elektronika pada bidang industri. Lanjutan studi meliputi S1 Teknik Elektronika atau Teknik Elektro. Berpotensi bekerja sebagai teknisi industri, perancang sistem kontrol, atau teknisi perawatan peralatan industri.'
            ],
            [
                'jurusan' => 'Teknik Kimia Industri',
                'departemen' => 'ELEKTRO',
                'gambar' => 'jurusan/jurKI.jpg',
                'deskripsi' => 'Dengan kode jurusan KL (Kimia Laboratorium), merupakan jurusan yang mempelajari pengujian, analisis, dan pengolahan bahan kimia di laboratorium. Lanjutan studi meliputi S1 Kimia, Farmasi, atau Teknik Kimia. Berpotensi bekerja sebagai analis laboratorium, teknisi kimia, quality control, atau peneliti.'
            ],
            [
                'jurusan' => 'Teknik Pembangkit Tenaga Listrik',
                'departemen' => 'ELEKTRO',
                'gambar' => 'jurusan/jurPB.jpg',
                'deskripsi' => 'Dengan kode jurusan PB, merupakan jurusan yang mempelajari pengoperasian, pemeliharaan, dan pengelolaan sistem pembangkit listrik. Lanjutan studi meliputi S1 Teknik Elektro atau Energi Terbarukan. Berpotensi bekerja sebagai teknisi pembangkit, operator, atau insinyur di bidang pembangkitan listrik.'
            ],

            // OTOMOTIF
            [
                'jurusan' => 'Teknik Bisnis Sepeda Motor',
                'departemen' => 'OTOMOTIF',
                'gambar' => 'jurusan/jurTBSM.jpg',
                'deskripsi' => 'Dengan kode jurusan TSM, merupakan jurusan yang mempelajari perawatan, perbaikan, dan pengelolaan bisnis di bidang sepeda motor. Lanjutan studi meliputi S1 Teknik Otomotif atau Manajemen Bisnis. Berpotensi bekerja sebagai teknisi sepeda motor, service advisor, atau wirausahawan bengkel.'
            ],
            [
                'jurusan' => 'Teknik Kendaraan Ringan',
                'departemen' => 'OTOMOTIF',
                'gambar' => 'jurusan/otomotif_card.png',
                'deskripsi' => 'Dengan kode jurusan TKR, merupakan jurusan yang mempelajari perawatan, perbaikan, dan diagnosis kerusakan kendaraan ringan. Lanjutan studi meliputi S1 Teknik Otomotif atau Manufaktur. Berpotensi bekerja sebagai teknisi, mekanik, atau wirausahawan bengkel kendaraan ringan.'
            ],
            [
                'jurusan' => 'Teknik Body Otomotif',
                'departemen' => 'OTOMOTIF',
                'gambar' => 'jurusan/jurBO.jpg',
                'deskripsi' => 'Dengan kode jurusan BO, merupakan jurusan yang mempelajari perbaikan, perawatan, dan pengecatan body kendaraan. Lanjutan studi meliputi S1 Teknik Otomotif atau Rekayasa Material. Berpotensi bekerja sebagai teknisi body repair, pengecat kendaraan, atau wirausahawan bengkel body.'
            ],

            // PEMESINAN
            [
                'jurusan' => 'Bisnis Digital & Pemasaran',
                'departemen' => 'PEMESINAN',
                'gambar' => 'jurusan/jurBDP.jpg',
                'deskripsi' => 'Dengan kode jurusan BDP, merupakan jurusan yang mempelajari pemasaran, penjualan, dan pengelolaan bisnis. Lanjutan studi meliputi S1 Manajemen, Bisnis, atau Pemasaran. Berpotensi bekerja sebagai staf pemasaran, sales, wirausahawan, atau manajer bisnis.'
            ],
            [
                'jurusan' => 'Teknik Pengelasan',
                'departemen' => 'PEMESINAN',
                'gambar' => 'jurusan/jurTL.jpg',
                'deskripsi' => 'Dengan kode jurusan TL, merupakan jurusan yang mempelajari teknik pengelasan dan fabrikasi logam. Lanjutan studi meliputi S1 Teknik Mesin atau Metalurgi. Berpotensi bekerja sebagai juru las, teknisi fabrikasi, atau inspektur pengelasan.'
            ],
            [
                'jurusan' => 'Teknik Pemesinan',
                'departemen' => 'PEMESINAN',
                'gambar' => 'jurusan/jurTP.jpg',
                'deskripsi' => 'Dengan kode jurusan TP, merupakan jurusan yang mempelajari proses permesinan, pembuatan, dan perawatan komponen mesin. Lanjutan studi meliputi S1 Teknik Mesin atau Manufaktur. Berpotensi bekerja sebagai teknisi mesin, operator CNC, atau perancang komponen mekanic.'
            ],

            // TIK
            [
                'jurusan' => 'Animasi',
                'departemen' => 'TIK',
                'gambar' => 'jurusan/jurNIMA.jpg',
                'deskripsi' => 'Dengan kode jurusan NIM, merupakan jurusan yang mempelajari pembuatan animasi 2D dan 3D untuk keperluan hiburan, pendidikan, maupun media komersial. Lanjutan studi meliputi S1 Animasi, Desain Komunikasi Visual, atau Perfilman. Berpotensi bekerja sebagai animator, ilustrator, storyboard artist, atau desainer multimedia.'
            ],
            [
                'jurusan' => 'Desain Komunikasi Visual',
                'departemen' => 'TIK',
                'gambar' => 'jurusan/jurDKV.jpg',
                'deskripsi' => 'Dengan kode jurusan DKV, merupakan jurusan yang mempelajari desain komunikasi visual untuk menyampaikan pesan melalui media cetak maupun digital. Lanjutan studi meliputi S1 Desain Komunikasi Visual atau bidang seni dan desain terkait. Berpotensi bekerja sebagai desainer grafis, ilustrator, animator, fotografer, atau desainer multimedia.'
            ],
            [
                'jurusan' => 'Broadcasting & Perfilman',
                'departemen' => 'TIK',
                'gambar' => 'jurusan/jurBP.jpg',
                'deskripsi' => 'Dengan kode jurusan BP, merupakan jurusan yang mempelajari perencanaan, produksi, dan penyiaran konten audio-visual untuk radio, televisi, dan media digital. Lanjutan studi meliputi S1 Broadcasting, Ilmu Komunikasi, atau perfilman. Berpotensi bekerja sebagai penyiar, reporter, kameramen, editor video, atau produser.'
            ],
            [
                'jurusan' => 'Teknik Komputer Jaringan',
                'departemen' => 'TIK',
                'gambar' => 'jurusan/jurTKJ.jpg',
                'deskripsi' => 'Dengan kode jurusan TKJ, merupakan jurusan yang mempelajari instalasi, konfigurasi, dan pemeliharaan jaringan komputer. Lanjutan studi meliputi S1 Teknik Informatika, Teknik Elektro, atau pelatihan/sertifikasi jaringan. Berpotensi bekerja sebagai teknisi, administrator, atau konsultan jaringan, serta spesialis keamanan siber.'
            ],
            [
                'jurusan' => 'Rekayasa Perangkat Lunak',
                'departemen' => 'TIK',
                'gambar' => 'jurusan/jurRPL.jpg',
                'deskripsi' => 'Dengan kode jurusan RPL, merupakan jurusan yang mempelajari perancangan, pengembangan, dan pemeliharaan perangkat lunak. Lanjutan studi meliputi S1 RPL, S1 Teknik Informatika, atau pelatihan/sertifikasi IT. Berpotensi bekerja sebagai pengembang, insinyur, analis, konsultan, manajer proyek, pengajar, atau peneliti perangkat lunak.'
            ],
        ];

        foreach ($jurusans as $jurusan) {
            Jurusan::create($jurusan);
        }

        $this->command->info('Seeder Jurusan berhasil ditambahkan!');
        $this->command->info('Total: ' . count($jurusans) . ' jurusan');
        $this->command->info('Breakdown:');
        $this->command->info('- ELEKTRO: 4 jurusan');
        $this->command->info('- OTOMOTIF: 3 jurusan');
        $this->command->info('- PEMESINAN: 3 jurusan');
        $this->command->info('- TIK: 5 jurusan');
    }
}
