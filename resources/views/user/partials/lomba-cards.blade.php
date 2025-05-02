@foreach ($lombas as $lomba)
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
