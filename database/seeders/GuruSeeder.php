<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            DB::table('guru')->insert([
                'nama_guru' => $faker->name,
                'jenis_kelamin_guru' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'tanggal_lahir' => $faker->date,
                'alamat_guru' => $faker->address,
                'no_telepon' => $faker->numberBetween(1, 100),
                'foto' => $faker->imageUrl(200, 200),
                'input_date' => now(),
            ]);
        }
    }
}
