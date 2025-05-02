@extends('user.layout.app')

@section('title', 'Daftar Lomba - Lombanesia')

@section('content')
    <!-- Hero Section -->
    <section class="bg-gradient-to-b from-blue-50 to-blue-100 py-8">
        <div class="container mx-auto px-4">
            <h1 class="text-blue-600 text-4xl font-bold mb-4 text-center">Daftar Lomba</h1>

            <!-- Advanced Filter -->
            <form action="{{ route('lomba.index') }}" method="GET" id="filter-form">
                <div class="bg-white rounded-xl shadow-md p-6 mt-6">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                        <!-- Search -->
                        <div class="col-span-1 sm:col-span-2">
                            <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Kata Kunci</label>
                            <div class="relative">
                                <input type="text" id="search" name="search" placeholder="Cari lomba..."
                                    value="{{ request('search') }}"
                                    class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-search text-gray-400"></i>
                                </div>
                            </div>
                        </div>

                        <!-- Location -->
                        <div>
                            <label for="location" class="block text-sm font-medium text-gray-700 mb-1">Lokasi</label>
                            <select id="location" name="location"
                                class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 appearance-none bg-white">
                                <option value="">Semua Lokasi</option>
                                @foreach ($provinsis as $provinsi)
                                    <option value="{{ $provinsi->id }}" {{ request('location') == $provinsi->id ? 'selected' : '' }}>
                                        {{ $provinsi->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Category -->
                        <div>
                            <label for="category" class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                            <select id="category" name="category"
                                class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 appearance-none bg-white">
                                <option value="">Semua Kategori</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                        {{ $category->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mt-4">
                        <!-- Participant Type -->
                        <div>
                            <label for="participant-type" class="block text-sm font-medium text-gray-700 mb-1">Tipe
                                Peserta</label>
                            <select id="participant-type" name="participant_type"
                                class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 appearance-none bg-white">
                                <option value="">Semua Tipe</option>
                                @foreach ($pesertaKategoris as $pesertaKategori)
                                    <option value="{{ $pesertaKategori->id }}" {{ request('participant_type') == $pesertaKategori->id ? 'selected' : '' }}>
                                        {{ $pesertaKategori->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Price Range -->
                        <div>
                            <label for="price-range" class="block text-sm font-medium text-gray-700 mb-1">Kisaran Harga</label>
                            <select id="price-range" name="price_range"
                                class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 appearance-none bg-white">
                                <option value="">Semua Harga</option>
                                <option value="free" {{ request('price_range') == 'free' ? 'selected' : '' }}>Gratis</option>
                                <option value="1-50000" {{ request('price_range') == '1-50000' ? 'selected' : '' }}>Rp 1 - Rp 50.000</option>
                                <option value="50001-100000" {{ request('price_range') == '50001-100000' ? 'selected' : '' }}>Rp > 50.000 - Rp 100.000</option>
                                <option value="100001-500000" {{ request('price_range') == '100001-500000' ? 'selected' : '' }}>Rp > 100.000 - Rp 500.000</option>
                                <option value="500001+" {{ request('price_range') == '500001+' ? 'selected' : '' }}>Lebih dari Rp 500.000</option>
                            </select>
                        </div>

                        <!-- Date Range -->
                        <div>
                            <label for="start-date" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Mulai</label>
                            <input type="date" id="start-date" name="start_date" value="{{ request('start_date') }}"
                                class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <!-- Sort By -->
                        <div>
                            <label for="sort-by" class="block text-sm font-medium text-gray-700 mb-1">Urutkan
                                Berdasarkan</label>
                            <select id="sort-by" name="sort_by"
                                class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 appearance-none bg-white">
                                <option value="latest" {{ request('sort_by') == 'latest' ? 'selected' : '' }}>Terbaru</option>
                                <option value="popular" {{ request('sort_by') == 'popular' ? 'selected' : '' }}>Terpopuler</option>
                                <option value="price_low" {{ request('sort_by') == 'price_low' ? 'selected' : '' }}>Harga Terendah</option>
                                <option value="price_high" {{ request('sort_by') == 'price_high' ? 'selected' : '' }}>Harga Tertinggi</option>
                                <option value="date_soon" {{ request('sort_by') == 'date_soon' ? 'selected' : '' }}>Tanggal Terdekat</option>
                            </select>
                        </div>
                    </div>

                    <div class="flex justify-center mt-6">
                        <button type="submit"
                            class="px-6 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <i class="fas fa-filter mr-2"></i> Filter Hasil
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <!-- Competitions Listing -->
    <section class="py-10">
        <div class="container mx-auto px-4">
            <!-- Result Count & Active Filters -->
            <div class="flex flex-wrap items-center justify-between mb-6">
                <p class="text-gray-600">Menampilkan {{ $lombas->count() }} dari {{ $lombas->total() }} lomba</p>

                <div class="flex flex-wrap gap-2">
                    <!-- Active filters -->
                    @if (isset($activeFilters['search']))
                        <div class="px-3 py-1 bg-blue-50 text-blue-600 rounded-full text-sm flex items-center">
                            Pencarian: {{ $activeFilters['search'] }}
                            <a href="{{ route('lomba.index', array_merge(request()->except('search'))) }}" class="ml-2 text-blue-400 hover:text-blue-600">
                                <i class="fas fa-times"></i>
                            </a>
                        </div>
                    @endif

                    @if (isset($activeFilters['location']))
                        <div class="px-3 py-1 bg-blue-50 text-blue-600 rounded-full text-sm flex items-center">
                            Lokasi: {{ $activeFilters['location']['name'] }}
                            <a href="{{ route('lomba.index', array_merge(request()->except('location'))) }}" class="ml-2 text-blue-400 hover:text-blue-600">
                                <i class="fas fa-times"></i>
                            </a>
                        </div>
                    @endif

                    @if (isset($activeFilters['category']))
                        <div class="px-3 py-1 bg-blue-50 text-blue-600 rounded-full text-sm flex items-center">
                            Kategori: {{ $activeFilters['category']['name'] }}
                            <a href="{{ route('lomba.index', array_merge(request()->except('category'))) }}" class="ml-2 text-blue-400 hover:text-blue-600">
                                <i class="fas fa-times"></i>
                            </a>
                        </div>
                    @endif

                    @if (isset($activeFilters['participant_type']))
                        <div class="px-3 py-1 bg-blue-50 text-blue-600 rounded-full text-sm flex items-center">
                            Peserta: {{ $activeFilters['participant_type']['name'] }}
                            <a href="{{ route('lomba.index', array_merge(request()->except('participant_type'))) }}" class="ml-2 text-blue-400 hover:text-blue-600">
                                <i class="fas fa-times"></i>
                            </a>
                        </div>
                    @endif

                    @if (isset($activeFilters['price_range']))
                        <div class="px-3 py-1 bg-blue-50 text-blue-600 rounded-full text-sm flex items-center">
                            Harga: {{ $activeFilters['price_range']['label'] }}
                            <a href="{{ route('lomba.index', array_merge(request()->except('price_range'))) }}" class="ml-2 text-blue-400 hover:text-blue-600">
                                <i class="fas fa-times"></i>
                            </a>
                        </div>
                    @endif

                    @if (isset($activeFilters['start_date']))
                        <div class="px-3 py-1 bg-blue-50 text-blue-600 rounded-full text-sm flex items-center">
                            Mulai: {{ \Carbon\Carbon::parse($activeFilters['start_date'])->format('d M Y') }}
                            <a href="{{ route('lomba.index', array_merge(request()->except('start_date'))) }}" class="ml-2 text-blue-400 hover:text-blue-600">
                                <i class="fas fa-times"></i>
                            </a>
                        </div>
                    @endif

                    <!-- Reset all filters button -->
                    @if (count($activeFilters) > 0)
                        <a href="{{ route('lomba.index') }}" class="px-3 py-1 bg-gray-100 text-gray-600 rounded-full text-sm hover:bg-gray-200">
                            Reset Filter
                        </a>
                    @endif
                </div>
            </div>

            <!-- Competitions Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach ($lombas as $lomba)
                    <!-- Card container dengan tinggi yang lebih besar -->
                    <div
                        class="bg-white rounded-lg overflow-hidden shadow-md border-2 border-blue-600 relative h-[800px] flex flex-col p-5 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 hover:border-[#5270ff]">
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
                            <a href="{{ route('lomba.detail', $lomba->id) }}"
                                class="block w-full py-3 text-center text-white font-medium bg-[#5270ff] border border-[#5270ff] rounded-3xl hover:bg-[#4560e6] hover:shadow-lg transition-all duration-300 transform hover:scale-105">
                                More Detail <i class="fas fa-arrow-right ml-1"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Empty State -->
            @if ($lombas->isEmpty())
                <div class="text-center py-20">
                    <i class="fas fa-trophy text-6xl text-gray-300 mb-4"></i>
                    <h3 class="text-xl font-semibold text-gray-600 mb-2">Tidak ada lomba yang ditemukan</h3>
                    <p class="text-gray-500 mb-6">Coba ubah filter pencarian Anda untuk menemukan lomba lainnya</p>
                    <a href="{{ route('lomba.index') }}" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                        Reset Filter
                    </a>
                </div>
            @endif

            <!-- Pagination -->
            <div class="mt-10 flex justify-center">
                {{ $lombas->links() }}
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            // Auto-submit form when certain filters change
            $('#sort-by').change(function() {
                $('#filter-form').submit();
            });

            // Bookmark button functionality (you can expand this)
            $('.bookmark-btn').click(function(e) {
                e.preventDefault();
                $(this).find('i').toggleClass('far fas');
            });
        });
    </script>
@endpush
