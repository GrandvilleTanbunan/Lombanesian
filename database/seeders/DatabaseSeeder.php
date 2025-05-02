<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Urutan yang benar untuk menghindari masalah foreign key
        $this->call([
            ProvinsiSeeder::class,
            PesertaKategoriSeeder::class,
            PenyelenggaraSeeder::class,
            MentorSeeder::class,
            LombaSeeder::class,
            MentorScheduleSeeder::class,
            MentorLombaSeeder::class,
            CategorySeeder::class,
            CategoryLombaSeeder::class
        ]);
    }
}
