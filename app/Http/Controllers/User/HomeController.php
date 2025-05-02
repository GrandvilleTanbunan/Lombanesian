<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Lomba;
use App\Models\Provinsi;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function index()
    {
        // Get popular lomba (based on likes)
        $popularLombas = Lomba::with('categories')->orderBy('jumlah_like', 'desc')->take(8)->get();

        // Get latest lomba
        $latestLombas = Lomba::with('categories', 'pesertaKategori', 'provinsi')->orderBy('created_at', 'desc')->take(4)->get();

        // Get provinsi for location filter
        $provinsis = Provinsi::orderBy('nama')->get();

        // Get categories for category filter
        $categories = Category::orderBy('nama')->get();

        return view('user.home', compact('popularLombas', 'latestLombas', 'provinsis', 'categories'));
    }

    /**
     * Load more lomba for ajax request
     */
    public function loadMoreLomba(Request $request)
    {
        try {
            // Log request untuk debugging
            Log::info('Load more request received', [
                'page' => $request->input('page', 1),
                'ip' => $request->ip()
            ]);

            // Get last loaded lomba ID to ensure we don't miss any
            $lastLoadedId = (int)$request->input('last_id', 0);

            // Items per page (load 4 lomba per request)
            $perPage = 4;

            // Query untuk mendapatkan total lomba
            $totalLomba = Lomba::count();

            // Query untuk mendapatkan lomba yang sudah ditampilkan
            $loadedCount = $lastLoadedId === 0 ? 4 : $request->input('loaded_count', 4);

            Log::info('Load parameters', [
                'lastLoadedId' => $lastLoadedId,
                'loadedCount' => $loadedCount,
                'totalLomba' => $totalLomba
            ]);

            // Jika semua lomba sudah ditampilkan
            if ($loadedCount >= $totalLomba) {
                Log::info('All lomba already loaded', [
                    'loadedCount' => $loadedCount,
                    'totalLomba' => $totalLomba
                ]);

                return response()->json([
                    'html' => '',
                    'hasMorePages' => false,
                    'count' => 0,
                    'total' => $totalLomba,
                    'loaded' => $loadedCount,
                    'remaining' => 0,
                    'last_id' => $lastLoadedId
                ]);
            }

            // Query base - include eager loading for related data
            $query = Lomba::with('categories', 'pesertaKategori', 'provinsi')->orderBy('created_at', 'desc');

            // Jika ada ID terakhir, kita skip semua lomba yang sudah dimuat
            if ($lastLoadedId > 0) {
                // Dapatkan semua ID lomba yang sudah dimuat
                $loadedLombas = Lomba::orderBy('created_at', 'desc')
                                ->take($loadedCount)
                                ->pluck('id')
                                ->toArray();

                Log::info('Loaded lomba IDs', ['ids' => $loadedLombas]);

                // Skip lomba yang sudah dimuat dengan whereNotIn
                $query->whereNotIn('id', $loadedLombas);
            } else {
                // Pada load pertama, kita skip 4 lomba awal yang sudah dimuat
                $query->skip(4);
            }

            // Ambil lomba selanjutnya
            $lombas = $query->take($perPage)->get();

            Log::info('Query results', [
                'requested' => $perPage,
                'retrieved' => $lombas->count()
            ]);

            // Cek apakah masih ada lomba yang belum dimuat
            $newLoadedCount = $loadedCount + $lombas->count();
            $hasMorePages = $newLoadedCount < $totalLomba;
            $remaining = $totalLomba - $newLoadedCount;

            // Dapatkan ID lomba terakhir yang baru dimuat (untuk referensi di request berikutnya)
            $newLastId = $lombas->count() > 0 ? $lombas->last()->id : $lastLoadedId;

            Log::info('Pagination status', [
                'previouslyLoaded' => $loadedCount,
                'newlyLoaded' => $lombas->count(),
                'totalNowLoaded' => $newLoadedCount,
                'totalInDb' => $totalLomba,
                'remaining' => $remaining,
                'hasMorePages' => $hasMorePages,
                'newLastId' => $newLastId
            ]);

            // Render view (with error catching)
            try {
                $html = view('user.partials.lomba-cards', compact('lombas'))->render();
                Log::info('HTML generated successfully', ['length' => strlen($html)]);
            } catch (\Exception $e) {
                Log::error('Error rendering view', ['error' => $e->getMessage()]);
                return response()->json([
                    'error' => 'Error rendering view: ' . $e->getMessage()
                ], 500);
            }

            return response()->json([
                'html' => $html,
                'hasMorePages' => $hasMorePages,
                'count' => $lombas->count(),
                'total' => $totalLomba,
                'loaded' => $newLoadedCount,
                'remaining' => $remaining,
                'last_id' => $newLastId
            ]);

        } catch (\Exception $e) {
            Log::error('Error in loadMoreLomba', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'error' => 'Server error: ' . $e->getMessage()
            ], 500);
        }
    }
}
