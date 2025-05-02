@extends('user.layout.app')

@section('title', $penyelenggara->nama . ' - Partner Lomba Lombanesia')

@section('content')
    <!-- Hero Section with Partner Info -->
    <section class="bg-gradient-to-b from-blue-50 to-blue-100 py-16">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row items-center">
                <div class="lg:w-1/3 mb-8 lg:mb-0 flex justify-center">
                    <div class="bg-transparent p-8 rounded-lg ">
                        <img src="{{ asset($penyelenggara->logo_url) }}" alt="{{ $penyelenggara->nama }}"
                            class="h-48 object-contain mx-auto">
                    </div>
                </div>
                <div class="lg:w-2/3 lg:pl-12">
                    <div class="flex items-center justify-between mb-6">
                        <h1 class="text-blue-600 text-4xl font-bold">{{ $penyelenggara->nama }}</h1>
                        @if (isset($penyelenggara->website))
                            <a href="{{ $penyelenggara->website }}" target="_blank"
                                class="inline-flex items-center justify-center px-5 py-2 bg-white text-blue-600 font-medium rounded-3xl border border-blue-600 hover:bg-blue-50 transition-colors">
                                <i class="fas fa-globe mr-2"></i> Kunjungi Website
                            </a>
                        @endif
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Tentang Partner</h3>
                        <p class="text-gray-600 leading-relaxed">{!! nl2br(e($penyelenggara->tentang)) !!}</p>

                        <div class="mt-8 flex flex-wrap gap-4">
                            <div class="bg-blue-50 rounded-lg p-4 flex-1 min-w-[150px]">
                                <p class="text-gray-500 text-sm">Total Lomba</p>
                                <p class="text-blue-600 font-bold text-2xl">{{ $penyelenggara->lombas->count() }}</p>
                            </div>

                            <div class="bg-blue-50 rounded-lg p-4 flex-1 min-w-[150px]">
                                <p class="text-gray-500 text-sm">Lomba Aktif</p>
                                <p class="text-blue-600 font-bold text-2xl">
                                    {{ $penyelenggara->lombas->where('tanggal_selesai', '>=', now())->count() }}</p>
                            </div>

                            <div class="bg-blue-50 rounded-lg p-4 flex-1 min-w-[150px]">
                                <p class="text-gray-500 text-sm">Provinsi</p>
                                <p class="text-blue-600 font-bold text-xl">{{ $penyelenggara->provinsi->nama }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Ongoing Competitions Section -->
    @php
        $ongoingLombas = $penyelenggara->lombas
            ->where('tanggal_mulai', '<=', now())
            ->where('tanggal_selesai', '>=', now())
            ->take(4);
    @endphp

    @if ($ongoingLombas->count() > 0)
        <section class="py-12 bg-white">
            <div class="container mx-auto px-4">
                <h2 class="text-3xl font-bold text-gray-800 mb-8">Lomba yang Sedang Berlangsung</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach ($ongoingLombas as $lomba)
                        <div
                            class="bg-white rounded-3xl overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300">


                            <!-- Card container dengan tinggi yang lebih besar -->
                            <div
                                class="bg-white rounded-3xl overflow-hidden shadow-md border-2 border-blue-600 relative h-[800px] flex flex-col p-5 hover:shadow-xl transition-all duration-300 transform  hover:border-[#5270ff]">


                                <!-- Poster Container dengan tinggi h-100 -->
                                <div class="w-full h-96 flex-shrink-0 overflow-hidden">
                                    @if ($lomba->poster_url)
                                        {{-- <img src="{{ asset($lomba->poster_url) }}" alt="{{ $lomba->nama }}"
                                            class="w-full h-full rounded-lg transition-all duration-500"> --}}
                                        <div class="relative">
                                            <img src="{{ asset($lomba->poster_url) }}" alt="{{ $lomba->nama }}"
                                                class="w-full h-full object-cover">
                                            <div
                                                class="absolute top-0 right-0 bg-green-600 text-white text-xs font-bold px-3 py-1 m-2 rounded-full">
                                                Berlangsung
                                            </div>
                                        </div>
                                    @else
                                        <div
                                            class="w-full h-full bg-gray-100 rounded-lg flex items-center justify-center hover:bg-gray-200 transition-colors duration-300">
                                            <span class="text-gray-400">
                                                <i class="fas fa-image text-4xl"></i>
                                            </span>
                                        </div>
                                    @endif
                                </div>

                                <!-- Competition Content dengan lebih banyak space -->
                                <div class="pt-5 flex-1 flex flex-col relative">
                                    <!-- Header content -->
                                    <div>
                                        <h3 class="text-lg font-semibold text-gray-800 mb-3">{{ $lomba->nama }}</h3>

                                        <!-- Tags -->
                                        {{-- <div class="flex flex-wrap gap-1 mb-4">
            @foreach ($lomba->pesertaKategori as $kategori)
                <span
                    class="text-xs text-blue-600 bg-blue-50 px-2 py-1 rounded hover:bg-blue-100 transition-colors duration-300">{{ $kategori->nama }}</span>
            @endforeach
        </div> --}}

                                        <!-- Category Tags -->
                                        <div class="flex flex-wrap gap-1 mb-4">
                                            @foreach ($lomba->categories as $category)
                                                <span
                                                    class="text-xs text-white bg-blue-600 px-2 py-1 rounded hover:bg-blue-700 transition-colors duration-300">
                                                    <i class="fas {{ $category->icon }}"></i>
                                                    {{ $category->nama }}
                                                </span>
                                            @endforeach
                                        </div>
                                    </div>

                                    <!-- Info Items dengan spacing yang lebih lega -->
                                    <div class="space-y-3 text-l mt-2">
                                        <div class="flex items-center">
                                            <i class="fas fa-user-graduate w-10 text-xl" style="color: #5270ff"></i>
                                            <span
                                                class='text-black'>{{ implode(', ', $lomba->pesertaKategori->pluck('nama')->toArray()) }}</span>
                                        </div>
                                        @if ($lomba->biaya_pendaftaran_individu > 0 && $lomba->biaya_pendaftaran_tim > 0)
                                            <div class="flex flex-col space-y-2">
                                                <div class="flex items-center">
                                                    <i class="fas fa-money-bill-wave w-10 text-xl"
                                                        style="color: #5270ff"></i>
                                                    <span class='text-black'>Individu: Rp
                                                        {{ number_format($lomba->biaya_pendaftaran_individu, 0, ',', '.') }}</span>
                                                </div>
                                                <div class="flex items-center">
                                                    <div class="w-10"></div>
                                                    <span class='text-black'>Tim: Rp
                                                        {{ number_format($lomba->biaya_pendaftaran_tim, 0, ',', '.') }}</span>
                                                </div>
                                            </div>
                                        @elseif($lomba->biaya_pendaftaran_individu > 0)
                                            <div class="flex items-center">
                                                <i class="fas fa-money-bill-wave w-10 text-xl" style="color: #5270ff"></i>
                                                <span class='text-black'>Individu: Rp
                                                    {{ number_format($lomba->biaya_pendaftaran_individu, 0, ',', '.') }}</span>
                                            </div>
                                        @elseif($lomba->biaya_pendaftaran_tim > 0)
                                            <div class="flex items-center">
                                                <i class="fas fa-money-bill-wave w-10 text-xl" style="color: #5270ff"></i>
                                                <span class='text-black'>Tim: Rp
                                                    {{ number_format($lomba->biaya_pendaftaran_tim, 0, ',', '.') }}</span>
                                            </div>
                                        @else
                                            <div class="flex items-center">
                                                <i class="fas fa-money-bill-wave w-10 text-xl" style="color: #5270ff"></i>
                                                <span class='text-black'>Gratis</span>
                                            </div>
                                        @endif
                                        <div class="flex items-center">
                                            <i class="fas fa-map-marker-alt w-10 text-xl" style="color: #5270ff"></i>
                                            <span class='text-black'>{{ $lomba->provinsi->nama }}</span>
                                        </div>
                                        <div class="flex items-center">
                                            <i class="fas fa-calendar w-10 text-xl" style="color: #5270ff"></i>
                                            <span class='text-black'>{{ $lomba->tanggal_mulai->format('j F Y') }}</span>
                                        </div>
                                    </div>


                                </div>
                                <div class="absolute bottom-6 left-4 right-4">
                                    <a href="{{ url('/lomba/' . $lomba->id) }}"
                                        class="block w-full py-3 text-center text-white font-medium bg-[#5270ff] border border-[#5270ff] rounded-3xl hover:bg-[#4560e6] hover:shadow-lg transition-all duration-300 transform hover:scale-105">
                                        More Detail <i class="fas fa-arrow-right ml-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                @if ($penyelenggara->lombas->where('tanggal_mulai', '<=', now())->where('tanggal_selesai', '>=', now())->count() > 4)
                    <div class="text-center mt-8">
                        <a href="{{ route('lomba.index') }}?penyelenggara={{ $penyelenggara->id }}&status=ongoing"
                            class="inline-flex items-center justify-center px-6 py-3 bg-white text-green-600 font-medium rounded-3xl border border-green-600 hover:bg-green-50 transition-colors">
                            Lihat Semua Lomba Berlangsung
                        </a>
                    </div>
                @endif
            </div>
        </section>
    @endif

    <!-- Upcoming Competitions Section -->
    @php
        $upcomingLombas = $penyelenggara->lombas->where('tanggal_mulai', '>', now())->take(4);
    @endphp

    @if ($upcomingLombas->count() > 0)
        <section class="py-12 {{ $ongoingLombas->count() > 0 ? 'bg-gray-50' : 'bg-white' }}">
            <div class="container mx-auto px-4">
                <h2 class="text-3xl font-bold text-gray-800 mb-8">Lomba yang Akan Datang</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach ($upcomingLombas as $lomba)
                        <!-- Card container dengan tinggi yang lebih besar -->
                        <div
                            class="bg-white rounded-3xl overflow-hidden shadow-md border-2 border-blue-600 relative h-[800px] flex flex-col p-5 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 hover:border-[#5270ff]">


                            <!-- Poster Container dengan tinggi h-100 -->
                            <div class="w-full h-96 flex-shrink-0 overflow-hidden">
                                @if ($lomba->poster_url)
                                    <div class="relative">
                                        <img src="{{ asset($lomba->poster_url) }}" alt="{{ $lomba->nama }}"
                                            class="w-full h-full object-cover">
                                        <div
                                            class="absolute top-0 right-0 bg-blue-600 text-white text-xs font-bold px-3 py-1 m-2 rounded-full">
                                            {{ $lomba->jenis_lomba == 0 ? 'Offline' : 'Online' }}
                                        </div>
                                    </div>
                                @else
                                    <div
                                        class="w-full h-full bg-gray-100 rounded-lg flex items-center justify-center hover:bg-gray-200 transition-colors duration-300">
                                        <span class="text-gray-400">
                                            <i class="fas fa-image text-4xl"></i>
                                        </span>
                                    </div>
                                @endif
                            </div>

                            <!-- Competition Content dengan lebih banyak space -->
                            <div class="pt-5 flex-1 flex flex-col relative">
                                <!-- Header content -->
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-800 mb-3">{{ $lomba->nama }}</h3>

                                    <!-- Tags -->
                                    {{-- <div class="flex flex-wrap gap-1 mb-4">
            @foreach ($lomba->pesertaKategori as $kategori)
                <span
                    class="text-xs text-blue-600 bg-blue-50 px-2 py-1 rounded hover:bg-blue-100 transition-colors duration-300">{{ $kategori->nama }}</span>
            @endforeach
        </div> --}}

                                    <!-- Category Tags -->
                                    <div class="flex flex-wrap gap-1 mb-4">
                                        @foreach ($lomba->categories as $category)
                                            <span
                                                class="text-xs text-white bg-blue-600 px-2 py-1 rounded hover:bg-blue-700 transition-colors duration-300">
                                                <i class="fas {{ $category->icon }}"></i>
                                                {{ $category->nama }}
                                            </span>
                                        @endforeach
                                    </div>
                                </div>

                                <!-- Info Items dengan spacing yang lebih lega -->
                                <div class="space-y-3 text-l mt-2">
                                    <div class="flex items-center">
                                        <i class="fas fa-user-graduate w-10 text-xl" style="color: #5270ff"></i>
                                        <span
                                            class='text-black'>{{ implode(', ', $lomba->pesertaKategori->pluck('nama')->toArray()) }}</span>
                                    </div>
                                    @if ($lomba->biaya_pendaftaran_individu > 0 && $lomba->biaya_pendaftaran_tim > 0)
                                        <div class="flex flex-col space-y-2">
                                            <div class="flex items-center">
                                                <i class="fas fa-money-bill-wave w-10 text-xl" style="color: #5270ff"></i>
                                                <span class='text-black'>Individu: Rp
                                                    {{ number_format($lomba->biaya_pendaftaran_individu, 0, ',', '.') }}</span>
                                            </div>
                                            <div class="flex items-center">
                                                <div class="w-10"></div>
                                                <span class='text-black'>Tim: Rp
                                                    {{ number_format($lomba->biaya_pendaftaran_tim, 0, ',', '.') }}</span>
                                            </div>
                                        </div>
                                    @elseif($lomba->biaya_pendaftaran_individu > 0)
                                        <div class="flex items-center">
                                            <i class="fas fa-money-bill-wave w-10 text-xl" style="color: #5270ff"></i>
                                            <span class='text-black'>Individu: Rp
                                                {{ number_format($lomba->biaya_pendaftaran_individu, 0, ',', '.') }}</span>
                                        </div>
                                    @elseif($lomba->biaya_pendaftaran_tim > 0)
                                        <div class="flex items-center">
                                            <i class="fas fa-money-bill-wave w-10 text-xl" style="color: #5270ff"></i>
                                            <span class='text-black'>Tim: Rp
                                                {{ number_format($lomba->biaya_pendaftaran_tim, 0, ',', '.') }}</span>
                                        </div>
                                    @else
                                        <div class="flex items-center">
                                            <i class="fas fa-money-bill-wave w-10 text-xl" style="color: #5270ff"></i>
                                            <span class='text-black'>Gratis</span>
                                        </div>
                                    @endif
                                    <div class="flex items-center">
                                        <i class="fas fa-map-marker-alt w-10 text-xl" style="color: #5270ff"></i>
                                        <span class='text-black'>{{ $lomba->provinsi->nama }}</span>
                                    </div>
                                    <div class="flex items-center">
                                        <i class="fas fa-calendar w-10 text-xl" style="color: #5270ff"></i>
                                        <span class='text-black'>{{ $lomba->tanggal_mulai->format('j F Y') }}</span>
                                    </div>
                                </div>


                            </div>
                            <!-- View Details Button selalu di bawah dengan margin yang lebih besar -->
                            <div class="absolute bottom-6 left-4 right-4">
                                <a href="{{ url('/lomba/' . $lomba->id) }}"
                                    class="block w-full py-3 text-center text-white font-medium bg-[#5270ff] border border-[#5270ff] rounded-3xl hover:bg-[#4560e6] hover:shadow-lg transition-all duration-300 transform hover:scale-105">
                                    More Detail <i class="fas fa-arrow-right ml-1"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                @if ($penyelenggara->lombas->where('tanggal_mulai', '>', now())->count() > 4)
                    <div class="text-center mt-8">
                        <a href="{{ route('lomba.index') }}?penyelenggara={{ $penyelenggara->id }}&status=upcoming"
                            class="inline-flex items-center justify-center px-6 py-3 bg-white text-blue-600 font-medium rounded-3xl border border-blue-600 hover:bg-blue-50 transition-colors">
                            Lihat Semua Lomba
                        </a>
                    </div>
                @endif
            </div>
        </section>
    @endif

    <!-- Past Competitions Section -->
    @php
        $pastLombas = $penyelenggara->lombas->where('tanggal_selesai', '<', now())->take(4);
    @endphp

    @if ($pastLombas->count() > 0)
        <section class="py-12 bg-gray-50">
            <div class="container mx-auto px-4">
                <h2 class="text-3xl font-bold text-gray-800 mb-8">Lomba Sebelumnya</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach ($pastLombas as $lomba)
                        <!-- Card container dengan tinggi yang lebih besar -->
                        <div
                            class="bg-white rounded-3xl overflow-hidden shadow-md border-2 border-blue-600 relative h-[800px] flex flex-col p-5 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 hover:border-[#5270ff]">


                            <!-- Poster Container dengan tinggi h-100 -->
                            <div class="w-full h-96 flex-shrink-0 overflow-hidden">
                                @if ($lomba->poster_url)
                                    <img src="{{ asset($lomba->poster_url) }}" alt="{{ $lomba->nama }}"
                                        class="w-full h-full rounded-lg transition-all duration-500">
                                    <div class="relative">
                                        <img src="{{ asset($lomba->poster_url) }}" alt="{{ $lomba->nama }}"
                                            class="w-full h-48 object-cover">
                                        <div
                                            class="absolute top-0 right-0 bg-gray-600 text-white text-xs font-bold px-3 py-1 m-2 rounded-full">
                                            Selesai
                                        </div>
                                    </div>
                                @else
                                    <div
                                        class="w-full h-full bg-gray-100 rounded-lg flex items-center justify-center hover:bg-gray-200 transition-colors duration-300">
                                        <span class="text-gray-400">
                                            <i class="fas fa-image text-4xl"></i>
                                        </span>
                                    </div>
                                @endif
                            </div>

                            <!-- Competition Content dengan lebih banyak space -->
                            <div class="pt-5 flex-1 flex flex-col relative">
                                <!-- Header content -->
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-800 mb-3">{{ $lomba->nama }}</h3>

                                    <!-- Tags -->
                                    {{-- <div class="flex flex-wrap gap-1 mb-4">
            @foreach ($lomba->pesertaKategori as $kategori)
                <span
                    class="text-xs text-blue-600 bg-blue-50 px-2 py-1 rounded hover:bg-blue-100 transition-colors duration-300">{{ $kategori->nama }}</span>
            @endforeach
        </div> --}}

                                    <!-- Category Tags -->
                                    <div class="flex flex-wrap gap-1 mb-4">
                                        @foreach ($lomba->categories as $category)
                                            <span
                                                class="text-xs text-white bg-blue-600 px-2 py-1 rounded hover:bg-blue-700 transition-colors duration-300">
                                                <i class="fas {{ $category->icon }}"></i>
                                                {{ $category->nama }}
                                            </span>
                                        @endforeach
                                    </div>
                                </div>

                                <!-- Info Items dengan spacing yang lebih lega -->
                                <div class="space-y-3 text-l mt-2">
                                    <div class="flex items-center">
                                        <i class="fas fa-user-graduate w-10 text-xl" style="color: #5270ff"></i>
                                        <span
                                            class='text-black'>{{ implode(', ', $lomba->pesertaKategori->pluck('nama')->toArray()) }}</span>
                                    </div>
                                    @if ($lomba->biaya_pendaftaran_individu > 0 && $lomba->biaya_pendaftaran_tim > 0)
                                        <div class="flex flex-col space-y-2">
                                            <div class="flex items-center">
                                                <i class="fas fa-money-bill-wave w-10 text-xl" style="color: #5270ff"></i>
                                                <span class='text-black'>Individu: Rp
                                                    {{ number_format($lomba->biaya_pendaftaran_individu, 0, ',', '.') }}</span>
                                            </div>
                                            <div class="flex items-center">
                                                <div class="w-10"></div>
                                                <span class='text-black'>Tim: Rp
                                                    {{ number_format($lomba->biaya_pendaftaran_tim, 0, ',', '.') }}</span>
                                            </div>
                                        </div>
                                    @elseif($lomba->biaya_pendaftaran_individu > 0)
                                        <div class="flex items-center">
                                            <i class="fas fa-money-bill-wave w-10 text-xl" style="color: #5270ff"></i>
                                            <span class='text-black'>Individu: Rp
                                                {{ number_format($lomba->biaya_pendaftaran_individu, 0, ',', '.') }}</span>
                                        </div>
                                    @elseif($lomba->biaya_pendaftaran_tim > 0)
                                        <div class="flex items-center">
                                            <i class="fas fa-money-bill-wave w-10 text-xl" style="color: #5270ff"></i>
                                            <span class='text-black'>Tim: Rp
                                                {{ number_format($lomba->biaya_pendaftaran_tim, 0, ',', '.') }}</span>
                                        </div>
                                    @else
                                        <div class="flex items-center">
                                            <i class="fas fa-money-bill-wave w-10 text-xl" style="color: #5270ff"></i>
                                            <span class='text-black'>Gratis</span>
                                        </div>
                                    @endif
                                    <div class="flex items-center">
                                        <i class="fas fa-map-marker-alt w-10 text-xl" style="color: #5270ff"></i>
                                        <span class='text-black'>{{ $lomba->provinsi->nama }}</span>
                                    </div>
                                    <div class="flex items-center">
                                        <i class="fas fa-calendar w-10 text-xl" style="color: #5270ff"></i>
                                        <span class='text-black'>{{ $lomba->tanggal_mulai->format('j F Y') }}</span>
                                    </div>
                                </div>


                            </div>
                            <!-- View Details Button selalu di bawah dengan margin yang lebih besar -->
                            <div class="absolute bottom-6 left-4 right-4">
                                <a href="{{ url('/lomba/' . $lomba->id) }}"
                                    class="block w-full py-3 text-center text-gray-600 font-medium bg-gray-100 rounded-3xl hover:bg-gray-200  hover:shadow-lg transition-all duration-300 transform hover:scale-105">
                                    More Detail <i class="fas fa-arrow-right ml-1"></i>
                                </a>
                            </div>
                    @endforeach
                </div>

                @if ($penyelenggara->lombas->where('tanggal_selesai', '<', now())->count() > 4)
                    <div class="text-center mt-8">
                        <a href="{{ route('lomba.index') }}?penyelenggara={{ $penyelenggara->id }}&status=past"
                            class="inline-flex items-center justify-center px-6 py-3 bg-white text-gray-600 font-medium rounded-3xl border border-gray-600 hover:bg-gray-50 transition-colors">
                            Lihat Arsip Lomba
                        </a>
                    </div>
                @endif
            </div>
        </section>
    @endif

    <!-- Contact Section -->
    {{-- <section class="py-16 text-black bg-blue-50">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-3xl font-bold mb-6">Tertarik Berkolaborasi?</h2>
                <p class="text-gray-600 mb-8">Hubungi {{ $penyelenggara->nama }} untuk informasi lebih lanjut atau kirim
                    pesan melalui Lombanesia untuk membantu proses kolaborasi Anda.</p>

                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="#"
                        class="inline-flex items-center justify-center px-6 py-3 bg-blue-600 text-white font-medium rounded-3xl hover:bg-blue-700 transition-colors">
                        <i class="far fa-envelope mr-2"></i> Kirim Pesan
                    </a>
                    <a href="{{ route('partner.lomba') }}"
                        class="inline-flex items-center justify-center px-6 py-3 bg-white text-blue-600 font-medium rounded-3xl border border-blue-600 hover:bg-blue-50 transition-colors">
                        <i class="fas fa-arrow-left mr-2"></i> Kembali ke Daftar Partner
                    </a>
                </div>
            </div>
        </div>
    </section> --}}
@endsection
