<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['nama' => 'Teknologi', 'icon' => 'fa-laptop-code'],
            ['nama' => 'Bisnis', 'icon' => 'fa-chart-line'],
            ['nama' => 'Seni', 'icon' => 'fa-palette'],
            ['nama' => 'Olahraga', 'icon' => 'fa-running'],
            ['nama' => 'Desain', 'icon' => 'fa-pencil-ruler'],
            ['nama' => 'Debat', 'icon' => 'fa-comments'],
            ['nama' => 'Fotografi', 'icon' => 'fa-camera'],
            ['nama' => 'Menulis', 'icon' => 'fa-pen-fancy'],
            ['nama' => 'Musik', 'icon' => 'fa-music'],
            ['nama' => 'Akademik', 'icon' => 'fa-graduation-cap'],
            ['nama' => 'Keagamaan', 'icon' => 'fa-pray'],
            ['nama' => 'Kuliner', 'icon' => 'fa-utensils'],
            ['nama' => 'Robotik', 'icon' => 'fa-robot'],
            ['nama' => 'E-Sports', 'icon' => 'fa-gamepad'],
            ['nama' => 'Lingkungan', 'icon' => 'fa-leaf'],
            ['nama' => 'Film & Video', 'icon' => 'fa-video'],
            ['nama' => 'Tari', 'icon' => 'fa-dancing'],
            ['nama' => 'Public Speaking', 'icon' => 'fa-microphone-alt'],
            ['nama' => 'Sains', 'icon' => 'fa-flask'],
            ['nama' => 'Matematika', 'icon' => 'fa-square-root-alt']
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
