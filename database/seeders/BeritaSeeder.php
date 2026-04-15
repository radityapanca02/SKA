<?php

namespace Database\Seeders;

use App\Models\Berita;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membersihkan tabel sebelum mengisi data baru
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Berita::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $beritas = [
            [
                'title'     => 'Pelaksanaan Penilaian Sumatif Akhir Semester Ganjil',
                'slug'      => 'pelaksanaan-penilaian-sumatif-akhir-semester-ganjil',
                'deskripsi' => 'Informasi jadwal dan teknis PSAS berbasis komputer untuk seluruh siswa.',
                'content'   => '
                Memasuki akhir semester ganjil tahun ajaran 2025/2026, SMK PGRI 3 Malang (Skariga) secara serentak melaksanakan Penilaian Sumatif Akhir Semester (PSAS) berbasis digital bagi seluruh siswa kelas X hingga XII. Langkah ini merupakan bagian dari komitmen berkelanjutan sekolah dalam mengintegrasikan teknologi Information and Communication Technology (ICT) ke dalam siklus akademik. Sistem PSAS tahun ini menggunakan server lokal berperforma tinggi yang didistribusikan melalui jaringan intranet sekolah, memastikan proses pengerjaan soal berlangsung cepat, stabil, dan minim kendala teknis bagi ribuan siswa yang mengakses secara bersamaan.

                Untuk menjaga integritas dan validitas hasil ujian, panitia pelaksana menerapkan protokol keamanan siber yang ketat melalui aplikasi Safe Exam Browser. Siswa diwajibkan menggunakan perangkat yang telah terverifikasi, di mana sistem akan mengunci fungsi navigasi lainnya untuk mencegah akses ke sumber informasi eksternal selama ujian berlangsung. Pelaksanaan dibagi ke dalam beberapa sesi di masing-masing laboratorium kompetensi keahlian, di bawah pengawasan ketat proktor dan teknisi yang siaga memastikan bahwa setiap modul soal tersampaikan secara adil kepada seluruh peserta didik.

                Bukan sekadar formalitas akademik, PSAS Ganjil di Skariga dirancang untuk mengukur sejauh mana penguasaan kompetensi siswa terhadap materi yang telah diselaraskan dengan kebutuhan industri. Hasil dari penilaian ini akan langsung terintegrasi ke dalam sistem E-Rapor, memberikan feedback instan bagi guru dan orang tua mengenai progres belajar siswa. Melalui evaluasi berbasis data ini, sekolah dapat memetakan kekuatan dan kelemahan di setiap jurusan, yang kemudian menjadi dasar untuk inovasi metode pembelajaran pada semester genap mendatang guna mempertahankan standar lulusan yang unggul.
                ',
                'gambar'    => null,
                'views'     => 1250,
                'type'      => 'PENGUMUMAN'
            ],
            [
                'title'     => 'Skariga Career Day 2026: Rekrutmen PT Astra Honda Motor',
                'slug'      => 'skariga-career-day-2026-rekrutmen-pt-ahm',
                'deskripsi' => 'Kesempatan berkarir bagi alumni dan siswa kelas XII.',
                'content'   => '
                Skariga Career Day 2026 kembali mempertegas posisi SMK PGRI 3 Malang sebagai mitra strategis industri otomotif nasional melalui kolaborasi rekrutmen bersama PT Astra Honda Motor (AHM). Program rekrutmen massal ini merupakan bagian dari implementasi kurikulum berbasis industri yang telah lama dijalankan oleh Skariga. Sebagai salah satu produsen sepeda motor terbesar di dunia, PT AHM menaruh kepercayaan tinggi kepada lulusan Skariga yang dinilai memiliki standar kompetensi teknis dan etos kerja yang sesuai dengan kebutuhan lini produksi manufaktur modern.

                Proses rekrutmen kali ini diikuti oleh ratusan alumni serta siswa kelas XII yang telah melalui tahap pra-seleksi internal. Rangkaian ujian dilakukan secara transparan dan kompetitif, meliputi tes ketahanan fisik (kesamaptaan), psikotes khusus industri otomotif, hingga tes buta warna dan kesehatan. Tim rekrutmen dari PT AHM terjun langsung ke lokasi untuk memastikan setiap calon operator memiliki ketelitian tinggi dan kemampuan adaptasi yang cepat terhadap teknologi perakitan terbaru yang digunakan di pabrik-pabrik mereka.

                Keberhasilan penyelenggaraan Career Day ini berdampak signifikan terhadap angka keterserapan lulusan Skariga di dunia kerja sebelum mereka secara resmi diwisuda. Bagi para peserta yang dinyatakan lolos seleksi, mereka akan mendapatkan pembekalan akhir di sekolah sebelum diberangkatkan menuju kawasan industri di Jakarta atau Cikarang. Kerjasama ini tidak hanya memberikan jaminan karir bagi siswa, tetapi juga menjadi bukti nyata keberhasilan sekolah dalam menjalankan program Link and Match yang selaras dengan tuntutan pasar kerja global.
                ',
                'gambar'    => null,
                'views'     => 3500,
                'type'      => 'ACARA'
            ],
            [
                'title'     => 'Latihan Dasar Kepemimpinan Siswa (LDKS) OSIS',
                'slug'      => 'ldks-osis-skariga-2026',
                'deskripsi' => 'Membangun karakter pemimpin yang disiplin dan berintegritas.',
                'content'   => '
                Latihan Dasar Kepemimpinan Siswa (LDKS) bagi pengurus OSIS SMK PGRI 3 Malang tahun 2026 merupakan kawah candradimuka yang dirancang untuk mentransformasi siswa terpilih menjadi pemimpin yang visioner. Bertempat di Dodikjur Rindam V/Brawijaya, kegiatan ini tidak hanya berfokus pada kecakapan organisasi, tetapi juga pada penguatan karakter "Skariga" yang disiplin dan loyal. Melalui program ini, sekolah berupaya membangun pondasi kepemimpinan yang kokoh agar pengurus OSIS mampu menjadi jembatan aspirasi yang efektif antara siswa dan manajemen sekolah.

                Selama tiga hari masa penggemblengan, para peserta dihadapkan pada kurikulum pelatihan yang komprehensif, mencakup materi manajemen konflik, teknik komunikasi publik, hingga simulasi pengambilan keputusan taktis di bawah tekanan. Instruktur dari personel militer memberikan pelatihan kedisiplinan fisik dan mental melalui kegiatan baris-berbaris (PBB) dan tata upacara, sementara pembina kesiswaan memberikan pendalaman materi mengenai administrasi organisasi modern. Sinergi ini bertujuan agar pengurus OSIS memiliki ketahanan mental yang tangguh dalam menghadapi dinamika kegiatan sekolah yang padat.

                Puncak dari kegiatan LDKS ini adalah pengukuhan komitmen seluruh pengurus melalui prosesi janji pengurus OSIS di bawah panji sekolah. Dengan selesainya pelatihan ini, para siswa diharapkan tidak hanya cakap secara administratif dalam menyusun program kerja, tetapi juga memiliki integritas moral yang tinggi sebagai teladan bagi siswa lainnya. Keberhasilan LDKS 2026 ini menjadi langkah awal bagi OSIS Skariga untuk menghadirkan inovasi-inovasi kegiatan yang kreatif, kompetitif, dan relevan dengan tantangan pendidikan di era digital.
                ',
                'gambar'    => null,
                'views'     => 670,
                'type'      => 'KEGIATAN'
            ],
            [
                'title'     => 'SKARIGA berhasil meraih emas pada LKS Dikmen Jatim 2026',
                'slug'      => 'skariga-emas-lks',
                'deskripsi' => '4 Bidang Lomba berhasil diselesaikan dengan perolehan medali emas.',
                'content'   => '
                Penyelenggaraan Lomba Kompetensi Siswa (LKS) SMK Tingkat Provinsi Jawa Timur 2026 kembali menjadi panggung pembuktian bagi siswa-siswi terbaik, termasuk kontingen dari SMK Negeri 7 Malang (Skariga). Dalam kompetisi yang diikuti oleh ribuan peserta dari berbagai kabupaten/kota ini, Skariga berhasil menunjukkan dominasinya dengan mengamankan posisi terhormat di beberapa bidang lomba unggulan. Keberhasilan ini merupakan buah dari persiapan intensif dan sinkronisasi kurikulum sekolah dengan standar industri terkini yang selama ini menjadi fokus utama pengembangan bakat di Skariga.

                Pencapaian luar biasa di tingkat provinsi ini tidak hanya menambah koleksi prestasi di lemari juara sekolah, tetapi juga mengukuhkan reputasi Skariga sebagai institusi pendidikan vokasi yang kompetitif di wilayah Jawa Timur. Para peraih medali dari Skariga dinilai memiliki ketahanan mental dan keterampilan teknis yang mumpuni saat menghadapi modul soal yang memiliki standar kompetensi tinggi. Kemenangan ini sekaligus menjadi tiket penting bagi para juara untuk melangkah ke ajang LKS Tingkat Nasional, membawa nama baik Jawa Timur di kancah yang lebih luas.

                Keberhasilan di tahun 2026 ini juga mencerminkan sinergi yang kuat antara guru pembimbing, dukungan fasilitas sekolah, dan semangat juang para siswa. Dengan hasil yang membanggakan ini, Skariga terus berkomitmen untuk mencetak lulusan yang siap kerja dan berdaya saing global, membuktikan bahwa pendidikan menengah kejuruan di Malang mampu menjawab tantangan industri masa depan. Prestasi ini diharapkan menjadi inspirasi bagi seluruh civitas akademika untuk terus berinovasi dan mempertahankan tradisi juara di tahun-tahun mendatang.
                ',
                'gambar'    => null,
                'views'     => 2100,
                'type'      => 'PRESTASI'
            ],
        ];

        foreach ($beritas as $berita) {
            Berita::create($berita);
        }
    }
}
