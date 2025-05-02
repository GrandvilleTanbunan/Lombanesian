@extends('user.layout.app')

@section('title', $mentor->nama_lengkap . ' - Profile Tutor - Lombanesia')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/tutor-profile.css') }}">

    <style>
        /* Highlight style untuk kalender */
        .highlight-schedule {
            animation: highlight-pulse 2s ease-in-out;
        }

        @keyframes highlight-pulse {
            0% {
                background-color: rgba(59, 130, 246, 0);
            }

            50% {
                background-color: rgba(59, 130, 246, 0.1);
            }

            100% {
                background-color: rgba(59, 130, 246, 0);
            }
        }

        /* Style untuk hover pada tanggal dengan jadwal */
        #calendar-grid .group:has(.bg-green-500) {
            cursor: pointer;
        }

        #calendar-grid .group:has(.bg-green-500):hover .w-9.h-9 {
            background-color: #f0f9ff;
            transform: scale(1.1);
            transition: transform 0.2s ease;
        }

        /* Menambahkan style untuk foto mentor yang lebih kecil */
        .mentor-photo {
            max-height: 250px;
            object-fit: cover;
            width: 100%;
        }

        /* Style untuk calendar container */
        .calendar-schedule-container {
            background-color: #f8fafc;
            border-radius: 0.5rem;
            padding: 1.5rem;
            margin-top: 2rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .calendar-schedule-container h2 {
            text-align: center;
            margin-bottom: 1.5rem;
            color: #1e40af;
            font-size: 1.5rem;
            font-weight: 700;
        }

        .calendar-schedule-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
        }

        @media (min-width: 768px) {
            .calendar-schedule-grid {
                grid-template-columns: 1fr 1fr;
            }
        }
    </style>
@endpush

@section('content')

    <!-- Hero Section -->
    <section class="bg-gradient-to-b from-blue-50 to-blue-100 py-8 w-full">
        <div class="container max-w-7xl w-full mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center gap-8">
                <!-- Foto mentor yang lebih kecil -->
                <div class="md:w-1/4">
                    <div class="rounded-lg overflow-hidden shadow-lg profile-section">
                        <img src="{{ asset($mentor->foto_url) }}" alt="{{ $mentor->nama_lengkap }}" class="mentor-photo">
                    </div>
                </div>
                <div class="md:w-3/4">
                    <h1 class="text-blue-600 text-3xl font-bold mb-2">{{ $mentor->nama_lengkap }}</h1>
                    <div class="flex items-center text-gray-600 mb-3">
                        <i class="fas fa-graduation-cap mr-2"></i>
                        <span>{{ $mentor->program_studi }}</span>
                    </div>
                    <div class="flex items-center text-gray-600 mb-3">
                        <i class="fas fa-university mr-2"></i>
                        <span>{{ $mentor->universitas }}</span>
                    </div>
                    <div class="flex items-center text-gray-600 mb-4">
                        <i class="fas fa-money-bill-wave mr-2"></i>
                        <span class="font-semibold text-blue-600">Rp {{ number_format($mentor->tarif, 0, ',', '.') }} /
                            sesi</span>
                    </div>
                    <div class="flex flex-wrap gap-3">
                        <a href="#jadwal"
                            class="px-6 py-2 bg-blue-600 text-white rounded-full hover:bg-blue-700 transition-colors">
                            <i class="far fa-calendar-alt mr-2"></i>Lihat Jadwal
                        </a>
                        <a href="https://docs.google.com/forms/d/e/1FAIpQLSdBoE6bmSjsJwB8hEd2vrq4x20RuFp-Dmchd_nIbk6pscj8GA/viewform?usp=dialog"
                            target="_blank"
                            class="px-6 py-2 bg-green-600 text-white rounded-full hover:bg-green-700 transition-colors">
                            <i class="fab fa-whatsapp mr-2"></i>Hubungi via Form
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="max-w-7xl w-full mx-auto px-4">

        <!-- Social Share Buttons -->
        <div class="container mx-auto px-4 py-4">
            <div class="flex flex-wrap justify-center items-center gap-2 sm:gap-4">
                <span class="text-gray-600 text-sm">Bagikan profil mentor:</span>

                <!-- WhatsApp -->
                <a href="https://wa.me/?text=Lihat profil mentor {{ urlencode($mentor->nama_lengkap) }} - {{ urlencode(request()->url()) }}"
                    target="_blank"
                    class="flex items-center justify-center px-3 py-2 bg-green-500 hover:bg-green-600 text-white rounded-lg transition-colors">
                    <i class="fab fa-whatsapp mr-1"></i>
                    <span class="text-sm hidden sm:inline">WhatsApp</span>
                </a>

                <!-- Twitter -->
                <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text=Lihat profil mentor {{ urlencode($mentor->nama_lengkap) }} di Lombanesia"
                    target="_blank"
                    class="flex items-center justify-center px-3 py-2 bg-blue-400 hover:bg-blue-500 text-white rounded-lg transition-colors">
                    <i class="fab fa-twitter mr-1"></i>
                    <span class="text-sm hidden sm:inline">Twitter</span>
                </a>

                <!-- Facebook -->
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank"
                    class="flex items-center justify-center px-3 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors">
                    <i class="fab fa-facebook-f mr-1"></i>
                    <span class="text-sm hidden sm:inline">Facebook</span>
                </a>

                <!-- Telegram -->
                <a href="https://t.me/share/url?url={{ urlencode(request()->url()) }}&text=Lihat profil mentor {{ urlencode($mentor->nama_lengkap) }} di Lombanesia"
                    target="_blank"
                    class="flex items-center justify-center px-3 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg transition-colors">
                    <i class="fab fa-telegram-plane mr-1"></i>
                    <span class="text-sm hidden sm:inline">Telegram</span>
                </a>

                <!-- Copy Link -->
                <button type="button" onclick="copyProfileLink()"
                    class="flex items-center justify-center px-3 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-lg transition-colors">
                    <i class="fas fa-link mr-1"></i>
                    <span class="text-sm hidden sm:inline">Salin Link</span>
                </button>
            </div>
        </div>

        <!-- Main Content -->
        <section class="py-10">
            <div class="container mx-auto px-4">
                <div class="space-y-8">
                    <!-- Prestasi Section -->
                    <div class="bg-white rounded-lg shadow-md p-6 profile-section">
                        <h2 class="text-2xl font-bold text-gray-800 mb-4">Prestasi</h2>
                        <div class="space-y-4">
                            @foreach (explode("\n", $mentor->prestasi_lomba) as $prestasi)
                                @if (!empty(trim($prestasi)))
                                    <div
                                        class="flex items-start hover:bg-blue-50 p-2 rounded-lg transition-colors duration-200">
                                        <i class="fas fa-trophy text-yellow-500 mt-1 mr-3"></i>
                                        <p>{{ $prestasi }}</p>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    <!-- Lomba Experience Section -->
                    <div class="bg-white rounded-lg shadow-md p-6 profile-section">
                        <h2 class="text-2xl font-bold text-gray-800 mb-4">Pengalaman Lomba</h2>

                        @if ($mentor->lombas->count() > 0)
                            <div class="space-y-4">
                                @foreach ($mentor->lombas as $lomba)
                                    <div
                                        class="flex flex-col sm:flex-row gap-4 border-b border-gray-200 pb-4 hover:bg-blue-50 p-3 rounded-lg transition-colors duration-200">
                                        <div class="sm:w-1/4">
                                            <img src="{{ asset($lomba->poster_url) }}" alt="{{ $lomba->nama }}"
                                                class="w-full h-32 object-cover rounded-lg shadow-sm">
                                        </div>
                                        <div class="sm:w-3/4">
                                            <h3 class="text-lg font-semibold text-blue-600">{{ $lomba->nama }}</h3>
                                            <p class="text-gray-600 text-sm mb-2">
                                                <i class="fas fa-calendar-alt mr-1"></i>
                                                {{ $lomba->tanggal_mulai->format('d M Y') }} -
                                                {{ $lomba->tanggal_selesai->format('d M Y') }}
                                            </p>
                                            <p class="text-gray-700 line-clamp-2 cursor-pointer">
                                                {{ Str::limit($lomba->keterangan, 150) }}</p>
                                            <a href="{{ route('lomba.detail', $lomba->id) }}"
                                                class="text-blue-600 hover:text-blue-800 inline-block mt-2 hover:underline">
                                                Lihat Detail <i class="fas fa-chevron-right text-xs ml-1"></i>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-gray-500 italic">Tidak ada pengalaman lomba yang terdaftar.</div>
                        @endif
                    </div>

                    <!-- Calendar & Schedule Section (DIPINDAHKAN KE BAWAH) -->
                    <div id="jadwal" class="calendar-schedule-container">
                        {{-- <h2>Jadwal Ketersediaan Mentor</h2> --}}

                        <div class="calendar-schedule-grid">
                            <!-- Mini Calendar -->
                            <div class="bg-white rounded-lg shadow-md p-6">
                                <h3 class="text-xl font-bold text-gray-800 mb-4">Kalender Ketersediaan</h3>

                                <div class="calendar-container">
                                    <div class="flex items-center justify-between mb-4">
                                        <h3 class="text-lg font-medium text-gray-800">
                                            {{ \Carbon\Carbon::now()->format('F Y') }}</h3>
                                        <div class="flex space-x-2">
                                            <button type="button"
                                                class="w-8 h-8 flex items-center justify-center rounded-full hover:bg-gray-100"
                                                id="prev-month-btn">
                                                <i class="fas fa-chevron-left text-gray-600"></i>
                                            </button>
                                            <button type="button"
                                                class="w-8 h-8 flex items-center justify-center rounded-full hover:bg-gray-100"
                                                id="next-month-btn">
                                                <i class="fas fa-chevron-right text-gray-600"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <!-- Calendar -->
                                    <div class="grid grid-cols-7 gap-1" id="calendar-grid">
                                        <!-- Days of week -->
                                        @foreach (['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'] as $dayName)
                                            <div
                                                class="h-8 flex items-center justify-center text-xs font-medium text-gray-500">
                                                {{ $dayName }}
                                            </div>
                                        @endforeach

                                        <!-- JavaScript will add calendar days here -->
                                    </div>

                                    <div class="flex items-center justify-center mt-4 space-x-4 text-xs">
                                        <div class="flex items-center">
                                            <span class="w-3 h-3 rounded-full bg-blue-600 mr-1"></span>
                                            <span class="text-gray-600">Hari Ini</span>
                                        </div>
                                        <div class="flex items-center">
                                            <span
                                                class="w-3 h-3 rounded-full border border-gray-400 flex items-center justify-center mr-1">
                                                <span class="w-1 h-1 rounded-full bg-green-500"></span>
                                            </span>
                                            <span class="text-gray-600">Ada Jadwal</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Schedule Section -->
                            <div class="bg-white rounded-lg shadow-md p-6">
                                <h3 class="text-xl font-bold text-gray-800 mb-4">Jadwal Tersedia</h3>

                                <!-- Fitur Pencarian Jadwal -->
                                <div class="flex flex-col items-start justify-between mb-6 gap-3">
                                    {{-- <div class="relative w-full">
                                <input type="text" id="schedule-search" placeholder="Cari berdasarkan tanggal..." class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-search text-gray-400"></i>
                                </div>
                            </div> --}}

                                    <div class="flex items-center space-x-2 text-sm self-end">
                                        <span class="text-gray-600">Filter:</span>
                                        <button
                                            class="filter-btn px-3 py-1 rounded-full bg-gray-100 hover:bg-gray-200 transition-colors active"
                                            data-filter="all">Semua</button>
                                        <button
                                            class="filter-btn px-3 py-1 rounded-full bg-gray-100 hover:bg-gray-200 transition-colors"
                                            data-filter="available">Tersedia</button>
                                        <button
                                            class="filter-btn px-3 py-1 rounded-full bg-gray-100 hover:bg-gray-200 transition-colors"
                                            data-filter="unavailable">Terisi</button>
                                    </div>
                                </div>

                                @if (count($schedulesGrouped) > 0)
                                    <div class="space-y-6 max-h-96 overflow-y-auto pr-2">
                                        @foreach ($schedulesGrouped as $date => $schedules)
                                            <div class="border-b border-gray-200 pb-4" data-date="{{ $date }}">
                                                <h3 class="text-lg font-semibold mb-3 flex items-center">
                                                    <span
                                                        class="w-10 h-10 bg-blue-100 text-blue-700 rounded-full flex items-center justify-center mr-3">
                                                        {{ \Carbon\Carbon::parse($date)->format('d') }}
                                                    </span>
                                                    <div>
                                                        <span
                                                            class="text-blue-600">{{ \Carbon\Carbon::parse($date)->format('l') }}</span>
                                                        <div class="text-sm font-normal text-gray-500">
                                                            {{ \Carbon\Carbon::parse($date)->format('d M Y') }}</div>
                                                    </div>
                                                </h3>
                                                <div class="grid grid-cols-1 gap-3">
                                                    @foreach ($schedules as $schedule)
                                                        <div class="rounded-lg p-3 relative overflow-hidden transition-all duration-300 hover:shadow-md schedule-tooltip
                                                        {{ $schedule->is_available ? 'border-l-4 border-l-green-500' : 'border-l-4 border-l-red-500' }}"
                                                            data-tooltip="{{ $schedule->is_available ? 'Klik untuk memilih jadwal ini' : 'Jadwal ini sudah terisi' }}">
                                                            <div class="flex justify-between items-center">
                                                                <div class="flex items-center">
                                                                    <div
                                                                        class="bg-gray-100 w-10 h-10 rounded-full flex items-center justify-center mr-3">
                                                                        <i class="far fa-clock text-gray-600"></i>
                                                                    </div>
                                                                    <div>
                                                                        <div class="font-semibold">
                                                                            {{ $schedule->waktu_mulai->format('H:i') }} -
                                                                            {{ $schedule->waktu_selesai->format('H:i') }}
                                                                        </div>
                                                                        <div class="text-xs text-gray-500">
                                                                            Durasi:
                                                                            {{ $schedule->waktu_mulai->diffInHours($schedule->waktu_selesai) }}
                                                                            jam
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    @if ($schedule->is_available)
                                                                        <span
                                                                            class="px-3 py-1 bg-green-100 text-green-800 text-xs rounded-full flex items-center">
                                                                            <span
                                                                                class="w-2 h-2 bg-green-500 rounded-full mr-2"></span>
                                                                            Tersedia
                                                                        </span>
                                                                    @else
                                                                        <span
                                                                            class="px-3 py-1 bg-red-100 text-red-800 text-xs rounded-full flex items-center">
                                                                            <span
                                                                                class="w-2 h-2 bg-red-500 rounded-full mr-2"></span>
                                                                            Terisi
                                                                        </span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="absolute bottom-0 left-0 w-full h-1 {{ $schedule->is_available ? 'bg-gradient-to-r from-green-300 to-green-100' : 'bg-gradient-to-r from-red-300 to-red-100' }}">
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="mt-6">
                                        <a href="https://docs.google.com/forms/d/e/1FAIpQLSdBoE6bmSjsJwB8hEd2vrq4x20RuFp-Dmchd_nIbk6pscj8GA/viewform?usp=dialog"
                                            target="_blank"
                                            class="block text-center w-full py-3 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition-colors">
                                            <i class="far fa-calendar-check mr-2"></i>Jadwalkan Konsultasi
                                        </a>
                                    </div>
                                @else
                                    <div class="rounded-lg border-2 border-dashed border-gray-300 p-8 text-center">
                                        <div
                                            class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                            <i class="far fa-calendar-times text-gray-400 text-2xl"></i>
                                        </div>
                                        <h3 class="text-gray-500 font-medium mb-1">Belum Ada Jadwal Tersedia</h3>
                                        <p class="text-gray-400 text-sm">Mentor belum mengatur jadwal konsultasi untuk saat
                                            ini.</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Mentor Lainnya Section -->
        <section class="py-8 bg-gray-50">
            <div class="container mx-auto px-4">
                <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Mentor Lainnya Yang Mungkin Anda Minati</h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @php
                        // Query sederhana untuk menghindari error
                        $otherMentors = \App\Models\Mentor::where('id', '!=', $mentor->id)
                            ->inRandomOrder()
                            ->take(4)
                            ->get();
                    @endphp

                    @foreach ($otherMentors as $otherMentor)
                        <div
                            class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                            <div class="relative h-96">
                                <img src="{{ asset($otherMentor->foto_url) }}" alt="{{ $otherMentor->nama_lengkap }}"
                                    class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent flex items-end">
                                    <div class="p-4 text-white">
                                        <h3 class="text-lg font-bold">{{ $otherMentor->nama_lengkap }}</h3>
                                        <p class="text-sm text-white/80">{{ $otherMentor->program_studi }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="p-4">
                                <div class="flex items-center text-gray-600 mb-2">
                                    <i class="fas fa-university w-6"></i>
                                    <span class="text-sm">{{ $otherMentor->universitas }}</span>
                                </div>

                                <div class="flex items-center text-gray-600 mb-3">
                                    <i class="fas fa-money-bill-wave w-6"></i>
                                    <span class="font-semibold text-blue-600">Rp
                                        {{ number_format($otherMentor->tarif, 0, ',', '.') }}</span>
                                </div>

                                <a href="{{ route('tutor.profile', $otherMentor->id) }}"
                                    class="block w-full py-2 text-center text-white font-medium bg-blue-600 rounded-full hover:bg-blue-700 transition-colors">
                                    Lihat Profil
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>


    <!-- JavaScript untuk data kalender -->
    <script>
        // Data untuk kalender
        window.availableScheduleDates = [
            @foreach ($schedulesGrouped as $date => $schedules)
                {
                    date: "{{ $date }}",
                    count: {{ count($schedules) }},
                    availableCount: {{ count(array_filter($schedules, function ($s) {return $s->is_available;})) }}
                },
            @endforeach
        ];

        // Fungsi copy link
        function copyProfileLink() {
            const profileUrl = '{{ request()->url() }}';

            // Membuat elemen textarea sementara
            const tempTextArea = document.createElement('textarea');
            tempTextArea.value = profileUrl;
            tempTextArea.setAttribute('readonly', '');
            tempTextArea.style.position = 'absolute';
            tempTextArea.style.left = '-9999px';
            document.body.appendChild(tempTextArea);

            // Select dan copy
            tempTextArea.select();
            document.execCommand('copy');

            // Hapus elemen sementara
            document.body.removeChild(tempTextArea);

            // Tampilkan notifikasi
            alert('Link profil mentor berhasil disalin!');
        }
    </script>
@endsection

@push('scripts')
    <!-- Script untuk kalender mentor - disatukan dalam satu file -->
    <script>
        // Data jadwal tersedia yang digunakan oleh JavaScript kalender
        window.availableScheduleDates = [
            @foreach ($schedulesGrouped as $date => $schedules)
                {
                    date: "{{ $date }}",
                    count: {{ count($schedules) }},
                    availableCount: {{ count(array_filter($schedules, function ($s) {return $s->is_available;})) }}
                },
            @endforeach
        ];

        // Debugging untuk memastikan data terkirim dengan benar
        console.log("Schedule data loaded:", window.availableScheduleDates);

        // Fungsi copy link profil (dipanggil dari tombol "Salin Link")
        function copyProfileLink() {
            const profileUrl = '{{ request()->url() }}';

            // Membuat elemen textarea sementara
            const tempTextArea = document.createElement('textarea');
            tempTextArea.value = profileUrl;
            tempTextArea.setAttribute('readonly', '');
            tempTextArea.style.position = 'absolute';
            tempTextArea.style.left = '-9999px';
            document.body.appendChild(tempTextArea);

            // Select dan copy
            tempTextArea.select();
            document.execCommand('copy');

            // Hapus elemen sementara
            document.body.removeChild(tempTextArea);

            // Tampilkan notifikasi
            alert('Link profil mentor berhasil disalin!');
        }
    </script>

    <!-- Load file mentor-calendar.js dari direktori publik -->
    <script src="{{ asset('js/mentor-calendar.js') }}"></script>
@endpush
