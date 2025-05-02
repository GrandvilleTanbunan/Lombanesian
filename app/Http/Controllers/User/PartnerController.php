<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Penyelenggara;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function index()
    {
        $penyelenggaras = Penyelenggara::latest()->get();
        return view('user.partner.index', compact('penyelenggaras'));
    }

    public function show($id)
    {
        // Get the partner with their competitions
        $penyelenggara = Penyelenggara::with('lombas.categories', 'lombas.provinsi', 'provinsi')->findOrFail($id);

        // Current date for comparison
        $now = now();

        // Get ongoing competitions (started but not yet finished)
        $ongoingLombas = $penyelenggara->lombas
            ->where('tanggal_mulai', '<=', $now)
            ->where('tanggal_selesai', '>=', $now)
            ->take(4);

        // Get upcoming competitions (not yet started)
        $upcomingLombas = $penyelenggara->lombas
            ->where('tanggal_mulai', '>', $now)
            ->take(4);

        // Get past competitions (already finished)
        $pastLombas = $penyelenggara->lombas
            ->where('tanggal_selesai', '<', $now)
            ->take(4);

        return view('user.partner.detail', compact('penyelenggara', 'ongoingLombas', 'upcomingLombas', 'pastLombas'));
    }
}
