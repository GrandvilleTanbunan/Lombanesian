<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mentor;

class MentorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mentors = [
            [
                'nama_lengkap' => 'Budi Setiawan',
                'foto_url' => 'images/mentors/budi.jpg',
                'program_studi' => 'Teknik Informatika (2019)',
                'universitas' => 'Institut Teknologi Bandung',
                'prestasi_lomba' => "Juara 1 Competitive Programming ITB 2022\nJuara 2 National Hackathon 2023\nFinalis ACM ICPC Asia Jakarta 2022",
                'tarif' => 250000.00,
            ],
            [
                'nama_lengkap' => 'Siti Aisyah',
                'foto_url' => 'images/mentors/siti.jpg',
                'program_studi' => 'Desain Komunikasi Visual (2020)',
                'universitas' => 'Universitas Indonesia',
                'prestasi_lomba' => "Juara 1 Design Competition COMPFEST UI 2022\nJuara 3 Logo Design National Competition 2021\nPemenang Adobe Design Award 2023",
                'tarif' => 200000.00,
            ],
            [
                'nama_lengkap' => 'Ahmad Fauzi',
                'foto_url' => 'images/mentors/ahmad.jpg',
                'program_studi' => 'Teknik Elektro (2021)',
                'universitas' => 'Universitas Gadjah Mada',
                'prestasi_lomba' => "Juara 1 Kontes Robot Indonesia 2022\nJuara 2 National IoT Competition 2023\nFinalis ASEAN Robotic Day 2022",
                'tarif' => 275000.00,
            ],
            [
                'nama_lengkap' => 'Dewi Lestari',
                'foto_url' => 'images/mentors/dewi.jpg',
                'program_studi' => 'Ilmu Komunikasi (2019)',
                'universitas' => 'Petra Christian Univesity',
                'prestasi_lomba' => "Juara 1 Debat Bahasa Inggris Nasional 2022\nJuara 2 Lomba Esai Nasional 2023\nPemenang Public Speaking Competition 2021",
                'tarif' => 180000.00,
            ],
            [
                'nama_lengkap' => 'Reza Pratama',
                'foto_url' => 'images/mentors/reza.jpg',
                'program_studi' => 'Bisnis Digital (2020)',
                'universitas' => 'Universitas Bina Nusantara',
                'prestasi_lomba' => "Juara 1 Business Plan Competition 2023\nFinalis Entrepreneur Challenge SEA 2022\nJuara 2 National Business Case Competition 2021",
                'tarif' => 225000.00,
            ],
            [
                'nama_lengkap' => 'Anastasia Trifena',
                'foto_url' => 'images/mentors/anastasia.jpg',
                'program_studi' => 'Ilmu Komunikasi (2021)',
                'universitas' => 'Petra Christian University',
                'prestasi_lomba' => "2nd Place Podcast Competition, Powerful Digitalization Competition, Universitas Kristen Petra (2023)\n2nd Place Podcast Competition, Social Media Day, Universitas Tidar (2022)\n1st Place Podcast Competition, Communication Day, Universitas Ahmad Dahlan (2021)\nTop 12 Finalist Podcast Competition, Mother's Day, Perum Produksi Film Negara (PFN) dan BUMN (2021)\n2nd Place Podcast Competition, PSP Project 6.0, Universitas Airlangga (2021)",
                'tarif' => 100000.00,
            ],

        ];

        foreach ($mentors as $mentor) {
            Mentor::create($mentor);
        }
    }
}
