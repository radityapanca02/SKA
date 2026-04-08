<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ekskul;
use Illuminate\Support\Facades\DB;

class EkskulSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ekskuls')->insert([
            'title' => 'Futsal',
            'desc' => 'Akademi Futsal Skariga (AFUSKA) merupakan DB bidang olahraga
            yang bisa diikuti oleh seluruh siswa Skariga. Terdiri dari tim putra dan putri.',
            'image' => 'ekskul/eksFutsal.png'
        ]);

        DB::table('ekskuls')->insert([
            'title' => 'Sepak Bola',
            'desc' => 'PS Merpati Muda SMK PGRI 3 Malang berkiprah di Divisi 1 Liga internal Askot PSSI Kota
            Malang, dengan skuad mayoritas siswa aktif dan beberapa alumni.',
            'image' => 'ekskul/eksSepakbola.png'
        ]);

        DB::table('ekskuls')->insert([
            'title' => 'Jurnalistik',
            'desc' => 'DB yang mempelajari pencarian, penulisan, dan penyajian berita.
            Peserta berlatih wawancara, menulis artikel, memotret, dan mengelola media sekolah.',
            'image' => 'ekskul/eksJurnal.png'
        ]);

        DB::table('ekskuls')->insert([
            'title' => 'BTQ',
            'desc' => 'DB fokus pembelajaran membaca, menulis, dan memahami Al-Qur’an sesuai tajwid,
            untuk meningkatkan literasi dan keimanan peserta.',
            'image' => 'ekskul/eksBTQ.png'
        ]);

        DB::table('ekskuls')->insert([
            'title' => 'Banjari',
            'desc' => 'Seni musik islami dengan rebana untuk sholawat, qasidah, dan lagu religi.
            Melatih kekompakan sekaligus melestarikan budaya.',
            'image' => 'ekskul/eksBanjari.png'
        ]);

        DB::table('ekskuls')->insert([
            'title' => 'Baca Kitab',
            'desc' => 'Kegiatan pembelajaran membaca dan memahami kitab klasik berbahasa
            Arab, yang biasanya berisi materi agama Islam, hukum, dan akhlak. Peserta didik dilatih
            memahami tata bahasa Arab klasik dan maknanya.',
            'image' => 'ekskul/eksBacakitab.png'
        ]);

        DB::table('ekskuls')->insert([
            'title' => 'Bola Voli',
            'desc' => 'DB bola voli sama halnya dengan futsal memiliki 2 tim yaitu putra
            dan putri. 4x menjadi semifinalis di ajang turnamen bola voli yang diselenggarakan oleh
            salah satu kampus swasta di Malang.',
            'image' => 'ekskul/eksVoli.png'
        ]);

        DB::table('ekskuls')->insert([
            'title' => 'Basket',
            'desc' => 'Sejak pertama hadir di Skariga, DB bola basket terus berkembang
            pesat. Berkat kekompakan anggota dan tim pelatih, DB ini rutin mengikuti lomba antar
            SMA/SMK sederajat. Terbaru, tim basket Skariga ikut ambil bagian dalam IMONOKE CUP Kota
            Malang 2024.',
            'image' => 'ekskul/eksBasket.png'
        ]);

        DB::table('ekskuls')->insert([
            'title' => 'Ilustrasi',
            'desc' => 'Kegiatan yang mengasah keterampilan menggambar secara manual maupun
            digital untuk menghasilkan karya visual. Peserta mempelajari komposisi, warna, teknik
            gambar, dan penggunaan perangkat lunak desain.',
            'image' => 'ekskul/eksIlustrasi.png'
        ]);

        DB::table('ekskuls')->insert([
            'title' => 'Fotografi',
            'desc' => 'Kegiatan mempelajari teknik pengambilan gambar menggunakan kamera,
            termasuk pengaturan komposisi, pencahayaan, fokus, serta proses pengeditan. Fotografi
            juga melatih kepekaan artistik dan kemampuan bercerita melalui visual',
            'image' => 'ekskul/eksFotografi.png'
        ]);

        DB::table('ekskuls')->insert([
            'title' => 'Indo Craft',
            'desc' => 'Kegiatan membuat kerajinan tangan khas Indonesia seperti anyaman,
            batik, atau ukiran, serta pembelajaran menata taman atau ruang luar secara estetis dan
            fungsional.',
            'image' => 'ekskul/eksIndocraft.png'
        ]);

        DB::table('ekskuls')->insert([
            'title' => 'Tari',
            'desc' => 'Ekstrakurikuler yang melestarikan seni tari khas daerah di Indonesia.
            Peserta mempelajari gerakan, kostum, dan makna di balik tarian, sekaligus menumbuhkan
            rasa cinta terhadap budaya bangsa.',
            'image' => 'ekskul/eksTari.png'
        ]);

        DB::table('ekskuls')->insert([
            'title' => 'Android Club',
            'desc' => 'Kegiatan yang mempelajari pembuatan aplikasi berbasis Android mulai
            dari desain antarmuka, logika program, hingga pengujian aplikasi.',
            'image' => 'ekskul/eksAndroid.png'
        ]);

        DB::table('ekskuls')->insert([
            'title' => 'Arduino',
            'desc' => 'Komunitas yang berfokus pada pembelajaran dan pembuatan proyek
            berbasis mikrokontroler Arduino, seperti otomasi, robotika, dan Internet of Things
            (IoT).',
            'image' => 'ekskul/eksArduino.png'
        ]);

        DB::table('ekskuls')->insert([
            'title' => 'CADD & CNC',
            'desc' => 'Kegiatan merancang objek dengan perangkat lunak CAD (Computer-Aided
            Design and Drafting) serta memproduksinya menggunakan mesin CNC (Computer Numerical
            Control).',
            'image' => 'ekskul/eksCADD.png'
        ]);

        DB::table('ekskuls')->insert([
            'title' => 'Auto Plus',
            'desc' => 'Ekstrakurikuler yang mempelajari otomotif secara menyeluruh, termasuk
            perawatan, perbaikan, modifikasi, dan pemahaman teknis kendaraan bermotor.',
            'image' => 'ekskul/eksAutoplus.png'
        ]);

        DB::table('ekskuls')->insert([
            'title' => 'Sains Club',
            'desc' => 'Klub yang mendorong peserta melakukan eksperimen dan penelitian di
            bidang sains, seperti fisika, kimia, dan biologi, untuk mengasah kemampuan berpikir
            ilmiah.',
            'image' => 'ekskul/eksSains.png'
        ]);

        DB::table('ekskuls')->insert([
            'title' => 'Bahasa Inggris',
            'desc' => 'Kegiatan untuk mengembangkan kemampuan berbahasa Inggris, meliputi
            keterampilan berbicara, menulis, mendengarkan, membaca, serta penguasaan tata bahasa.',
            'image' => 'ekskul/eksEnglish.png'
        ]);

        DB::table('ekskuls')->insert([
            'title' => 'Band',
            'desc' => 'Ekstrakurikuler yang mengembangkan kemampuan bermain alat musik dan
            bernyanyi, baik secara individu maupun kelompok, untuk tampil dalam acara sekolah atau
            kompetisi.',
            'image' => 'ekskul/eksBand.png'
        ]);

        DB::table('ekskuls')->insert([
            'title' => 'Sastra',
            'desc' => 'Kegiatan yang melatih keterampilan membaca, menulis, menganalisis,
            dan mengapresiasi karya sastra, baik klasik maupun modern.',
            'image' => 'ekskul/eksSastra.png'
        ]);

        DB::table('ekskuls')->insert([
            'title' => 'Keputrian',
            'desc' => 'Kegiatan khusus untuk peserta didik perempuan yang membahas
            keterampilan hidup, etika, kepribadian, dan pembinaan keagamaan.',
            'image' => 'ekskul/eksKeputrian.png'
        ]);

        DB::table('ekskuls')->insert([
            'title' => 'Audio Video',
            'desc' => 'Ekstrakurikuler yang mempelajari proses produksi media, mulai dari
            perekaman audio dan video hingga penyuntingan dan pengemasan karya.',
            'image' => 'ekskul/eksAudio.png'
        ]);

        DB::table('ekskuls')->insert([
            'title' => '3D Modelling',
            'desc' => 'Kegiatan yang mengajarkan pembuatan model tiga dimensi menggunakan
            perangkat lunak, untuk keperluan desain, animasi, atau simulasi.',
            'image' => 'ekskul/eks3d.png'
        ]);

        DB::table('ekskuls')->insert([
            'title' => 'Bulu Tangkis',
            'desc' => 'Olahraga raket yang dimainkan oleh dua atau empat orang, dengan
            tujuan memukul kok melewati net dan menjatuhkannya di area lawan.',
            'image' => 'ekskul/eksBulutangkis.png'
        ]);

        DB::table('ekskuls')->insert([
            'title' => 'PASKIBRAKA',
            'desc' => 'Pasukan Pengibar Bendera yang memiliki tugas utama mengibarkan dan
            menurunkan bendera merah putih pada upacara. Kegiatan ini melatih kedisiplinan,
            kepemimpinan, dan kerja sama tim.',
            'image' => 'ekskul/eksPaskib.png'
        ]);

        DB::table('ekskuls')->insert([
            'title' => 'E-Sports',
            'desc' => 'Ekstrakurikuler Esports adalah kegiatan yang membina siswa dalam permainan digital kompetitif yang menekankan strategi,
            kerja sama tim, dan sportivitas. Melalui latihan rutin dan pertandingan, siswa dilatih untuk berpikir taktis, berkomunikasi efektif,
            serta mengembangkan mental juara di lingkungan yang positif dan terarah.',
            'image' => 'ekskul/eksEsport.avif'
        ]);
    }
}
