<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ekskul;

class EkskulSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ekskuls = [
            [
                'title' => 'Futsal',
                'desc' => 'Akademi Futsal SKARIGA (AFUSKA) merupakan DB bidang olahraga yang bisa diikuti oleh seluruh siswa SKARIGA. Terdiri dari tim putra dan putri.',
                'image' => null
            ],
            [
                'title' => 'Sepak Bola',
                'desc' => 'PS Merpati Muda SMK PGRI 3 Malang berkiprah di Divisi 1 Liga internal Askot PSSI Kota Malang, dengan skuad mayoritas siswa aktif dan beberapa alumni.',
                'image' => null
            ],
            [
                'title' => 'Jurnalistik',
                'desc' => 'DB yang mempelajari pencarian, penulisan, dan penyajian berita. Peserta berlatih wawancara, menulis artikel, memotret, dan mengelola media sekolah.',
                'image' => null
            ],
            [
                'title' => 'BTQ',
                'desc' => 'DB fokus pembelajaran membaca, menulis, dan memahami Al-Qur’an sesuai tajwid, untuk meningkatkan literasi dan keimanan peserta.',
                'image' => null
            ],
            [
                'title' => 'Banjari',
                'desc' => 'Seni musik islami dengan rebana untuk sholawat, qasidah, dan lagu religi. Melatih kekompakan sekaligus melestarikan budaya.',
                'image' => null
            ],
            [
                'title' => 'Baca Kitab',
                'desc' => 'Kegiatan pembelajaran membaca dan memahami kitab klasik berbahasa Arab, yang biasanya berisi materi agama Islam, hukum, dan akhlak.',
                'image' => null
            ],
            [
                'title' => 'Bola Voli',
                'desc' => 'DB bola voli sama halnya dengan futsal memiliki 2 tim yaitu putra dan putri. Pernah menjadi semifinalis di ajang turnamen bola voli kampus swasta di Malang.',
                'image' => null
            ],
            [
                'title' => 'Basket',
                'desc' => 'DB bola basket rutin mengikuti lomba antar SMA/SMK sederajat. Terbaru, tim basket SKARIGA ikut ambil bagian dalam IMONOKE CUP Kota Malang 2024.',
                'image' => null
            ],
            [
                'title' => 'Ilustrasi',
                'desc' => 'Mengasah keterampilan menggambar manual maupun digital. Peserta mempelajari komposisi, warna, teknik gambar, dan software desain.',
                'image' => null
            ],
            [
                'title' => 'Fotografi',
                'desc' => 'Mempelajari teknik pengambilan gambar, pengaturan komposisi, pencahayaan, fokus, serta proses pengeditan dan kepekaan artistik.',
                'image' => null
            ],
            [
                'title' => 'Indo Craft',
                'desc' => 'Membuat kerajinan tangan khas Indonesia seperti anyaman, batik, atau ukiran, serta pembelajaran menata taman secara estetis.',
                'image' => null
            ],
            [
                'title' => 'Tari',
                'desc' => 'Melestarikan seni tari khas daerah di Indonesia. Peserta mempelajari gerakan, kostum, dan makna di balik tarian.',
                'image' => null
            ],
            [
                'title' => 'Android Club',
                'desc' => 'Mempelajari pembuatan aplikasi berbasis Android mulai dari desain antarmuka, logika program, hingga pengujian aplikasi.',
                'image' => null
            ],
            [
                'title' => 'Arduino',
                'desc' => 'Berfokus pada proyek berbasis mikrokontroler Arduino, seperti otomasi, robotika, dan Internet of Things (IoT).',
                'image' => null
            ],
            [
                'title' => 'CADD & CNC',
                'desc' => 'Merancang objek dengan software CAD serta memproduksinya menggunakan mesin CNC (Computer Numerical Control).',
                'image' => null
            ],
            [
                'title' => 'Auto Plus',
                'desc' => 'Mempelajari otomotif secara menyeluruh, termasuk perawatan, perbaikan, modifikasi, dan pemahaman teknis kendaraan.',
                'image' => null
            ],
            [
                'title' => 'Sains Club',
                'desc' => 'Mendorong eksperimen dan penelitian di bidang sains (fisika, kimia, biologi) untuk mengasah berpikir ilmiah.',
                'image' => null
            ],
            [
                'title' => 'Bahasa Inggris',
                'desc' => 'Mengembangkan kemampuan berbicara, menulis, mendengarkan, dan membaca dalam bahasa Inggris.',
                'image' => null
            ],
            [
                'title' => 'Band',
                'desc' => 'Mengembangkan kemampuan bermain alat musik dan bernyanyi secara individu maupun kelompok.',
                'image' => null
            ],
            [
                'title' => 'Sastra',
                'desc' => 'Melatih keterampilan membaca, menulis, menganalisis, dan mengapresiasi karya sastra klasik maupun modern.',
                'image' => null
            ],
            [
                'title' => 'Keputrian',
                'desc' => 'Kegiatan khusus siswi yang membahas keterampilan hidup, etika, kepribadian, dan pembinaan keagamaan.',
                'image' => null
            ],
            [
                'title' => 'Audio Video',
                'desc' => 'Mempelajari proses produksi media, mulai dari perekaman audio/video hingga penyuntingan karya.',
                'image' => null
            ],
            [
                'title' => '3D Modelling',
                'desc' => 'Pembuatan model tiga dimensi menggunakan perangkat lunak untuk keperluan desain, animasi, atau simulasi.',
                'image' => null
            ],
            [
                'title' => 'Bulu Tangkis',
                'desc' => 'Olahraga raket yang bertujuan memukul kok melewati net dan menjatuhkannya di area lawan.',
                'image' => null
            ],
            [
                'title' => 'PASKIBRAKA',
                'desc' => 'Pasukan Pengibar Bendera yang melatih kedisiplinan, kepemimpinan, dan kerja sama tim.',
                'image' => null
            ],
            [
                'title' => 'E-Sports',
                'desc' => 'Membina siswa dalam game digital kompetitif dengan menekankan strategi, kerja sama tim, dan sportivitas.',
                'image' => null
            ],
        ];

        foreach ($ekskuls as $ekskul) {
            Ekskul::create($ekskul);
        }
    }
}
