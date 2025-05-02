@extends('user.layout.app')

@section('title', 'Partner Lomba - Lombanesia')

@section('content')
    <!-- Hero Section -->
    <section class="bg-gradient-to-b from-blue-50 to-blue-100 py-10">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-blue-600 text-4xl font-bold mb-4">Partner Lomba</h1>
            <p class="text-gray-600 max-w-2xl mx-auto">Bekerja sama dengan beragam penyelenggara lomba terpercaya di seluruh Indonesia.</p>
        </div>
    </section>

    <!-- Partners Listing -->
    <section class="py-10 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($penyelenggaras as $penyelenggara)
                    <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300 border border-gray-100 p-6">
                        <div class="flex justify-center mb-4">
                            <img src="{{ asset($penyelenggara->logo_url) }}" alt="{{ $penyelenggara->nama }}" class="h-20 object-contain">
                        </div>

                        <h3 class="text-xl font-bold text-center text-gray-800 mb-4">{{ $penyelenggara->nama }}</h3>

                        <p class="text-gray-600 text-center mb-6 line-clamp-3">{{ Str::limit($penyelenggara->tentang, 150) }}</p>

                        <div class="text-center mb-4">
                            <p class="text-gray-500">Total Lomba: {{ $penyelenggara->lombas->count() }}</p>
                        </div>

                        <a href="{{ route('partner.detail', $penyelenggara->id) }}" class="block w-full py-2 text-center text-white font-medium bg-blue-600 border rounded-3xl hover:bg-blue-700 transition-colors">
                            Lihat Detail
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Become a Partner Section -->
    {{-- <section class="py-16  text-black bg-blue-50">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-4">Ingin Menjadi Partner?</h2>
            <p class="max-w-2xl mx-auto mb-8">Bermitra dengan Lombanesia untuk mempromosikan lomba dan acara Anda ke ribuan peserta potensial di seluruh Indonesia.</p>

            <a href="#" class="inline-flex items-center justify-center px-6 py-3 bg-blue-600 text-white font-medium rounded-3xl hover:bg-blue-700 transition-colors">
                Daftar Sekarang
            </a>
        </div>
    </section> --}}
@endsection
