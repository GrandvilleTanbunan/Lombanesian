<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PesertaKategori;

class PesertaKategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategoris = [
            'SD/Sederajat',
            'SMP/Sederajat',
            'SMA/Sederajat',
            'Mahasiswa/Sederajat',
            'Umum',
        ];

        foreach ($kategoris as $kategori) {
            PesertaKategori::create(['nama' => $kategori]);
        }
    }
}
