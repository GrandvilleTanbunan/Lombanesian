@extends('user.layout.app')

@section('title', $lomba->nama . ' - Lombanesia')

@section('styles')
    <style>
        /* Struktur container desktop */
        @media (min-width: 768px) {
            .detail-container {
                position: relative;
                display: flex;
                flex-direction: column;
                min-height: 400px;
                /* Minimal height untuk container */
            }

            .content-area {
                flex: 1;
                /* Konten mengisi ruang yang tersedia */
            }

            .organizer-footer {
                margin-top: auto;
                /* Push to bottom */
                border-top: 2px solid #5270ff;
                padding-top: 15px;
            }
        }

        /* Struktur container mobile - simpel dan langsung */
        .lomba-info {
            margin-bottom: 15px;
        }

        .organizer-footer {
            border-top: 2px solid #5270ff;
            padding-top: 15px;
            margin-top: 20px;
        }
    </style>
@endsection

@section('content')
    <div class="container mx-auto px-4 py-4">
        <!-- Back Button and Header -->
        <div class="flex items-center mb-4">
            <a href="{{ route('lomba.index') }}" class="text-blue-600 mr-2">
                <i class="fas fa-chevron-left"></i>
            </a>
            <h1 class="text-xl font-bold text-blue-600">Detail Lomba</h1>
        </div>

        <!-- Top Section -->
        <div class="bg-white rounded-lg shadow-sm overflow-hidden mb-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-0 md:gap-4 p-4">
                <!-- Left - Poster and Like/View buttons -->
                <div>
                    <div class="rounded-lg overflow-hidden shadow-sm border border-gray-200 mb-3">
                        <img src="{{ asset($lomba->poster_url) }}" alt="{{ $lomba->nama }}"
                            class="w-full h-auto object-cover">
                    </div>

                    <!-- Like/View Buttons -->
                    <div class="flex justify-between mt-3">
                        <button
                            class="flex-1 mr-2 flex items-center justify-center gap-2 px-4 py-3 bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100 transition-colors shadow-sm">
                            <i class="far fa-thumbs-up text-xl"></i>
                            <span class="font-medium text-sm sm:text-base">{{ $lomba->jumlah_like }} suka</span>
                        </button>
                        <button
                            class="flex-1 flex items-center justify-center gap-2 px-4 py-3 bg-gray-50 text-gray-600 rounded-lg hover:bg-gray-100 transition-colors shadow-sm">
                            <i class="far fa-eye text-xl"></i>
                            <span class="font-medium text-sm sm:text-base">{{ $lomba->jumlah_view }} dilihat</span>
                        </button>
                    </div>
                </div>

                <!-- Right - Competition Details, dengan footer di bawah -->
                <div class="col-span-2 detail-container ml-0 md:ml-8">
                    <div class="content-area">
                        <h2
                            class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold mb-2 border-[#5270ff] border-b-2 pb-3 text-[#5270ff] break-words">
                            {{ $lomba->nama }}</h2>
                        <div class="flex items-center mb-4 mt-5 flex-wrap gap-2">
                            <span
                                class="text-lg sm:text-xl md:text-xl lg:text-xl px-3 py-1 rounded-full bg-[#5270ff] text-white">
                                {{ $lomba->jenis_lomba == 0 ? 'Offline' : 'Online' }}
                            </span>

                            <!-- Category Badges -->
                            @foreach ($lomba->categories as $category)
                                <span
                                    class="text-lg sm:text-xl md:text-xl lg:text-xl px-3 py-1 rounded-full bg-[#ff7052] text-white">
                                    <i class="fas {{ $category->icon }}"></i>
                                    {{ $category->nama }}
                                </span>
                            @endforeach
                        </div>

                        <div class="space-y-7 text-base lomba-info">
                            @if ($lomba->pesertaKategori->count() > 0)
                                <div class="flex items-center text-gray-700">
                                    <i class="fas fa-user w-8 text-xl sm:text-2xl md:text-3xl" style="color: #5270ff"></i>
                                    <span class="pl-2 sm:pl-5 font-bold text-lg sm:text-xl md:text-2xl lg:text-3xl">
                                        {{ implode(', ', $lomba->pesertaKategori->pluck('nama')->toArray()) }}
                                    </span>
                                </div>
                            @endif
                            <div class="flex items-center text-gray-700">
                                @if ($lomba->biaya_pendaftaran_individu > 0 && $lomba->biaya_pendaftaran_tim > 0)
                                    <div class="flex flex-col space-y-2">
                                        <div class="flex items-center">
                                            <i class="fas fa-money-bill-wave w-8 text-xl sm:text-2xl md:text-3xl"
                                                style="color: #5270ff"></i>
                                            <span
                                                class='pl-2 sm:pl-5 font-bold text-lg sm:text-xl md:text-2xl lg:text-3xl'>Individu:
                                                Rp
                                                {{ number_format($lomba->biaya_pendaftaran_individu, 0, ',', '.') }}</span>
                                        </div>
                                        <div class="flex items-center">
                                            <div class="w-8"></div>
                                            <span
                                                class='pl-2 sm:pl-5 font-bold text-lg sm:text-xl md:text-2xl lg:text-3xl'>Tim:
                                                Rp {{ number_format($lomba->biaya_pendaftaran_tim, 0, ',', '.') }}</span>
                                        </div>
                                    </div>
                                @elseif($lomba->biaya_pendaftaran_individu > 0)
                                    <div class="flex items-center">
                                        <i class="fas fa-money-bill-wave w-8 text-xl sm:text-2xl md:text-3xl"
                                            style="color: #5270ff"></i>
                                        <span
                                            class='pl-2 sm:pl-5 font-bold text-lg sm:text-xl md:text-2xl lg:text-3xl'>Individu:
                                            Rp {{ number_format($lomba->biaya_pendaftaran_individu, 0, ',', '.') }}</span>
                                    </div>
                                @elseif($lomba->biaya_pendaftaran_tim > 0)
                                    <div class="flex items-center">
                                        <i class="fas fa-money-bill-wave w-8 text-xl sm:text-2xl md:text-3xl"
                                            style="color: #5270ff"></i>
                                        <span class='pl-2 sm:pl-5 font-bold text-lg sm:text-xl md:text-2xl lg:text-3xl'>Tim:
                                            Rp {{ number_format($lomba->biaya_pendaftaran_tim, 0, ',', '.') }}</span>
                                    </div>
                                @else
                                    <div class="flex items-center">
                                        <i class="fas fa-money-bill-wave w-8 text-xl sm:text-2xl md:text-3xl"
                                            style="color: #5270ff"></i>
                                        <span
                                            class='pl-2 sm:pl-5 font-bold text-lg sm:text-xl md:text-2xl lg:text-3xl'>Gratis</span>
                                    </div>
                                @endif
                            </div>
                            <div class="flex items-center text-gray-700">
                                <i class="fas fa-map-marker-alt w-8 text-xl sm:text-2xl md:text-3xl"
                                    style="color: #5270ff"></i>
                                <span class="pl-2 sm:pl-5 font-bold text-lg sm:text-xl md:text-2xl lg:text-3xl">
                                    {{ $lomba->provinsi->nama }}
                                </span>
                            </div>
                            <div class="flex items-center text-gray-700">
                                <i class="fas fa-calendar-day w-8 text-xl sm:text-2xl md:text-3xl"
                                    style="color: #5270ff"></i>
                                <div>
                                    <div class="pl-2 sm:pl-5 font-bold text-lg sm:text-xl md:text-2xl lg:text-3xl">
                                        {{ $lomba->tanggal_mulai->format('j M Y') }} -
                                        {{ $lomba->tanggal_selesai->format('j M Y') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Footer berada di bawah, untuk mobile dan desktop -->
                    <div class="organizer-footer">
                        <div class="flex items-center space-x-3 mb-3">
                            <img src="{{ asset($lomba->penyelenggara->logo_url) }}"
                                alt="{{ $lomba->penyelenggara->nama }}"
                                class="w-12 h-12 sm:w-16 sm:h-16 md:w-20 md:h-20 object-contain">
                            <div>
                                <p class="text-sm md:text-lg text-gray-500">Diselenggarakan Oleh:</p>
                                <p class="font-bold text-lg sm:text-xl md:text-2xl">{{ $lomba->penyelenggara->nama }}</p>
                            </div>
                        </div>

                        @auth
                            <a href="https://docs.google.com/forms/d/e/1FAIpQLSf7lL0xymUW9yeLSB-I3j0khhcSYaRTDtGjW0A3lM9EHuamDw/viewform?usp=dialog"
                                class="block w-full py-2 sm:py-3 text-center text-white font-bold bg-[#5270ff] rounded-3xl hover:bg-[#4560e6] transition-colors">
                                DAFTAR SEKARANG <i class="fas fa-arrow-right ml-1"></i>
                            </a>
                        @else
                            <a href="{{ route('login') }}"
                                class="block w-full py-2 sm:py-3 text-center text-white font-bold bg-[#5270ff] rounded-3xl hover:bg-[#4560e6] transition-colors">
                                LOGIN UNTUK DAFTAR <i class="fas fa-arrow-right ml-1"></i>
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabs Content - Detail Lomba -->
        <div class="bg-orange-50 rounded-lg shadow-sm overflow-hidden mb-6">
            <div class="p-4">
                <div class="mb-4">
                    <h3 class="text-lg font-bold text-gray-800 mb-2">Keterangan Lomba</h3>
                    <div class="prose max-w-none text-gray-700">
                        {!! nl2br(e($lomba->keterangan)) !!}
                    </div>
                </div>

                <div class="mb-4">
                    <h3 class="text-lg font-bold text-gray-800 mb-2">Persyaratan Peserta</h3>
                    <div class="prose max-w-none text-gray-700">
                        {!! nl2br(e($lomba->persyaratan)) !!}
                    </div>
                </div>

                <div class="mb-4">
                    <h3 class="text-lg font-bold text-gray-800 mb-2">Linimasa Kegiatan</h3>
                    <div class="prose max-w-none text-gray-700">
                        {!! nl2br(e($lomba->jadwal_kegiatan)) !!}
                    </div>
                </div>

                <div class="mb-4">
                    <h3 class="text-lg font-bold text-gray-800 mb-2">Hadiah Pemenang</h3>
                    <div class="prose max-w-none text-gray-700">
                        {!! nl2br(e($lomba->hadiah)) !!}
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-wrap justify-between p-4 bg-white border-t border-gray-200">
                <button class="flex items-center text-blue-600 mb-2 sm:mb-0">
                    <i class="fas fa-exclamation-circle mr-2"></i> Laporkan Lomba!
                </button>
                <div class="flex flex-wrap gap-2 action-buttons">
                    <button class="px-3 sm:px-4 py-1 bg-[#5270ff] text-white rounded-3xl text-sm">PANDUAN</button>
                    <button class="px-3 sm:px-4 py-1 bg-[#5270ff] text-white rounded-3xl text-sm">SIMPAN</button>
                    <button class="px-3 sm:px-4 py-1 bg-[#5270ff] text-white rounded-3xl text-sm">BAGIKAN</button>
                </div>
            </div>
        </div>

        <!-- Profile Penyelenggara -->
        <div class="bg-white rounded-lg shadow-sm overflow-hidden mb-6">
            <div class="p-4">
                <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                    <i class="fas fa-building mr-2 text-[#5270ff]"></i>
                    Profile Penyelenggara
                </h3>

                <!-- Desktop layout: side by side -->
                <div
                    class="hidden md:flex items-start border border-blue-100 rounded-lg p-6 bg-gradient-to-r from-blue-50 to-white">
                    <div class="w-1/3 flex flex-col items-center pr-6 border-r border-blue-100">
                        <img src="{{ asset($lomba->penyelenggara->logo_url) }}" alt="{{ $lomba->penyelenggara->nama }}"
                            class="w-40 h-40 object-contain mb-4">
                        <h4 class="text-2xl font-bold text-[#5270ff] text-center">{{ $lomba->penyelenggara->nama }}</h4>
                    </div>

                    <div class="w-2/3 pl-6">
                        <h5 class="font-semibold text-xl mb-3 text-[#5270ff] border-b border-blue-100 pb-2">Tentang
                            Penyelenggara</h5>
                        <p class="text-gray-700 text-lg leading-relaxed">
                            {{-- {{ $lomba->penyelenggara->tentang }} --}}
                            {!! nl2br(e($lomba->penyelenggara->tentang)) !!}
                        </p>

                        <!-- Additional organizer info if available -->
                        <div class="mt-4 flex flex-wrap gap-4">
                            <a href="{{ $lomba->penyelenggara->website }}"
                                class="inline-flex items-center text-blue-600 hover:text-blue-800">
                                <i class="fas fa-globe mr-2"></i> Website
                            </a>
                            {{-- <a href="#" class="inline-flex items-center text-blue-600 hover:text-blue-800">
                                <i class="fas fa-envelope mr-2"></i> Kontak
                            </a>
                            <a href="#" class="inline-flex items-center text-blue-600 hover:text-blue-800">
                                <i class="fas fa-th-list mr-2"></i> Lomba Lainnya
                            </a> --}}
                        </div>
                    </div>
                </div>

                <!-- Mobile layout: stacked -->
                <div class="md:hidden border border-blue-100 rounded-lg bg-gradient-to-b from-blue-50 to-white">
                    <!-- Header with logo -->
                    <div class="p-4 flex items-center border-b border-blue-100">
                        <img src="{{ asset($lomba->penyelenggara->logo_url) }}" alt="{{ $lomba->penyelenggara->nama }}"
                            class="w-16 h-16 object-contain mr-4">
                        <h4 class="text-xl font-bold text-[#5270ff]">{{ $lomba->penyelenggara->nama }}</h4>
                    </div>

                    <!-- Content -->
                    <div class="p-4">
                        <h5 class="font-semibold text-lg mb-2 text-[#5270ff]">Tentang Kami</h5>
                        <p class="text-gray-700 text-base">
                            {{-- {{ $lomba->penyelenggara->tentang }} --}}
                            {!! nl2br(e($lomba->penyelenggara->tentang)) !!}

                        </p>

                        <!-- Action buttons for mobile -->
                        <div class="mt-4 grid grid-cols-3 gap-2">
                            <a href="#" class="bg-blue-50 py-2 rounded-lg flex flex-col items-center text-blue-600">
                                <i class="fas fa-globe text-lg"></i>
                                <span class="text-xs mt-1">Website</span>
                            </a>
                            <a href="#" class="bg-blue-50 py-2 rounded-lg flex flex-col items-center text-blue-600">
                                <i class="fas fa-envelope text-lg"></i>
                                <span class="text-xs mt-1">Kontak</span>
                            </a>
                            <a href="#" class="bg-blue-50 py-2 rounded-lg flex flex-col items-center text-blue-600">
                                <i class="fas fa-th-list text-lg"></i>
                                <span class="text-xs mt-1">Lainnya</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mentors Section -->
        @if ($lomba->mentors->count() > 0)
            <div class="bg-white rounded-lg shadow-sm overflow-hidden mb-6">
                <div class="p-4">
                    <h3 class="text-3xl font-bold text-[#5270ff] mb-4 text-center">Mentor Terkait</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach ($lomba->mentors as $mentor)
                            <div class="bg-gray-50 rounded-lg p-4 flex items-center space-x-4">
                                <img src="{{ asset($mentor->foto_url) }}" alt="{{ $mentor->nama_lengkap }}"
                                    class="w-12 h-12 sm:w-16 sm:h-16 rounded-full object-cover">
                                <div>
                                    <h4 class="font-semibold">{{ $mentor->nama_lengkap }}</h4>
                                    <p class="text-sm text-gray-600">{{ $mentor->program_studi }},
                                        {{ $mentor->universitas }}</p>
                                    <a href="{{ route('tutor.profile', $mentor->id) }}"
                                        class="text-blue-600 text-sm hover:underline">Lihat Profil</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        <!-- Related Competitions -->
        <div class="bg-white rounded-lg shadow-sm overflow-hidden mb-6 p-0 md:p-5">
            <h3 class="text-3xl font-bold text-[#5270ff] mb-4 text-center">Lomba Serupa</h3>

            <div class="p-4 max-w-full md:max-w-7xl mx-auto">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
                    @php
                        $relatedLombas = \App\Models\Lomba::where('id', '!=', $lomba->id)
                            ->where(function ($query) use ($lomba) {
                                return $query
                                    ->where('penyelenggara_id', $lomba->penyelenggara_id)
                                    ->orWhere('provinsi_id', $lomba->provinsi_id);
                            })
                            ->take(3)
                            ->get();
                    @endphp

                    @foreach ($relatedLombas as $lomba)
                        <!-- Card container dengan tinggi yang lebih besar -->
                        <div
                            class="bg-white rounded-3xl overflow-hidden shadow-md border-2 border-blue-600 relative h-[800px] flex flex-col p-5 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 hover:border-[#5270ff]">
                            <!-- Bookmark Button -->
                            <button
                                class="absolute top-2 right-2 w-8 h-8 bg-white rounded-full shadow-sm flex items-center justify-center text-gray-400 hover:text-[#5270ff] transition-colors bookmark-btn z-10">
                                <i class="fas fa-bookmark"></i>
                            </button>

                            <!-- Poster Container dengan tinggi h-100 -->
                            <div class="w-full h-96 flex-shrink-0 overflow-hidden">
                                @if ($lomba->poster_url)
                                    <img src="{{ asset($lomba->poster_url) }}" alt="{{ $lomba->nama }}"
                                        class="w-full h-full rounded-lg transition-all duration-500">
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
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            // Subtle hover effects without zoom
            $('.btn, .rounded-md').hover(
                function() {
                    $(this).css('opacity', '0.9');
                },
                function() {
                    $(this).css('opacity', '1');
                }
            );

            // Like button functionality
            $('.fa-thumbs-up').parent('button').click(function() {
                $(this).find('i').toggleClass('far fas');
                let currentLikes = parseInt($(this).find('span').text());
                let newLikes = $(this).find('i').hasClass('fas') ? currentLikes + 1 : currentLikes - 1;
                $(this).find('span').text(newLikes + ' suka');

                // AJAX to update like count
                $.ajax({
                    url: '/lomba/like/' + {{ $lomba->id }},
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            });

            // Bookmark functionality
            $('.fa-bookmark').parent('button').click(function() {
                $(this).find('i').toggleClass('far fas');
                // AJAX to save bookmark
                $.ajax({
                    url: '/lomba/bookmark/' + {{ $lomba->id }},
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            });

            // Increment view count
            $.ajax({
                url: '/lomba/view/' + {{ $lomba->id }},
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
    </script>
@endpush
