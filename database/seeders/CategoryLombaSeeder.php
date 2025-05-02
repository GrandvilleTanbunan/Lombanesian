<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Lomba;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryLombaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Array untuk menyimpan mapping kategori lomba
        $categoryLombaMapping = [
            // Teknologi
            1 => [2, 6, 7, 8, 13], // Hackathon, Keamanan Siber, Data Science, dll

            // Bisnis
            2 => [2, 4], // Business Plan, Design Logo yang berhubungan dengan bisnis

            // Seni
            3 => [3, 10, 13], // Film Pendek, Menulis Puisi, Cipta Lagu

            // Olahraga
            4 => [7], // Turnamen Futsal

            // Desain
            5 => [4, 9], // Desain Logo, UI/UX

            // Debat
            6 => [11], // Debat Bahasa Inggris

            // Fotografi
            7 => [11], // Fotografi Nasional

            // Menulis
            8 => [5, 6, 10], // Menulis Cerpen, Esai, Puisi

            // Musik
            9 => [13], // Cipta Lagu Anak

            // Akademik
            10 => [3, 8, 12, 14, 15], // Olimpiade, Cerdas Cermat, LKTI

            // E-Sports
            14 => [12], // Mobile Legends

            // Film & Video
            16 => [1, 3, 5], // Film Pendek, Videografi

            // Public Speaking
            18 => [11, 1], // Debat

            // Sains
            19 => [3, 9, 12, 15], // Olimpiade Kimia, Biologi, Astronomi, Fisika

            // Matematika
            20 => [7], // Olimpiade Matematika
        ];

        // Loop melalui setiap kategori dan attach ke lomba
        foreach ($categoryLombaMapping as $categoryId => $lombaIds) {
            $category = Category::find($categoryId);
            if ($category) {
                $category->lombas()->attach($lombaIds);
            }
        }

        // Tambahan: Assign kategori untuk semua lomba yang belum memiliki kategori
        $lombasWithoutCategories = Lomba::whereDoesntHave('categories')->get();

        foreach ($lombasWithoutCategories as $lomba) {
            // Berdasarkan nama lomba, coba temukan kategori yang sesuai
            $namaLomba = strtolower($lomba->nama);

            if (strpos($namaLomba, 'matematika') !== false) {
                $lomba->categories()->attach(20); // Matematika
            } elseif (strpos($namaLomba, 'kimia') !== false || strpos($namaLomba, 'fisika') !== false ||
                    strpos($namaLomba, 'biologi') !== false || strpos($namaLomba, 'sains') !== false) {
                $lomba->categories()->attach(19); // Sains
            } elseif (strpos($namaLomba, 'debat') !== false || strpos($namaLomba, 'public speaking') !== false || strpos($namaLomba, 'lentera') !== false)  {
                $lomba->categories()->attach([6, 18]); // Debat & Public Speaking
            } elseif (strpos($namaLomba, 'business') !== false || strpos($namaLomba, 'bisnis') !== false) {
                $lomba->categories()->attach(2); // Bisnis
            } elseif (strpos($namaLomba, 'desain') !== false || strpos($namaLomba, 'design') !== false ||
                    strpos($namaLomba, 'ui/ux') !== false) {
                $lomba->categories()->attach(5); // Desain
            } elseif (strpos($namaLomba, 'programming') !== false || strpos($namaLomba, 'coding') !== false ||
                    strpos($namaLomba, 'hackathon') !== false || strpos($namaLomba, 'teknologi') !== false) {
                $lomba->categories()->attach(1); // Teknologi
            } elseif (strpos($namaLomba, 'esports') !== false || strpos($namaLomba, 'game') !== false) {
                $lomba->categories()->attach(14); // E-Sports
            } elseif (strpos($namaLomba, 'menulis') !== false || strpos($namaLomba, 'essay') !== false ||
                    strpos($namaLomba, 'esai') !== false || strpos($namaLomba, 'puisi') !== false ||
                    strpos($namaLomba, 'cerpen') !== false) {
                $lomba->categories()->attach(8); // Menulis
            } elseif (strpos($namaLomba, 'film') !== false || strpos($namaLomba, 'video') !== false) {
                $lomba->categories()->attach(16); // Film & Video
            } elseif (strpos($namaLomba, 'foto') !== false || strpos($namaLomba, 'photography') !== false) {
                $lomba->categories()->attach(7); // Fotografi
            } elseif (strpos($namaLomba, 'musik') !== false || strpos($namaLomba, 'lagu') !== false) {
                $lomba->categories()->attach(9); // Musik
            } elseif (strpos($namaLomba, 'cerdas cermat') !== false || strpos($namaLomba, 'olimpiade') !== false ||
                    strpos($namaLomba, 'karya tulis') !== false || strpos($namaLomba, 'akademik') !== false) {
                $lomba->categories()->attach(10); // Akademik
            } else {
                // Default: tambahkan ke kategori Akademik jika tidak ada kategori yang cocok
                $lomba->categories()->attach(10);
            }
        }
    }
}
