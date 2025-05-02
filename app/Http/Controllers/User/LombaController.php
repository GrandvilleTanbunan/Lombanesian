<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Lomba;
use App\Models\Provinsi;
use App\Models\Category;
use App\Models\PesertaKategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LombaController extends Controller
{
    /**
     * Display a listing of lombas with filtering.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // Get filter parameters
        $search = $request->input('search');
        $locationId = $request->input('location');
        $categoryId = $request->input('category');
        $participantTypeId = $request->input('participant_type');
        $priceRange = $request->input('price_range');
        $startDate = $request->input('start_date');
        $sortBy = $request->input('sort_by', 'latest');
        $eventType = $request->input('event_type'); // New parameter for online/offline filter

        // Base query
        $query = Lomba::with([
            'categories',
            'pesertaKategori',
            'provinsi',
            'penyelenggara'
        ]);

        // Apply search filter
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                  ->orWhere('keterangan', 'like', "%{$search}%");
            });
        }

        // Apply location filter
        if ($locationId) {
            $query->where('provinsi_id', $locationId);
        }

        // Apply category filter
        if ($categoryId) {
            $query->whereHas('categories', function($q) use ($categoryId) {
                $q->where('categories.id', $categoryId);
            });
        }

        // Apply participant type filter
        if ($participantTypeId) {
            $query->whereHas('pesertaKategori', function($q) use ($participantTypeId) {
                $q->where('peserta_kategoris.id', $participantTypeId);
            });
        }

        // Apply event type filter (online/offline)
        if ($eventType !== null && $eventType !== '') {
            $query->where('jenis_lomba', $eventType);
        }

        // Apply price range filter
        if ($priceRange) {
            switch ($priceRange) {
                case 'free':
                    $query->where('biaya_pendaftaran_individu', 0)
                          ->where('biaya_pendaftaran_tim', 0);
                    break;
                case '1-50000':
                    $query->where(function($q) {
                        $q->where(function($subQ) {
                            $subQ->where('biaya_pendaftaran_individu', '>=', 1)
                                 ->where('biaya_pendaftaran_individu', '<=', 50000);
                        })->orWhere(function($subQ) {
                            $subQ->where('biaya_pendaftaran_tim', '>=', 1)
                                 ->where('biaya_pendaftaran_tim', '<=', 50000);
                        });
                    });
                    break;
                case '50001-100000':
                    $query->where(function($q) {
                        $q->where(function($subQ) {
                            $subQ->where('biaya_pendaftaran_individu', '>', 50000)
                                 ->where('biaya_pendaftaran_individu', '<=', 100000);
                        })->orWhere(function($subQ) {
                            $subQ->where('biaya_pendaftaran_tim', '>', 50000)
                                 ->where('biaya_pendaftaran_tim', '<=', 100000);
                        });
                    });
                    break;
                case '100001-500000':
                    $query->where(function($q) {
                        $q->where(function($subQ) {
                            $subQ->where('biaya_pendaftaran_individu', '>', 100000)
                                 ->where('biaya_pendaftaran_individu', '<=', 500000);
                        })->orWhere(function($subQ) {
                            $subQ->where('biaya_pendaftaran_tim', '>', 100000)
                                 ->where('biaya_pendaftaran_tim', '<=', 500000);
                        });
                    });
                    break;
                case '500001+':
                    $query->where(function($q) {
                        $q->where('biaya_pendaftaran_individu', '>', 500000)
                          ->orWhere('biaya_pendaftaran_tim', '>', 500000);
                    });
                    break;
            }
        }

        // Apply start date filter
        if ($startDate) {
            $query->whereDate('tanggal_mulai', '>=', $startDate);
        }

        // Apply sorting
        switch ($sortBy) {
            case 'popular':
                $query->orderBy('jumlah_like', 'desc');
                break;
            case 'price_low':
                // Gratis (both individu and tim = 0) should be first
                $query->orderByRaw('
                    CASE
                        WHEN (biaya_pendaftaran_individu = 0 AND biaya_pendaftaran_tim = 0) THEN 0
                        ELSE LEAST(
                            CASE WHEN biaya_pendaftaran_individu > 0 THEN biaya_pendaftaran_individu ELSE 999999999 END,
                            CASE WHEN biaya_pendaftaran_tim > 0 THEN biaya_pendaftaran_tim ELSE 999999999 END
                        )
                    END ASC
                ');
                break;
            case 'price_high':
                $query->orderByRaw('GREATEST(COALESCE(biaya_pendaftaran_individu, 0), COALESCE(biaya_pendaftaran_tim, 0)) DESC');
                break;
            case 'date_soon':
                $query->where('tanggal_mulai', '>=', now())
                      ->orderBy('tanggal_mulai', 'asc');
                break;
            case 'latest':
            default:
                $query->orderBy('created_at', 'desc');
                break;
        }

        // Get lombas with pagination
        $lombas = $query->paginate(12)->withQueryString();

        // Get data for filter dropdowns
        $provinsis = Provinsi::orderBy('nama')->get();
        $categories = Category::orderBy('nama')->get();
        $pesertaKategoris = PesertaKategori::orderBy('nama')->get();

        // Prepare active filters array
        $activeFilters = [];

        if ($search) {
            $activeFilters['search'] = $search;
        }

        if ($locationId) {
            $province = Provinsi::find($locationId);
            if ($province) {
                $activeFilters['location'] = [
                    'id' => $locationId,
                    'name' => $province->nama
                ];
            }
        }

        if ($categoryId) {
            $category = Category::find($categoryId);
            if ($category) {
                $activeFilters['category'] = [
                    'id' => $categoryId,
                    'name' => $category->nama
                ];
            }
        }

        if ($participantTypeId) {
            $participantType = PesertaKategori::find($participantTypeId);
            if ($participantType) {
                $activeFilters['participant_type'] = [
                    'id' => $participantTypeId,
                    'name' => $participantType->nama
                ];
            }
        }

        // Add event type to active filters
        if ($eventType !== null && $eventType !== '') {
            $eventTypeLabels = [
                '1' => 'Online',
                '0' => 'Offline'
            ];
            $activeFilters['event_type'] = [
                'value' => $eventType,
                'label' => $eventTypeLabels[$eventType] ?? ''
            ];
        }

        if ($priceRange) {
            $priceRangeLabels = [
                'free' => 'Gratis',
                '1-50000' => 'Rp 1 - Rp 50.000',
                '50001-100000' => 'Rp 50.001 - Rp 100.000',
                '100001-500000' => 'Rp 100.001 - Rp 500.000',
                '500001+' => 'Lebih dari Rp 500.000'
            ];
            $activeFilters['price_range'] = [
                'value' => $priceRange,
                'label' => $priceRangeLabels[$priceRange] ?? ''
            ];
        }

        if ($startDate) {
            $activeFilters['start_date'] = $startDate;
        }

        // Return view with data
        return view('user.lomba.index', compact(
            'lombas',
            'provinsis',
            'categories',
            'pesertaKategoris',
            'activeFilters',
            'search',
            'locationId',
            'categoryId',
            'participantTypeId',
            'priceRange',
            'startDate',
            'sortBy',
            'eventType' // Add eventType to compact
        ));
    }

    /**
     * Display the specified lomba.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $lomba = Lomba::with([
            'categories',
            'pesertaKategori',
            'provinsi',
            'penyelenggara',
            'mentors'
        ])->findOrFail($id);

        // Get related lombas based on categories
        $relatedLombas = Lomba::with(['categories', 'provinsi'])
            ->where('lombas.id', '!=', $id)
            ->whereHas('categories', function($query) use ($lomba) {
                $query->whereIn('categories.id', $lomba->categories->pluck('id'));
            })
            ->inRandomOrder()
            ->take(4)
            ->get();

        return view('user.lomba.detail', compact('lomba', 'relatedLombas'));
    }

    /**
     * Show the form for registering to a lomba.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm($id)
    {
        $lomba = Lomba::findOrFail($id);
        return view('user.lomba.lomba-register', compact('lomba'));
    }

    /**
     * Handle lomba registration.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request, $id)
    {
        // This method would handle the actual registration process
        // You can implement this based on your requirements

        $lomba = Lomba::findOrFail($id);

        // Validate request
        $validated = $request->validate([
            // Add your validation rules here
        ]);

        // Process registration
        // ...

        return redirect()->route('lomba.detail', $id)
            ->with('success', 'Berhasil mendaftar lomba!');
    }
}
