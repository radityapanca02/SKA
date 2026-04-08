<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EkstrakurikulerSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['title' => 'Bola Basket', 'body' => 'Ekskul basket Skariga terus berkembang dan aktif mengikuti turnamen antar sekolah. Saat ini tergabung dalam IMONOKE CUP Kota Malang.', 'folder' => 'ekstrakulikuler', 'image' => '["basket.png"]'],
            ['title' => 'Sepak Bola', 'body' => 'Sepak Bola adalah salah satu kegiatan ekstrakurikuler yang disukai oleh siswa karena melatih teknik bermain di lapangan luas, strategi tim, dan kedisiplinan.', 'folder' => 'ekstrakulikuler', 'image' => '["sepak-bola.png"]'],
            ['title' => 'Band', 'body' => 'Ekskul band mengajarkan bermain alat musik dalam grup musik modern. Fokus pada latihan bersama dan penampilan lagu.', 'folder' => 'ekstrakulikuler', 'image' => '["band.png"]'],
            ['title' => 'Futsal', 'body' => 'Futsal adalah salah satu kegiatan ekstrakurikuler yang disukai oleh siswa karena mengasah teknik bermain, kerja sama tim, dan sportivitas dalam suasana yang seru dan menantang.', 'folder' => 'ekstrakulikuler', 'image' => '["bola-voli.png"]'],
            ['title' => 'English Club', 'body' => 'English Club meningkatkan kemampuan berbahasa Inggris melalui diskusi, drama, dan permainan. Kegiatan dilakukan dalam suasana menyenangkan.', 'folder' => 'ekstrakulikuler', 'image' => '["english-club.png"]'],
            ['title' => 'Robotik', 'body' => 'Ekskul robotik melatih siswa dalam merancang, membuat, dan memprogram robot. Kegiatan mencakup perakitan, pemrograman, dan lomba.', 'folder' => 'ekstrakulikuler', 'image' => '["robotik.png"]'],
            ['title' => 'Kerajinan Perca', 'body' => 'Ekskul ini mengajarkan cara mengolah kain sisa menjadi produk kreatif dan fungsional. Kegiatan cocok untuk siswa yang menyukai seni dan kerajinan.', 'folder' => 'ekstrakulikuler', 'image' => '["kerajinan-perca.png"]'],
            ['title' => 'Banjari', 'body' => 'Ekskul bernuansa islami yang mengajarkan seni sholawat dengan vokal dan alat musik. Rutin tampil di acara sekolah dan lomba.', 'folder' => 'ekstrakulikuler', 'image' => '["banjari.png"]'],
            ['title' => 'Taekwondo', 'body' => 'Taekwondo merupakan ekskul bela diri baru di Skariga yang cepat berkembang. Dilatih oleh pelatih bersertifikat dan telah meraih prestasi internasional.', 'folder' => 'ekstrakulikuler', 'image' => '["taekwondo.png"]'],
            ['title' => 'Tarung Derajad', 'body' => 'Tarung Derajat adalah ekskul bela diri muda yang sudah menyumbang medali emas di PON. Latihan rutin dilaksanakan di GOR Skariga.', 'folder' => 'ekstrakulikuler', 'image' => '["tarung-derajad.png"]'],
            ['title' => 'Pencak Silat', 'body' => 'Terdapat dua perguruan aktif yaitu Tapak Suci dan Pagar Nusa. Atlet dari ekskul ini rutin menjuarai lomba tingkat kota hingga nasional.', 'folder' => 'ekstrakulikuler', 'image' => '["pencak-silat.png"]'],
            ['title' => 'Pramuka', 'body' => 'Ekskul Pramuka membentuk karakter, kemandirian, dan kedisiplinan siswa. Kegiatan mencakup latihan, kemah, lomba, dan bakti sosial.', 'folder' => 'ekstrakulikuler', 'image' => '["pramuka.png"]'],
            ['title' => 'Badminton', 'body' => 'Ekskul badminton tergolong baru dan banyak peminatnya. Latihan dilaksanakan di GOR berstandar di Kota Malang setiap hari Rabu.', 'folder' => 'ekstrakulikuler', 'image' => '["badminton.png"]'],
            ['title' => '3D Modeling', 'body' => 'Ekskul ini fokus pada pembuatan model 3D untuk desain produk, animasi, dan arsitektur. Peserta belajar software seperti Blender dan SketchUp.', 'folder' => 'ekstrakulikuler', 'image' => '["3d-modeling.png"]'],
            ['title' => 'Fotografi', 'body' => 'Ekskul ini mengajarkan teknik pengambilan dan pengeditan foto. Cocok untuk siswa yang tertarik pada seni visual dan dokumentasi.', 'folder' => 'ekstrakulikuler', 'image' => '["fotografi.png"]'],
            ['title' => 'Broadcasting & Film Maker', 'body' => 'Ekskul ini mengajarkan produksi film dan siaran digital dari naskah hingga editing. Peserta belajar sinematografi, akting, dan konten kreatif.', 'folder' => 'ekstrakulikuler', 'image' => '["broadcasting.png"]'],
            ['title' => 'Tari Tradisional', 'body' => 'Ekskul tari tradisional melatih gerakan, kostum, dan makna dari berbagai tarian daerah. Rutin tampil dan ikut lomba budaya.', 'folder' => 'ekstrakulikuler', 'image' => '["tari-tradisional.png"]'],
            ['title' => 'Autoplus', 'body' => 'Ekskul Autoplus fokus pada teknik otomotif, dari dasar mesin hingga teknologi kendaraan terkini. Peserta juga mengikuti workshop dan lomba.', 'folder' => 'ekstrakulikuler', 'image' => '["autoplus.png"]'],
            ['title' => 'E-Sport', 'body' => 'Ekskul e-sport melatih strategi, kerja tim, dan sportivitas dalam game kompetitif. Kegiatan mencakup latihan, turnamen, dan pembinaan mental.', 'folder' => 'ekstrakulikuler', 'image' => '["e-sport.png"]'],
            ['title' => 'Bola Voli', 'body' => 'Ekskul bola voli Skariga memiliki tim putra dan putri yang konsisten berprestasi di tingkat regional. Latihan dilakukan rutin setiap minggu.', 'folder' => 'ekstrakulikuler', 'image' => '["bola-voli.png"]'],
        ];

        foreach ($data as $item) {
            DB::table('contents')->insert([
                'title' => $item['title'],
                'body' => $item['body'],
                'folder' => $item['folder'],
                'image' => $item['image'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
