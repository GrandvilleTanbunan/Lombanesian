@extends('user.layout.app')

@section('title', 'Pendaftaran '.$lomba->nama.' - Lombanesia')

@section('styles')
<style>
    .card-shadow {
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
    }
    .details-card {
        background-color: #f9fafb;
        border-radius: 0.75rem;
    }
    .step-circle {
        width: 2rem;
        height: 2rem;
        border-radius: 9999px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: bold;
        background-color: #5270ff;
        margin-right: 1rem;
    }
</style>
@endsection

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Back Button and Header -->
    <div class="flex items-center mb-6">
        <a href="{{ route('lomba.detail', $lomba->id) }}" class="text-blue-600 mr-2">
            <i class="fas fa-chevron-left"></i>
        </a>
        <h1 class="text-2xl font-bold text-blue-600">Pendaftaran Lomba</h1>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Left Column - Form -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-xl overflow-hidden card-shadow p-6">
                <h2 class="text-xl font-bold mb-6 pb-3 border-b border-gray-200">Form Pendaftaran: {{ $lomba->nama }}</h2>

                @if(session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6">
                    <p>{{ session('success') }}</p>
                </div>
                @endif

                @if(session('error'))
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6">
                    <p>{{ session('error') }}</p>
                </div>
                @endif

                <form action="#" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Participant Information Section -->
                    <div class="mb-8">
                        <div class="flex items-center mb-4">
                            <div class="step-circle">1</div>
                            <h3 class="text-lg font-semibold">Informasi Peserta</h3>
                        </div>

                        <div class="pl-10 space-y-4">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="nama_tim" class="block text-gray-700 font-medium mb-2">Nama Tim <span class="text-red-500">*</span></label>
                                    <input type="text" id="nama_tim" name="nama_tim" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                </div>

                                <div>
                                    <label for="jumlah_anggota" class="block text-gray-700 font-medium mb-2">Jumlah Anggota <span class="text-red-500">*</span></label>
                                    <select id="jumlah_anggota" name="jumlah_anggota" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                        <option value="">Pilih Jumlah</option>
                                        <option value="1">1 orang</option>
                                        <option value="2">2 orang</option>
                                        <option value="3">3 orang</option>
                                        <option value="4">4 orang</option>
                                        <option value="5">5 orang</option>
                                    </select>
                                </div>
                            </div>

                            <div>
                                <label for="asal_institusi" class="block text-gray-700 font-medium mb-2">Asal Institusi <span class="text-red-500">*</span></label>
                                <input type="text" id="asal_institusi" name="asal_institusi" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            </div>

                            <div>
                                <label for="alamat_institusi" class="block text-gray-700 font-medium mb-2">Alamat Institusi <span class="text-red-500">*</span></label>
                                <textarea id="alamat_institusi" name="alamat_institusi" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Documents Section -->
                    <div class="mb-8">
                        <div class="flex items-center mb-4">
                            <div class="step-circle">2</div>
                            <h3 class="text-lg font-semibold">Dokumen Pendukung</h3>
                        </div>

                        <div class="pl-10 space-y-4">
                            <div class="p-4 bg-yellow-50 rounded-lg mb-4">
                                <p class="text-sm text-yellow-800">
                                    <i class="fas fa-info-circle mr-1"></i> Silakan unggah semua dokumen yang diperlukan sesuai persyaratan lomba. Format file: PDF, JPG, atau PNG. Ukuran maksimal: 2MB per file.
                                </p>
                            </div>

                            <div>
                                <label for="kartu_identitas" class="block text-gray-700 font-medium mb-2">Kartu Identitas (KTP/Kartu Pelajar) <span class="text-red-500">*</span></label>
                                <input type="file" id="kartu_identitas" name="kartu_identitas" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" accept=".pdf,.jpg,.jpeg,.png" required>
                            </div>

                            <div>
                                <label for="bukti_pembayaran" class="block text-gray-700 font-medium mb-2">Bukti Pembayaran <span class="text-red-500">*</span></label>
                                <input type="file" id="bukti_pembayaran" name="bukti_pembayaran" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" accept=".pdf,.jpg,.jpeg,.png" required>
                                <p class="text-sm text-gray-500 mt-1">Silakan transfer ke rekening yang tercantum di detail lomba dan unggah bukti transfer di sini.</p>
                            </div>

                            <div>
                                <label for="dokumen_tambahan" class="block text-gray-700 font-medium mb-2">Dokumen Tambahan (Opsional)</label>
                                <input type="file" id="dokumen_tambahan" name="dokumen_tambahan" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" accept=".pdf,.jpg,.jpeg,.png">
                                <p class="text-sm text-gray-500 mt-1">Jika ada dokumen tambahan seperti proposal atau surat rekomendasi, silakan unggah di sini.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Information Section -->
                    <div class="mb-8">
                        <div class="flex items-center mb-4">
                            <div class="step-circle">3</div>
                            <h3 class="text-lg font-semibold">Informasi Kontak</h3>
                        </div>

                        <div class="pl-10 space-y-4">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="nama_kontak" class="block text-gray-700 font-medium mb-2">Nama Lengkap <span class="text-red-500">*</span></label>
                                    <input type="text" id="nama_kontak" name="nama_kontak" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ Auth::user()->name }}" required>
                                </div>

                                <div>
                                    <label for="email_kontak" class="block text-gray-700 font-medium mb-2">Email <span class="text-red-500">*</span></label>
                                    <input type="email" id="email_kontak" name="email_kontak" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ Auth::user()->email }}" required>
                                </div>
                            </div>

                            <div>
                                <label for="no_hp" class="block text-gray-700 font-medium mb-2">Nomor Handphone <span class="text-red-500">*</span></label>
                                <input type="tel" id="no_hp" name="no_hp" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ Auth::user()->phone }}" required>
                            </div>

                            <div>
                                <label for="catatan" class="block text-gray-700 font-medium mb-2">Catatan Tambahan (Opsional)</label>
                                <textarea id="catatan" name="catatan" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Agreement Section -->
                    <div class="mb-8">
                        <div class="flex items-center mb-4">
                            <div class="step-circle">4</div>
                            <h3 class="text-lg font-semibold">Persetujuan</h3>
                        </div>

                        <div class="pl-10 space-y-4">
                            <div class="flex items-start mb-4">
                                <input type="checkbox" id="agreement" name="agreement" class="mt-1 h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" required>
                                <label for="agreement" class="ml-2 block text-sm text-gray-700">
                                    Saya menyatakan bahwa informasi yang diberikan adalah benar dan lengkap. Saya telah membaca dan menyetujui semua persyaratan dan ketentuan lomba.
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-end">
                        <button type="submit" class="px-6 py-3 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700 transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                            Kirim Pendaftaran <i class="fas fa-paper-plane ml-1"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Right Column - Competition Details -->
        <div>
            <div class="bg-white rounded-xl overflow-hidden card-shadow mb-6">
                <img src="{{ asset($lomba->poster_url) }}" alt="{{ $lomba->nama }}" class="w-full h-auto">
                <div class="p-4">
                    <h3 class="text-lg font-bold mb-2">{{ $lomba->nama }}</h3>
                    <div class="space-y-2 text-sm">
                        <div class="flex items-center text-gray-700">
                            <i class="fas fa-calendar-alt w-5"></i>
                            <span>{{ $lomba->tanggal_mulai->format('j M Y') }} - {{ $lomba->tanggal_selesai->format('j M Y') }}</span>
                        </div>
                        <div class="flex items-center text-gray-700">
                            <i class="fas fa-map-marker-alt w-5"></i>
                            <span>{{ $lomba->provinsi->nama }}</span>
                        </div>
                        <div class="flex items-center text-gray-700">
                            <i class="fas fa-money-bill-wave w-5"></i>
                            <span>Rp {{ number_format($lomba->biaya_pendaftaran, 0, ',', '.') }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="details-card p-5 mb-6">
                <h3 class="font-bold text-gray-800 mb-3">Persyaratan</h3>
                <div class="text-gray-700 text-sm whitespace-pre-line">{{ $lomba->persyaratan }}</div>
            </div>

            <div class="details-card p-5">
                <h3 class="font-bold text-gray-800 mb-3">Informasi Rekening Pembayaran</h3>
                <div class="text-gray-700 text-sm space-y-2">
                    <p>Silakan transfer biaya pendaftaran ke rekening berikut:</p>
                    <div class="bg-white p-3 rounded border border-gray-200">
                        <p class="font-medium">Bank BNI</p>
                        <p>No. Rekening: 0123456789</p>
                        <p>Atas Nama: {{ $lomba->penyelenggara->nama }}</p>
                    </div>
                    <p class="text-xs text-red-500 mt-2">*Pastikan melampirkan bukti transfer pada form pendaftaran</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
