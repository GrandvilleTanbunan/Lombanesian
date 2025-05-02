<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Mentor;
use App\Models\MentorSchedule;
use App\Models\Lomba;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TutorController extends Controller
{
    /**
     * Display a listing of mentors.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // Dapatkan parameter filter
        $search = $request->input('search');
        $university = $request->input('university');
        $program = $request->input('program');

        // Query dasar
        $query = Mentor::query();

        // Terapkan filter
        if ($search) {
            $query->where('nama_lengkap', 'like', "%{$search}%");
        }

        if ($university) {
            $query->where('universitas', $university);
        }

        if ($program) {
            $query->where('program_studi', 'like', "%{$program}%");
        }

        // Dapatkan mentor
        $mentors = $query->latest()->paginate(9);

        // Dapatkan pilihan filter untuk dropdowns
        $universities = Mentor::select('universitas')->distinct()->pluck('universitas');
        $programs = Mentor::select('program_studi')->distinct()->pluck('program_studi');

        return view('user.tutor.index', compact('mentors', 'universities', 'programs', 'search', 'university', 'program'));
    }

    /**
     * Display mentor profile and schedule
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function showProfile($id)
    {
        // Get mentor data with relationships
        $mentor = Mentor::with(['lombas', 'schedules' => function($query) {
            // Get only future schedules
            $query->where('waktu_mulai', '>=', Carbon::now())
                  ->orderBy('waktu_mulai', 'asc');
        }])->findOrFail($id);

        // Group schedules by date for easier display
        $schedulesGrouped = [];
        foreach ($mentor->schedules as $schedule) {
            $date = $schedule->waktu_mulai->format('Y-m-d');
            if (!isset($schedulesGrouped[$date])) {
                $schedulesGrouped[$date] = [];
            }
            $schedulesGrouped[$date][] = $schedule;
        }

        // Get related lomba categories for this mentor
        $lombaCategories = [];
        if ($mentor->lombas && $mentor->lombas->count() > 0) {
            $lombaIds = $mentor->lombas->pluck('id')->toArray();
            $lombaCategories = Lomba::whereIn('id', $lombaIds)
                ->with('categories')
                ->get()
                ->pluck('categories')
                ->flatten()
                ->unique('id')
                ->pluck('nama')
                ->toArray();
        }

        // Get mentor recommendations based on similar expertise
        $similarMentors = [];
        if (!empty($lombaCategories)) {
            $similarLombaIds = Lomba::whereHas('categories', function($query) use ($lombaCategories) {
                $query->whereIn('nama', $lombaCategories);
            })->pluck('id')->toArray();

            // Perbaikan: Menggunakan kolom id dengan namespace tabel lombas yang jelas
            $similarMentors = Mentor::where('mentors.id', '!=', $mentor->id)
                ->whereHas('lombas', function($query) use ($similarLombaIds) {
                    $query->whereIn('lombas.id', $similarLombaIds);
                })
                ->inRandomOrder()
                ->take(4)
                ->get();
        }

        // If we don't have enough similar mentors, add some random ones
        if (count($similarMentors) < 4) {
            $additionalMentors = Mentor::where('mentors.id', '!=', $mentor->id)
                ->whereNotIn('mentors.id', $similarMentors->pluck('id')->toArray())
                ->inRandomOrder()
                ->take(4 - count($similarMentors))
                ->get();

            $similarMentors = $similarMentors->merge($additionalMentors);
        }

        return view('user.tutor.profil', compact(
            'mentor',
            'schedulesGrouped',
            'lombaCategories',
            'similarMentors'
        ));
    }

    /**
     * AJAX request to get available time slots
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAvailableSlots(Request $request)
    {
        $mentorId = $request->input('mentor_id');
        $date = $request->input('date');

        if (!$mentorId || !$date) {
            return response()->json(['error' => 'Parameter tidak lengkap'], 400);
        }

        $selectedDate = Carbon::parse($date);
        $schedules = MentorSchedule::where('mentor_id', $mentorId)
            ->whereDate('waktu_mulai', $selectedDate)
            ->where('is_available', true)
            ->orderBy('waktu_mulai')
            ->get()
            ->map(function($schedule) {
                return [
                    'id' => $schedule->id,
                    'start' => $schedule->waktu_mulai->format('H:i'),
                    'end' => $schedule->waktu_selesai->format('H:i'),
                    'duration' => $schedule->waktu_mulai->diffInHours($schedule->waktu_selesai)
                ];
            });

        return response()->json(['slots' => $schedules]);
    }
}
