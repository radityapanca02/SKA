<?php

namespace Database\Seeders;

use App\Models\Alumni;
use Illuminate\Database\Seeder;
use Faker\Factory;


class AlumniSeeder extends Seeder
{
    public function run(): void
    {
        Alumni::truncate();

        $faker = Factory::create('id_ID');
        $companies = ['Gojek', 'Tokopedia', 'Traveloka', 'PT Pembangkitan Jawa-Bali', 'Pertamina', 'Telkom Indonesia', 'Bank Mandiri', 'Google Indonesia', 'Shopee'];
        $colors = ['bg-blue-500', 'bg-red-500', 'bg-green-500', 'bg-yellow-500', 'bg-purple-500', 'bg-orange-500'];

        $jumlahAlumni = 10;

        for ($i = 1; $i <= $jumlahAlumni; $i++) {
            Alumni::create([
                'name'         => $faker->name(),
                'graduation'   => $faker->year(),
                'position'     => $faker->jobTitle(),
                'company'      => $faker->randomElement($companies),
                'description'  => "Alumni berprestasi yang kini sukses berkarier di bidang industri kreatif dan teknologi.",
                'image'        => null,
                'bg_color'     => $faker->randomElement($colors),
                'achievements' => [
                    "Juara " . $faker->numberBetween(1, 3) . " Lomba Kompetensi Siswa",
                    "Sertifikasi Internasional " . $faker->word(),
                    "Lulusan Terbaik Tahun " . $faker->year()
                ],
            ]);
        }
    }
}
