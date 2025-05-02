@extends('user.layout.app')

@section('title', 'Lombanesia - Platform Lomba Terlengkap')

@section('content')
    <!-- Hero Section with Search & Filters -->
    <!-- Enhanced Hero Banner Section with CTA -->
    <section class="bg-gradient-to-b from-blue-100 to-blue-200 py-20 relative overflow-hidden min-h-[850px] pb-40">
        <!-- Hero Banner Content with Enhanced Animation -->
        <div class="container mx-auto px-4 py-20 text-center mb-16 relative z-10 mt-10">
            <div class="hero-title-container relative inline-block perspective mb-6">
                <h1 class="text-blue-600 text-6xl md:text-8xl font-bold hero-title relative italic transform -rotate-3">
                    Level Up With
                    <span
                        class="hero-title-glow absolute inset-0 blur-md bg-blue-300 opacity-0 transition-opacity duration-300"></span>
                </h1>
            </div>
            <div class="block">
                <div
                    class="lomba-title-box bg-gradient-to-r from-blue-700 via-blue-500 to-blue-700 inline-block px-10 py-5 rounded-full shadow-xl relative perspective overflow-hidden border-2 border-white/30 italic transform -rotate-2">
                    <!-- 3D Layered Effect -->
                    <div
                        class="absolute inset-0 rounded-full bg-gradient-to-br from-blue-600 to-blue-800 transform -translate-z-2 translate-y-1 translate-x-1 blur-sm opacity-50">
                    </div>

                    <!-- Enhanced shine effect with multiple layers -->
                    <div
                        class="lomba-title-shine absolute inset-0 w-full h-full bg-gradient-to-r from-transparent via-white to-transparent opacity-0 transition-all duration-500 shine-effect">
                    </div>
                    <div
                        class="lomba-title-glow absolute inset-0 w-full h-full rounded-full blur-md bg-blue-400 opacity-0 transition-all duration-300 glow-effect">
                    </div>

                    <!-- Premium effect with gold accent -->
                    <div
                        class="gold-accent absolute inset-0 rounded-full border-4 border-yellow-300/0 shadow-[0_0_15px_rgba(234,179,8,0.3)] opacity-0 transition-all duration-500">
                    </div>

                    <!-- Inner reflection -->
                    <div
                        class="inner-reflection absolute top-0 left-0 right-0 h-1/3 bg-gradient-to-b from-white/30 to-transparent rounded-t-full opacity-30">
                    </div>

                    <!-- Metallic Highlight Effect -->
                    <div
                        class="absolute inset-x-0 top-0 h-1/4 bg-gradient-to-b from-white/40 to-transparent rounded-t-full">
                    </div>

                    <h2 class="text-white text-4xl md:text-6xl font-bold relative z-10 text-shadow-premium">Lombanesia!
                    </h2>

                    <!-- Diamond particle effects -->
                    <div class="absolute -top-2 -right-2 diamond-particle opacity-0 transition-opacity">
                        <i class="fas fa-diamond text-yellow-300 text-sm"></i>
                    </div>
                    <div class="absolute -bottom-1 -left-3 diamond-particle opacity-0 transition-opacity delay-300">
                        <i class="fas fa-diamond text-yellow-300 text-xs"></i>
                    </div>
                </div>
            </div>

            <!-- Compelling Tagline -->
            <p class="text-blue-700 text-xl md:text-2xl font-medium mt-8 max-w-3xl mx-auto">
                Temukan ratusan kompetisi dari seluruh Indonesia. Showcase your talents, win amazing prizes!
            </p>

            <!-- Attractive CTA Button -->
            <div class="mt-10">
                <a href="{{ route('lomba.index') }}"
                    class="inline-flex items-center justify-center px-8 py-4 bg-gradient-to-r from-blue-600 to-blue-700 text-white text-xl font-bold rounded-full shadow-lg transform transition-all duration-300 hover:scale-105 hover:shadow-xl hover:from-blue-700 hover:to-blue-800 group">
                    <span>Telusuri Semua Lomba</span>
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-6 w-6 ml-2 transition-transform duration-300 group-hover:translate-x-1" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
                </a>
            </div>

            <!-- Additional Info Point -->
            <div class="flex flex-wrap justify-center mt-8 gap-8">
                {{-- <div class="flex items-center text-blue-700">
                    <i class="fas fa-trophy text-2xl mr-2"></i>
                    <span class="font-medium">250+ Active Competitions</span>
                </div> --}}
                <div class="flex items-center text-blue-700">
                    <i class="fas fa-user-graduate text-2xl mr-2"></i>
                    <span class="font-medium">For All Education Levels</span>
                </div>
                <div class="flex items-center text-blue-700">
                    <i class="fas fa-map-marker-alt text-2xl mr-2"></i>
                    <span class="font-medium">Online & Offline Events</span>
                </div>
            </div>
        </div>

        <!-- Enhanced Floating Elements for Animation - More trophies and icons -->
        <div class="absolute left-0 top-0 w-full h-full overflow-hidden pointer-events-none">
            <!-- Group 1 - Left side -->
            <div class="floating-item" style="left: 5%; top: 15%; animation-delay: 0s;">
                <i class="fas fa-trophy text-blue-300 text-4xl opacity-60"></i>
            </div>
            <div class="floating-item" style="left: 10%; top: 30%; animation-delay: 2.7s;">
                <i class="fas fa-crown text-yellow-300 text-3xl opacity-50"></i>
            </div>
            <div class="floating-item" style="left: 8%; top: 60%; animation-delay: 1.4s;">
                <i class="fas fa-medal text-yellow-400 text-3xl opacity-40"></i>
            </div>

            <!-- Group 2 - Center top -->
            <div class="floating-item" style="left: 40%; top: 8%; animation-delay: 3.6s;">
                <i class="fas fa-award text-blue-500 text-2xl opacity-40"></i>
            </div>
            <div class="floating-item" style="left: 45%; top: 20%; animation-delay: 0.8s;">
                <i class="fas fa-star text-yellow-300 text-2xl opacity-30"></i>
            </div>

            <!-- Group 3 - Right side -->
            <div class="floating-item" style="left: 80%; top: 10%; animation-delay: 1.5s;">
                <i class="fas fa-award text-blue-400 text-3xl opacity-50"></i>
            </div>
            <div class="floating-item" style="left: 85%; top: 25%; animation-delay: 3.2s;">
                <i class="fas fa-trophy text-yellow-400 text-2xl opacity-40"></i>
            </div>
            <div class="floating-item" style="left: 75%; top: 42%; animation-delay: 0.9s;">
                <i class="fas fa-star text-yellow-300 text-3xl opacity-35"></i>
            </div>

            <!-- Group 4 - Bottom area -->
            <div class="floating-item" style="left: 20%; top: 60%; animation-delay: 3s;">
                <i class="fas fa-medal text-blue-300 text-3xl opacity-40"></i>
            </div>
            <div class="floating-item" style="left: 30%; top: 75%; animation-delay: 1.7s;">
                <i class="fas fa-trophy text-blue-400 text-2xl opacity-50"></i>
            </div>
            <div class="floating-item" style="left: 70%; top: 50%; animation-delay: 2s;">
                <i class="fas fa-star text-yellow-300 text-2xl opacity-60"></i>
            </div>
            <div class="floating-item" style="left: 60%; top: 70%; animation-delay: 4.1s;">
                <i class="fas fa-medal text-yellow-400 text-2xl opacity-45"></i>
            </div>
            <div class="floating-item" style="left: 90%; top: 70%; animation-delay: 0.5s;">
                <i class="fas fa-certificate text-blue-200 text-3xl opacity-40"></i>
            </div>

            <!-- Additional smaller icons for subtle background depth -->
            <div class="micro-floating-item" style="left: 25%; top: 40%; animation-delay: 2.2s;">
                <i class="fas fa-star text-blue-200 text-xs opacity-30"></i>
            </div>
            <div class="micro-floating-item" style="left: 65%; top: 55%; animation-delay: 3.4s;">
                <i class="fas fa-certificate text-yellow-200 text-xs opacity-25"></i>
            </div>
            <div class="micro-floating-item" style="left: 82%; top: 85%; animation-delay: 1.1s;">
                <i class="fas fa-star text-blue-200 text-xs opacity-20"></i>
            </div>
            <div class="micro-floating-item" style="left: 15%; top: 85%; animation-delay: 2.5s;">
                <i class="fas fa-medal text-yellow-200 text-xs opacity-20"></i>
            </div>
        </div>

        <!-- Popular Competitions Content -->
        <div class="container-fluid px-4 pt-20 relative z-10">
            <h2 class="text-blue-600 text-3xl md:text-6xl font-bold text-center mb-8">Lomba Paling Populer</h2>

            <div class="relative">
                <!-- Carousel Wrapper with padding-top for hover space -->
                <div class="overflow-hidden pt-4" id="popular-carousel">
                    <div class="flex space-x-4 popular-slider transition-all duration-700 ease-in-out">
                        @php
                            $popularLombas = \App\Models\Lomba::orderBy('jumlah_like', 'desc')->take(10)->get();
                        @endphp

                        @foreach ($popularLombas as $lomba)
                            <div
                                class="min-w-[220px] bg-white rounded-lg overflow-hidden shadow-md carousel-item hover:shadow-xl transition-all duration-300 hover:-translate-y-2 group">
                                <!-- Poster Container sebagai link ke detail lomba -->
                                <a href="{{ url('/lomba/' . $lomba->id) }}" class="block">
                                    <div class="w-full h-100 overflow-hidden">
                                        @if ($lomba->poster_url)
                                            <img src="{{ asset($lomba->poster_url) }}" alt="{{ $lomba->nama }}"
                                                class="w-full h-full object-cover group-hover:opacity-90 transition-all duration-300">
                                        @else
                                            <div
                                                class="w-full h-full bg-gray-100 flex items-center justify-center group-hover:bg-gray-200 transition-all duration-300">
                                                <span class="text-gray-400">
                                                    <i class="fas fa-image text-4xl"></i>
                                                </span>
                                            </div>
                                        @endif
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Carousel Controls -->
                <button
                    class="absolute top-1/2 -left-2 transform -translate-y-1/2 bg-white rounded-full w-10 h-10 shadow-md flex items-center justify-center text-blue-600 focus:outline-none hover:bg-blue-50 transition-all duration-300 hover:shadow-lg hover:scale-110"
                    id="popular-prev">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button
                    class="absolute top-1/2 -right-2 transform -translate-y-1/2 bg-white rounded-full w-10 h-10 shadow-md flex items-center justify-center text-blue-600 focus:outline-none hover:bg-blue-50 transition-all duration-300 hover:shadow-lg hover:scale-110"
                    id="popular-next">
                    <i class="fas fa-chevron-right"></i>
                </button>

                <!-- Carousel Indicators - will be generated dynamically -->
                <div class="flex justify-center mt-6 gap-2 carousel-indicators">
                    <!-- Dots will be inserted here via JavaScript -->
                </div>
            </div>
        </div>

        <!-- Enhanced Cloud Effect at the bottom - preserved and extended -->
        <div class="absolute bottom-0 left-0 right-0 overflow-hidden" style="z-index: 1;">
            <!-- Main layer of clouds -->
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="w-full"
                style="display: block; margin-bottom: -10px; transform: scale(1.05);">
                <path fill="#f9fafb" fill-opacity="1"
                    d="M0,224L60,229.3C120,235,240,245,360,250.7C480,256,600,256,720,234.7C840,213,960,171,1080,176C1200,181,1320,235,1380,261.3L1440,288L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z">
                </path>
            </svg>

            <!-- Second layer of clouds -->
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="w-full absolute bottom-0"
                style="margin-bottom: -5px; transform: scale(1.1);">
                <path fill="#f3f4f6" fill-opacity="0.8"
                    d="M0,96L60,106.7C120,117,240,139,360,176C480,213,600,267,720,272C840,277,960,235,1080,213.3C1200,192,1320,192,1380,192L1440,192L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z">
                </path>
            </svg>

            <!-- Third layer with more detailed clouds -->
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="w-full absolute bottom-0"
                style="transform: scale(1.2);">
                <path fill="#ffffff" fill-opacity="0.4"
                    d="M0,160L48,176C96,192,192,224,288,213.3C384,203,480,149,576,149.3C672,149,768,203,864,224C960,245,1056,235,1152,224C1248,213,1344,203,1392,197.3L1440,192L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z">
                </path>
            </svg>
        </div>
    </section>



    <!-- Latest Competitions Section with Seamless Transition & Attractive Background -->
    <section class="py-12 relative bg-gradient-to-b">
        <!-- Smooth Connection to Cloud Effect Above -->
        <div class="absolute -top-1 left-0 right-0 h-32 bg-gradient-to-b"></div>

        <!-- Premium Background Design Elements -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <!-- Subtle Pattern Elements -->
            <div class="absolute inset-0 opacity-5"></div>

            <!-- Premium Accents -->
            <div class="absolute top-1/3 right-0 w-1/2 h-1/2 bg-gradient-to-bl from-blue-100/20 to-transparent"></div>
            <div class="absolute bottom-0 left-0 w-full h-1/3 bg-gradient-to-t from-blue-50/30 to-transparent"></div>

            <!-- Gold Subtle Elements -->
            <div
                class="absolute bottom-20 right-20 w-96 h-96 rounded-full bg-gradient-to-tr from-yellow-200/10 to-yellow-400/5 blur-3xl">
            </div>
            <div
                class="absolute top-40 left-20 w-64 h-64 rounded-full bg-gradient-to-br from-blue-200/10 to-indigo-300/5 blur-3xl">
            </div>

            <!-- Premium Soft Waves -->
            {{-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="absolute bottom-0 w-full opacity-10" preserveAspectRatio="none">
                <path fill="#4F46E5" d="M0,288L48,277.3C96,267,192,245,288,213.3C384,181,480,139,576,149.3C672,160,768,224,864,256C960,288,1056,288,1152,261.3C1248,235,1344,181,1392,154.7L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
            </svg> --}}

            <!-- Decorative Light Rays - premium effect -->
            <div
                class="absolute top-0 left-1/4 w-0.5 h-32 bg-gradient-to-b from-blue-300/30 to-transparent transform rotate-12">
            </div>
            <div
                class="absolute top-10 right-1/3 w-0.5 h-48 bg-gradient-to-b from-blue-300/20 to-transparent transform -rotate-12">
            </div>

            <!-- Floating Light Dots -->
            <div class="absolute top-1/4 left-1/5 w-2 h-2 rounded-full bg-blue-300 opacity-20"></div>
            <div class="absolute top-1/3 left-3/4 w-3 h-3 rounded-full bg-blue-400 opacity-15"></div>
            <div class="absolute top-2/3 left-1/6 w-2 h-2 rounded-full bg-yellow-300 opacity-20"></div>
            <div class="absolute top-1/2 left-5/6 w-2 h-2 rounded-full bg-yellow-400 opacity-15"></div>
        </div>

        <div class="container mx-auto px-4 relative z-10">
            <h2 class="text-blue-600 text-3xl md:text-6xl font-bold text-center mb-8 relative z-10">Lomba Terbaru</h2>

            <div id="lomba-container" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 relative z-10">
                @php
                    $latestLombas = \App\Models\Lomba::orderBy('created_at', 'desc')->take(4)->get();
                @endphp

                @foreach ($latestLombas as $lomba)
                    <!-- Card container dengan tinggi yang lebih besar -->
                    <div
                        class="bg-white rounded-3xl overflow-hidden shadow-md border-2 border-blue-600 relative h-[800px] flex flex-col p-5 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 hover:border-[#5270ff]">
                        <!-- Bookmark Button -->
                        <button
                            class="absolute top-2 right-2 w-8 h-8 bg-white rounded-full shadow-sm flex items-center justify-center text-gray-400 hover:text-[#5270ff] transition-colors bookmark-btn z-10">
                            <i class="fas fa-bookmark"></i>
                        </button>

                        <!-- Poster Container dengan tinggi h-100 -->
                        <div class="w-full h-96 flex-shrink-0 overflow-hidden rounded-lg">
                            @if ($lomba->poster_url)
                                <img src="{{ asset($lomba->poster_url) }}" alt="{{ $lomba->nama }}"
                                    class="w-full h-full rounded-lg transition-all duration-500 transform hover:scale-105">
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
                                <h3
                                    class="text-lg font-semibold text-gray-800 mb-3 group-hover:text-[#5270ff] transition-colors duration-300">
                                    {{ $lomba->nama }}</h3>

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

            <!-- Loading indicator -->
            <div id="loading-indicator" class="text-center mt-6 hidden">
                <div class="inline-block animate-spin rounded-full h-8 w-8 border-t-2 border-b-2 border-blue-600"></div>
                <p class="mt-2 text-gray-600">Loading more events...</p>
            </div>

            <!-- More Events Button -->
            <div class="text-center mt-10">
                <button id="load-more-btn"
                    class="inline-flex items-center justify-center px-6 py-3 bg-blue-600 border hover:bg-blue-700 text-white font-medium rounded-3xl w-80 h-50 transition-all duration-300 hover:shadow-lg transform hover:scale-105"
                    data-page="1">
                    More Event <i class="fas fa-sync-alt ml-2"></i>
                </button>
            </div>
        </div>
    </section>

    <!-- Enhanced Styling for Animations -->
    <style>
        /* Floating animation for items */
        @keyframes float {
            0% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-15px) rotate(5deg);
            }

            100% {
                transform: translateY(0px) rotate(0deg);
            }
        }

        /* Enhanced floating animation with more random movement */
        @keyframes float-complex {
            0% {
                transform: translateY(0px) rotate(0deg) scale(1);
            }

            25% {
                transform: translateY(-10px) rotate(3deg) scale(1.05);
            }

            50% {
                transform: translateY(-20px) rotate(5deg) scale(1.1);
            }

            75% {
                transform: translateY(-10px) rotate(2deg) scale(1.05);
            }

            100% {
                transform: translateY(0px) rotate(0deg) scale(1);
            }
        }

        /* Micro floating animation - smaller movement */
        @keyframes micro-float {
            0% {
                transform: translateY(0px) scale(1);
            }

            50% {
                transform: translateY(-5px) scale(1.2);
            }

            100% {
                transform: translateY(0px) scale(1);
            }
        }

        .floating-item {
            position: absolute;
            animation: float-complex 8s ease-in-out infinite;
        }

        .micro-floating-item {
            position: absolute;
            animation: micro-float 4s ease-in-out infinite;
        }

        /* Enhanced pulse animation for hero title with rotation */
        @keyframes pulse-tilt {
            0% {
                transform: scale(1) rotate(-3deg);
                text-shadow: 0 0 0px rgba(59, 130, 246, 0);
            }

            50% {
                transform: scale(1.03) rotate(-2deg);
                text-shadow: 0 0 15px rgba(59, 130, 246, 0.4);
            }

            100% {
                transform: scale(1) rotate(-3deg);
                text-shadow: 0 0 0px rgba(59, 130, 246, 0);
            }
        }

        /* Add smooth transition to hero title base state */
        .hero-title {
            animation: pulse-tilt 4s ease-in-out infinite;
            transform-origin: center;
            transition: transform 0.8s cubic-bezier(0.34, 1.56, 0.64, 1),
                color 0.8s ease,
                text-shadow 0.8s ease,
                background-position 0.8s ease;
        }


        /* Premium bounce animation for Lombanesia title */
        @keyframes premium-bounce {

            0%,
            100% {
                transform: translateY(0) scale(1) rotate(-2deg);
                box-shadow: 0 5px 15px rgba(59, 130, 246, 0.4);
            }

            40% {
                transform: translateY(-6px) scale(1.02) rotate(-1deg);
                box-shadow: 0 15px 25px rgba(59, 130, 246, 0.5);
            }

            60% {
                transform: translateY(-3px) scale(1.01) rotate(-2deg);
                box-shadow: 0 10px 20px rgba(59, 130, 246, 0.45);
            }
        }

        /* Diamond particles animation */
        @keyframes diamond-sparkle {
            0% {
                transform: scale(0) rotate(0deg);
                opacity: 0;
            }

            50% {
                transform: scale(1.5) rotate(45deg);
                opacity: 1;
            }

            100% {
                transform: scale(0) rotate(90deg);
                opacity: 0;
            }
        }

        .diamond-particle {
            position: absolute;
            animation: diamond-sparkle 2s ease-in-out infinite;
        }

        .lomba-title-box {
            animation: premium-bounce 3s ease-in-out infinite;
            transform-origin: center;
            transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            box-shadow: 0 10px 25px rgba(59, 130, 246, 0.4),
                inset 0 -4px 0 rgba(0, 0, 0, 0.1),
                0 0 10px rgba(59, 130, 246, 0.6),
                0 0 0 2px rgba(255, 255, 255, 0.2);
        }

        /* Text shadow for premium effect */
        .text-shadow-premium {
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3),
                0 0 10px rgba(255, 255, 255, 0.2);
        }

        /* Enhanced hover effect for Lombanesia title */
        .lomba-title-box:hover {
            transform: scale(1.08) rotate(1deg);
            box-shadow: 0 15px 35px rgba(59, 130, 246, 0.5),
                inset 0 -6px 0 rgba(0, 0, 0, 0.15),
                0 0 20px rgba(59, 130, 246, 0.8),
                0 0 0 4px rgba(255, 255, 255, 0.3);
        }

        /* 3D layered effect animation on hover */
        .lomba-title-box:hover::before {
            transform: translateZ(-10px) translateY(5px) translateX(5px);
            opacity: 0.8;
        }

        /* Enhanced shine effect with timing */
        @keyframes premium-shine {
            0% {
                transform: translateX(-100%) skewX(-15deg);
                opacity: 0;
            }

            10% {
                opacity: 0.5;
            }

            20% {
                opacity: 0.8;
            }

            30% {
                opacity: 0.5;
            }

            40% {
                opacity: 0;
            }

            100% {
                transform: translateX(100%) skewX(-15deg);
                opacity: 0;
            }
        }

        .lomba-title-box:hover .lomba-title-shine {
            opacity: 0.9;
            animation: premium-shine 1.5s ease-in-out;
        }

        .lomba-title-box:hover .lomba-title-glow {
            opacity: 0.7;
        }

        .lomba-title-box:hover .gold-accent {
            opacity: 1;
            border-color: rgba(234, 179, 8, 0.5);
        }

        .lomba-title-box:hover .diamond-particle {
            animation: diamond-sparkle 1.5s ease-in-out infinite;
            opacity: 1;
        }

        /* 3D perspective containers */
        .perspective {
            perspective: 800px;
        }



        /* Add shimmer effect on the text */
        @keyframes text-shimmer {
            0% {
                background-position: -100% 0;
            }

            100% {
                background-position: 200% 0;
            }
        }
    </style>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            // Setup AJAX untuk CSRF token
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Add enhanced 3D tilt effect to hero titles
            const heroTitle = $('.hero-title-container');
            const lombaTitle = $('.lomba-title-box');

            // Enhanced premium effect for Lombanesia title
            lombaTitle.on('mousemove', function(e) {
                const el = $(this);
                const height = el.height();
                const width = el.width();
                const xVal = e.offsetX;
                const yVal = e.offsetY;

                const yRotation = 10 * ((xVal - width / 2) / width);
                const xRotation = -10 * ((yVal - height / 2) / height);

                // Create diamond particle effects on hover
                if (Math.random() > 0.9) {
                    createSparkle(el);
                }

                el.css({
                    'transform': `perspective(800px) rotateX(${xRotation}deg) rotateY(${yRotation}deg) scale(1.08) rotate(1deg)`,
                    'transition': 'transform 0.1s'
                });
            });

            lombaTitle.on('mouseout', function() {
                $(this).css({
                    'transform': 'perspective(500px) rotateX(0) rotateY(0) scale(1) rotate(-2deg)',
                    'transition': 'transform 0.5s'
                });
            });

            // Function to create sparkle elements dynamically
            function createSparkle(parent) {
                const sparkle = $('<div class="absolute w-2 h-2 opacity-0"></div>');

                // Random position within the parent element
                const posX = Math.random() * 100;
                const posY = Math.random() * 100;

                // Random color (gold or white)
                const colors = ['text-yellow-300', 'text-white'];
                const randomColor = colors[Math.floor(Math.random() * colors.length)];

                // Random size (small, smaller or tiny)
                const size = 8 + Math.floor(Math.random() * 8);

                // Create the sparkle
                const sparkleIcon = $(`<i class="fas fa-diamond ${randomColor}" style="font-size: ${size}px"></i>`);
                sparkle.append(sparkleIcon);

                // Position it
                sparkle.css({
                    left: `${posX}%`,
                    top: `${posY}%`,
                    position: 'absolute',
                    animation: `diamond-sparkle ${1 + Math.random()}s ease-out forwards`
                });

                // Add to parent and remove after animation completes
                parent.append(sparkle);
                setTimeout(() => {
                    sparkle.remove();
                }, 2000);
            }

            // Filter buttons active state
            $('.filter-btn').click(function() {
                $(this).toggleClass('bg-white bg-blue-600');
                $(this).toggleClass('text-blue-600 text-white');
            });

            // Popular competitions carousel setup
            const slides = $('.carousel-item');
            const totalSlides = slides.length;
            let slidesToShow = window.innerWidth < 768 ? 1 : 5; // Show 1 on mobile, 5 on desktop
            let currentSlide = 0;

            // Generate indicators dots dynamically based on available slides
            const indicatorsContainer = $('.carousel-indicators');
            indicatorsContainer.empty(); // Clear any existing indicators

            // Calculate number of dots needed (one for each possible position)
            const maxPosition = totalSlides - slidesToShow;

            for (let i = 0; i <= maxPosition; i++) {
                indicatorsContainer.append(
                    `<span class="h-3 w-3 rounded-full ${i === 0 ? 'bg-blue-600' : 'bg-blue-200'} cursor-pointer hover:bg-blue-400 transition-colors duration-300" data-index="${i}"></span>`
                );
            }

            // Set initial carousel width and item width for smooth scrolling
            function setupCarousel() {
                const carouselWidth = $('#popular-carousel').width();
                const itemWidth = carouselWidth / slidesToShow;

                // Set each slide's width with a consistent size
                slides.css('width', itemWidth + 'px');

                // Set slider container width to accommodate all items
                $('.popular-slider').css('width', (itemWidth * totalSlides) + 'px');

                // Update the slider position with animation disabled
                updateSlider(false);
            }

            // Call setup on page load
            setupCarousel();

            // Update slider position with smooth animation
            function updateSlider(animate = true) {
                // Check bounds
                if (currentSlide < 0) currentSlide = 0;
                if (currentSlide > totalSlides - slidesToShow) currentSlide = totalSlides - slidesToShow;

                // Calculate item width dynamically (responsive)
                const carouselWidth = $('#popular-carousel').width();
                const itemWidth = carouselWidth / slidesToShow;

                // Calculate exact pixel position for smooth scrolling
                // For mobile, always move exactly one card width
                const moveAmount = -currentSlide * (window.innerWidth < 768 ? itemWidth : itemWidth);

                // Apply smooth animation or instant positioning
                if (animate) {
                    $('.popular-slider').css({
                        'transition': 'transform 0.7s cubic-bezier(0.25, 0.1, 0.25, 1)'
                    });
                } else {
                    $('.popular-slider').css({
                        'transition': 'none'
                    });
                }

                // Move the slider with transform
                $('.popular-slider').css({
                    'transform': `translateX(${moveAmount}px)`
                });

                // After a brief delay, re-enable transitions
                if (!animate) {
                    setTimeout(() => {
                        $('.popular-slider').css({
                            'transition': 'transform 0.7s cubic-bezier(0.25, 0.1, 0.25, 1)'
                        });
                    }, 50);
                }

                // Update indicator dots
                $('.carousel-indicators span').removeClass('bg-blue-600').addClass('bg-blue-200');
                $(`.carousel-indicators span[data-index="${currentSlide}"]`).removeClass('bg-blue-200').addClass(
                    'bg-blue-600');

                // Update navigation buttons state
                updateNavigationButtons();
            }

            // Update prev/next buttons visibility based on current position
            function updateNavigationButtons() {
                // Prev button - disable at start
                if (currentSlide === 0) {
                    $('#popular-prev').css('opacity', '0.5').prop('disabled', true);
                } else {
                    $('#popular-prev').css('opacity', '1').prop('disabled', false);
                }

                // Next button - disable at end
                if (currentSlide >= totalSlides - slidesToShow) {
                    $('#popular-next').css('opacity', '0.5').prop('disabled', true);
                } else {
                    $('#popular-next').css('opacity', '1').prop('disabled', false);
                }
            }

            // Initial button state
            updateNavigationButtons();

            // Handle window resize events to make carousel responsive
            $(window).resize(function() {
                // Update slides to show based on screen size
                const newSlidesToShow = window.innerWidth < 768 ? 1 : 5;

                // Only reset if slidesToShow changed
                if (newSlidesToShow !== slidesToShow) {
                    // Update slidesToShow
                    slidesToShow = newSlidesToShow;

                    // Reset current slide to start for better mobile experience
                    if (window.innerWidth < 768) {
                        currentSlide = 0;
                    } else {
                        // Make sure current slide is valid with new slidesToShow
                        if (currentSlide > totalSlides - slidesToShow) {
                            currentSlide = totalSlides - slidesToShow;
                            if (currentSlide < 0) currentSlide = 0;
                        }
                    }

                    // Update carousel
                    setupCarousel();
                } else {
                    // Just update carousel dimensions
                    setupCarousel();
                }
            });

            // Next button - move one card at a time
            $('#popular-next').click(function() {
                if (currentSlide < totalSlides - slidesToShow) {
                    // Always move exactly one card at a time
                    currentSlide += 1;
                    updateSlider(true);
                }
            });

            // Previous button - move one card at a time
            $('#popular-prev').click(function() {
                if (currentSlide > 0) {
                    // Always move exactly one card at a time
                    currentSlide -= 1;
                    updateSlider(true);
                }
            });

            // Indicator dots click handler
            $('.carousel-indicators').on('click', 'span', function() {
                currentSlide = parseInt($(this).attr('data-index'));
                updateSlider(true);
            });

            // Add touch swipe support for mobile
            let touchStartX = 0;
            let touchEndX = 0;

            $('#popular-carousel').on('touchstart', function(e) {
                touchStartX = e.originalEvent.touches[0].clientX;
            });

            $('#popular-carousel').on('touchend', function(e) {
                touchEndX = e.originalEvent.changedTouches[0].clientX;
                handleSwipe();
            });

            function handleSwipe() {
                const minSwipeDistance = 50;
                const swipeDistance = touchEndX - touchStartX;

                if (swipeDistance > minSwipeDistance && currentSlide > 0) {
                    // Swipe right - go to previous
                    currentSlide -= 1;
                    updateSlider(true);
                } else if (swipeDistance < -minSwipeDistance && currentSlide < totalSlides - slidesToShow) {
                    // Swipe left - go to next
                    currentSlide += 1;
                    updateSlider(true);
                }
            }

            // Load more events functionality
            let isLoading = false; // Flag to prevent multiple simultaneous requests
            let loadedCount = 4; // Initial count of loaded lomba
            let lastLoadedId = 0; // Track the last loaded lomba ID

            $('#load-more-btn').click(function() {
                // Prevent multiple clicks while loading
                if (isLoading) return;

                const btn = $(this);

                // Set loading state
                isLoading = true;

                // Show loading indicator
                $('#loading-indicator').removeClass('hidden');

                // Disable button and change text while loading
                btn.prop('disabled', true)
                    .find('i')
                    .removeClass('fa-sync-alt')
                    .addClass('fa-spinner fa-spin');

                // Debug log request details
                console.log('Loading more lomba', {
                    lastLoadedId: lastLoadedId,
                    loadedCount: loadedCount
                });

                // Make Ajax request with exact tracking data
                $.ajax({
                    url: '{{ route('home.loadMoreLomba') }}',
                    type: 'GET',
                    data: {
                        last_id: lastLoadedId,
                        loaded_count: loadedCount
                    },
                    dataType: 'json',
                    cache: false,
                    timeout: 15000, // 15 seconds timeout
                    success: function(response) {
                        console.log('Ajax response:', response); // Debug log

                        // Hide loading indicator
                        $('#loading-indicator').addClass('hidden');

                        // If we got HTML content (even just one item)
                        if (response.html && response.html.trim() !== '') {
                            // Create a temporary container to hold the new elements
                            const tempContainer = $('<div>').html(response.html);

                            // Add 'opacity-0' class to all new cards for initial state
                            tempContainer.find('.bg-white').addClass('opacity-0 translate-y-4');

                            // Append the container's content to the lomba container
                            $('#lomba-container').append(tempContainer.html());

                            // Animate each new card with a slight delay between them
                            const newCards = $('#lomba-container .opacity-0');
                            newCards.each(function(index) {
                                const card = $(this);
                                setTimeout(function() {
                                    card.addClass(
                                            'transition-all duration-500 ease-out'
                                        )
                                        .removeClass('opacity-0 translate-y-4');
                                }, index * 100); // 100ms delay between each card
                            });

                            // Update our tracking variables for next request
                            loadedCount = response.loaded;
                            lastLoadedId = response.last_id;

                            // Show button if more pages available, hide if no more content
                            if (response.hasMorePages === true) {
                                btn.removeClass('hidden').prop('disabled', false);
                                console.log(
                                    `Loaded ${response.loaded} of ${response.total} lomba. ${response.remaining} remaining.`
                                );
                            } else {
                                btn.addClass('hidden');
                                console.log(
                                    `All lomba loaded: ${response.loaded} of ${response.total}.`
                                );
                            }
                        } else {
                            // No more content to load
                            btn.addClass('hidden');
                            console.log(
                                `No more lomba to load. Currently loaded: ${response.loaded} of ${response.total}.`
                            );
                        }

                        // Reset button state
                        btn.prop('disabled', false)
                            .find('i')
                            .removeClass('fa-spinner fa-spin')
                            .addClass('fa-sync-alt');

                        // Reset loading flag
                        isLoading = false;
                    },
                    error: function(xhr, status, error) {
                        console.error('Ajax error:', status, error);
                        console.error('Response Text:', xhr.responseText);

                        // Try to get more details from response
                        try {
                            const errorObj = JSON.parse(xhr.responseText);
                            console.error('Server Error:', errorObj);
                        } catch (e) {
                            console.error('Response is not valid JSON');
                        }

                        // Hide loading indicator
                        $('#loading-indicator').addClass('hidden');

                        // Reset button state
                        btn.prop('disabled', false)
                            .find('i')
                            .removeClass('fa-spinner fa-spin')
                            .addClass('fa-sync-alt');

                        // Reset loading flag
                        isLoading = false;

                        // Better error message based on status code
                        let errorMessage = 'Failed to load more events.';
                        if (xhr.status === 404) {
                            errorMessage =
                                'Endpoint not found. Please check route configuration.';
                        } else if (xhr.status === 500) {
                            errorMessage = 'Server error occurred. Please check Laravel logs.';
                        } else if (status === 'timeout') {
                            errorMessage = 'Request timed out. Please check your connection.';
                        }

                        alert(errorMessage + ' Please try again.');
                    }
                });
            });
        });
    </script>
@endpush
