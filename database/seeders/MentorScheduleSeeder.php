<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MentorSchedule;
use App\Models\Mentor;
use Carbon\Carbon;

class MentorScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mentors = Mentor::all();

        foreach ($mentors as $mentor) {
            // Buat jadwal untuk dua minggu ke depan (14 hari)
            $startDate = Carbon::now()->startOfDay();

            for ($i = 0; $i < 14; $i++) {
                $currentDate = $startDate->copy()->addDays($i);

                // Jadwal pagi (08:00 - 10:00)
                MentorSchedule::create([
                    'mentor_id' => $mentor->id,
                    'waktu_mulai' => $currentDate->copy()->setTime(8, 0),
                    'waktu_selesai' => $currentDate->copy()->setTime(10, 0),
                    'is_available' => rand(0, 1) ? true : false,
                ]);

                // Jadwal siang (13:00 - 15:00)
                MentorSchedule::create([
                    'mentor_id' => $mentor->id,
                    'waktu_mulai' => $currentDate->copy()->setTime(13, 0),
                    'waktu_selesai' => $currentDate->copy()->setTime(15, 0),
                    'is_available' => rand(0, 1) ? true : false,
                ]);

                // Jadwal sore (16:00 - 18:00)
                MentorSchedule::create([
                    'mentor_id' => $mentor->id,
                    'waktu_mulai' => $currentDate->copy()->setTime(16, 0),
                    'waktu_selesai' => $currentDate->copy()->setTime(18, 0),
                    'is_available' => rand(0, 1) ? true : false,
                ]);
            }
        }
    }
}
