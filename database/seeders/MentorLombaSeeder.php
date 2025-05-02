<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mentor;
use App\Models\Lomba;

class MentorLombaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Budi Setiawan (Teknik Informatika) - mentor untuk lomba IT
        $budi = Mentor::where('nama_lengkap', 'Budi Setiawan')->first();
        $budi->lombas()->attach([2]); // Hackathon Indonesia 2025

        // Siti Aisyah (DKV) - mentor untuk lomba desain
        $siti = Mentor::where('nama_lengkap', 'Siti Aisyah')->first();
        $siti->lombas()->attach([4]); // Lomba Desain Logo Nasional

        // Ahmad Fauzi (Teknik Elektro) - mentor untuk lomba robotika
        $ahmad = Mentor::where('nama_lengkap', 'Ahmad Fauzi')->first();
        $ahmad->lombas()->attach([5]); // Festival Robotika Indonesia

        // Dewi Lestari (Ilmu Komunikasi) - mentor untuk lomba karya tulis
        $dewi = Mentor::where('nama_lengkap', 'Dewi Lestari')->first();
        $dewi->lombas()->attach([3, 1]); // Lomba Karya Tulis Ilmiah Nasional

        // Reza Pratama (Bisnis Digital) - mentor untuk banyak lomba
        $reza = Mentor::where('nama_lengkap', 'Reza Pratama')->first();
        $reza->lombas()->attach([2, 3, 4]); // Hackathon, LKTI, Logo

        // Reza Pratama (Bisnis Digital) - mentor untuk banyak lomba
        $reza = Mentor::where('nama_lengkap', 'Anastasia Trifena')->first();
        $reza->lombas()->attach([3, 1]); // Hackathon, LKTI, Logo
    }
}
