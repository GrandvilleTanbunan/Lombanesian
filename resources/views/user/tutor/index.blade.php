@extends('user.layout.app')

@section('title', 'Info Tutor - Lombanesia')

@section('content')
    <!-- Hero Section -->
    <section class="bg-gradient-to-b from-blue-50 to-blue-100 py-10">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-blue-600 text-4xl font-bold mb-4">Temukan Tutor Terbaik</h1>
            <p class="text-gray-600 max-w-2xl mx-auto">Dapatkan bimbingan dari mentor terbaik yang memiliki pengalaman dan prestasi di berbagai lomba.</p>
        </div>
    </section>

    <!-- Mentor Filter Section -->
    {{-- <section class="py-8 bg-white">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row gap-4 justify-between">
                <!-- Search Bar -->
                <div class="flex-1">
                    <div class="relative">
                        <input type="text" placeholder="Cari Mentor" class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-search text-gray-400"></i>
                        </div>
                    </div>
                </div>

                <!-- Filters -->
                <div class="w-full md:w-64">
                    <select class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 appearance-none bg-white" id="university-filter">
                        <option value="">Semua Universitas</option>
                        @php
                            $universities = \App\Models\Mentor::select('universitas')->distinct()->pluck('universitas');
                        @endphp
                        @foreach($universities as $university)
                            <option value="{{ $university }}">{{ $university }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="w-full md:w-64">
                    <select class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 appearance-none bg-white" id="program-filter">
                        <option value="">Semua Program Studi</option>
                        @php
                            $programs = \App\Models\Mentor::select('program_studi')->distinct()->pluck('program_studi');
                        @endphp
                        @foreach($programs as $program)
                            <option value="{{ $program }}">{{ $program }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- Mentors Listing -->
    <section class="py-10 bg-gray-50">
        <div class="container mx-auto px-4 max-w-6xl">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
                @foreach($mentors as $mentor)
                    <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300">
                        <div class="relative h-96">
                            <img src="{{ asset($mentor->foto_url) }}" alt="{{ $mentor->nama_lengkap }}" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent flex items-end">
                                <div class="p-4 text-white">
                                    <h3 class="text-xl font-bold">{{ $mentor->nama_lengkap }}</h3>
                                    <p>{{ $mentor->program_studi }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="p-4">
                            <div class="flex items-center text-gray-600 mb-2">
                                <i class="fas fa-university w-6 text-xl pr-8" style="color: #5270ff"></i>
                                <span>{{ $mentor->universitas }}</span>
                            </div>

                            <div class="flex items-center text-gray-600 mb-2">
                                <i class="fas fa-trophy w-6 text-xl pr-8" style="color: #5270ff"></i>
                                <span class="line-clamp-1">{{ Str::limit($mentor->prestasi_lomba, 50) }}</span>
                            </div>

                            <div class="flex items-center text-gray-600 mb-4">
                                <i class="fas fa-money-bill-wave w-6 text-xl pr-8" style="color: #5270ff"></i>
                                <span class="font-semibold text-blue-600">Rp {{ number_format($mentor->tarif, 0, ',', '.') }}</span>
                            </div>

                            <a href="{{ route('tutor.profile', $mentor->id) }}" class="block w-full py-2 text-center text-white font-medium bg-blue-600 rounded-3xl hover:bg-blue-700 transition-colors">
                                Lihat Profil
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
