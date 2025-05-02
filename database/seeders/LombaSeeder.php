<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Lomba;
use App\Models\Penyelenggara;
use App\Models\Provinsi;
use App\Models\PesertaKategori;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class LombaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lombas = [
            // Original 5 competitions
            [
                'nama' => 'Lentera',
                'poster_url' => 'storage/posters/lentera.jpg',
                'biaya_pendaftaran_individu' => 50000.00,
                'biaya_pendaftaran_tim' => 75000.00,
                'tanggal_mulai' => Carbon::parse('2025-04-21'),
                'tanggal_selesai' => Carbon::parse('2025-06-07'),
                'keterangan' => "Kompetisi broadcasting tingkat Nasional untuk pelajar SMA/SMK sederajat dan mahasiwa PTN/PTS aktif.\n\nKompetisi Individu:\n- Radio Announcer\n- News Anchor\n- Reporter\n\nKompetisi Tim:\n- Iklan Layanan Masyarakat Audio\n- Podcast Audio",
                'persyaratan' => "1. Peserta adalah siswa SMA/SMK/MA aktif\n2. Melampirkan Kartu Pelajar\n3. Melampirkan bukti pembayaran\n4. Mengisi formulir pendaftaran",
                'jadwal_kegiatan' => "21 April 2025 - 7 Juni 2025: Pendaftaran\n8 - 15 Juni 2025: Pengumpulan Karya\n23 Juni 2025: Pengumuman Pemenang\n 5 Juli 2025: Final dan Awarding",
                'hadiah' => "Juara 1: Rp 7.500.000 + Trophy + Sertifikat\nJuara 2: Rp 5.000.000 + Trophy + Sertifikat\nJuara 3: Rp 3.000.000 + Trophy + Sertifikat",
                'jumlah_like' => 750,
                'jumlah_view' => 7501,
                'jenis_lomba' => 1,
                'penyelenggara_id' => 2, // PCU
                'provinsi_id' => 15, // DIY
                'kategori' => [3, 4], // SMA
                'link_pendaftaran' =>'https://docs.google.com/forms/d/e/1FAIpQLSf7lL0xymUW9yeLSB-I3j0khhcSYaRTDtGjW0A3lM9EHuamDw/viewform?usp=dialog'
            ],
            [
                'nama' => 'Lomba Cerdas Cermat SD',
                'poster_url' => 'storage/posters/cerdas-cermat-sd.jpg',
                'biaya_pendaftaran_individu' => 0.00,
                'biaya_pendaftaran_tim' => 75000.00,
                'tanggal_mulai' => Carbon::parse('2025-10-10'),
                'tanggal_selesai' => Carbon::parse('2025-10-12'),
                'keterangan' => 'Lomba Cerdas Cermat untuk tingkat SD yang meliputi materi pelajaran umum, pengetahuan umum, dan wawasan kebangsaan.',
                'persyaratan' => "1. Tim terdiri dari 3 siswa SD\n2. Berasal dari sekolah yang sama\n3. Melampirkan Kartu Pelajar\n4. Melampirkan bukti pembayaran\n5. Mengisi formulir pendaftaran",
                'jadwal_kegiatan' => "10 Oktober 2025: Babak Penyisihan\n11 Oktober 2025: Babak Semifinal\n12 Oktober 2025: Babak Final dan Pengumuman Pemenang",
                'hadiah' => "Juara 1: Rp 5.000.000 + Trophy + Sertifikat\nJuara 2: Rp 3.500.000 + Trophy + Sertifikat\nJuara 3: Rp 2.000.000 + Trophy + Sertifikat",
                'jumlah_like' => 215,
                'jumlah_view' => 1345,
                'jenis_lomba' => 1,
                'penyelenggara_id' => 1, // Kemendikbud
                'provinsi_id' => 11, // DKI Jakarta
                'kategori' => [1],
                'link_pendaftaran'=> null, // SD
                'link_pendaftaran'=> null
            ],
            [
                'nama' => 'Kompetisi Business Plan',
                'poster_url' => 'storage/posters/business-plan.jpg',
                'biaya_pendaftaran_individu' => 0.00,
                'biaya_pendaftaran_tim' => 250000.00,
                'tanggal_mulai' => Carbon::parse('2025-05-20'),
                'tanggal_selesai' => Carbon::parse('2025-05-22'),
                'keterangan' => 'Kompetisi Business Plan Nasional untuk memunculkan ide-ide bisnis inovatif dari generasi muda Indonesia.',
                'persyaratan' => "1. Tim terdiri dari 3-4 orang\n2. Peserta adalah mahasiswa aktif\n3. Melampirkan KTM\n4. Melampirkan bukti pembayaran\n5. Mengisi formulir pendaftaran",
                'jadwal_kegiatan' => "20 Mei 2025: Presentasi Proposal\n21 Mei 2025: Business Model Canvas Workshop\n22 Mei 2025: Final Pitch dan Pengumuman Pemenang",
                'hadiah' => "Juara 1: Rp 15.000.000 + Trophy + Sertifikat + Mentoring\nJuara 2: Rp 10.000.000 + Trophy + Sertifikat\nJuara 3: Rp 7.500.000 + Trophy + Sertifikat\nMost Innovative: Rp 5.000.000 + Sertifikat",
                'jumlah_like' => 183,
                'jumlah_view' => 1873,
                'jenis_lomba' => 1,
                'penyelenggara_id' => 2, // PCU
                'provinsi_id' => 12, // Jawa Barat
                'kategori' => [4],
                'link_pendaftaran'=> null, // Mahasiswa
            ],
            [
                'nama' => 'Festival Film Pendek Indonesia',
                'poster_url' => 'storage/posters/film-pendek.jpg',
                'biaya_pendaftaran_individu' => 0.00,
                'biaya_pendaftaran_tim' => 150000.00,
                'tanggal_mulai' => Carbon::parse('2025-04-18'),
                'tanggal_selesai' => Carbon::parse('2025-04-20'),
                'keterangan' => 'Festival Film Pendek Indonesia dengan tema "Keragaman dan Persatuan" untuk merayakan keberagaman Indonesia melalui media sinematik.',
                'persyaratan' => "1. Tim terdiri dari minimal 3 orang\n2. Durasi film 5-15 menit\n3. Format MP4 resolusi minimal 1080p\n4. Melampirkan bukti pembayaran\n5. Mengisi formulir pendaftaran",
                'jadwal_kegiatan' => "18 April 2025: Pemutaran Film Hari 1\n19 April 2025: Pemutaran Film Hari 2 dan Diskusi\n20 April 2025: Pengumuman Pemenang",
                'hadiah' => "Best Film: Rp 15.000.000 + Trophy + Sertifikat\nBest Director: Rp 10.000.000 + Trophy + Sertifikat\nBest Screenplay: Rp 7.500.000 + Trophy + Sertifikat\nAudience Choice: Rp 5.000.000 + Trophy + Sertifikat",
                'jumlah_like' => 220,
                'jumlah_view' => 2347,
                'jenis_lomba' => 0,
                'penyelenggara_id' => 2, // UI
                'provinsi_id' => 11, // DKI Jakarta
                'kategori' => [4,
                'link_pendaftaran'=> null,5], // Mahasiswa, Umum
            ],
            [
                'nama' => 'Olimpiade Kimia SMA',
                'poster_url' => 'storage/posters/kimia.jpg',
                'biaya_pendaftaran_individu' => 120000.00,
                'biaya_pendaftaran_tim' => 0.00,
                'tanggal_mulai' => Carbon::parse('2025-03-08'),
                'tanggal_selesai' => Carbon::parse('2025-03-10'),
                'keterangan' => 'Olimpiade Kimia tingkat SMA adalah kompetisi kimia yang menguji pemahaman teori dan praktik laboratorium dalam bidang kimia.',
                'persyaratan' => "1. Peserta adalah siswa SMA/SMK/MA aktif\n2. Melampirkan Kartu Pelajar\n3. Melampirkan bukti pembayaran\n4. Mengisi formulir pendaftaran",
                'jadwal_kegiatan' => "8 Maret 2025: Babak Penyisihan (Teori)\n9 Maret 2025: Babak Final (Praktikum)\n10 Maret 2025: Pengumuman Pemenang",
                'hadiah' => "Juara 1: Rp 7.500.000 + Trophy + Sertifikat\nJuara 2: Rp 5.000.000 + Trophy + Sertifikat\nJuara 3: Rp 3.000.000 + Trophy + Sertifikat",
                'jumlah_like' => 212,
                'jumlah_view' => 1385,
                'jenis_lomba' => 1,
                'penyelenggara_id' => 4, // UGM
                'provinsi_id' => 14, // DIY
                'kategori' => [3],
                'link_pendaftaran'=> null, // SMA
            ],
            [
                'nama' => 'Lomba Menulis Cerpen',
                'poster_url' => 'storage/posters/cerpen.jpg',
                'biaya_pendaftaran_individu' => 0.00,
                'biaya_pendaftaran_tim' => 0.00,
                'tanggal_mulai' => Carbon::parse('2025-07-25'),
                'tanggal_selesai' => Carbon::parse('2025-07-27'),
                'keterangan' => 'Lomba Menulis Cerpen dengan tema "Kehidupan Masa Depan" untuk mendorong kreativitas dan daya imajinasi penulis muda Indonesia.',
                'persyaratan' => "1. Terbuka untuk umum\n2. Karya harus original maksimal 2500 kata\n3. Format pengumpulan DOC/DOCX\n4. Melampirkan bukti pembayaran\n5. Mengisi formulir pendaftaran",
                'jadwal_kegiatan' => "25 Juli 2025: Workshop Penulisan Kreatif\n26 Juli 2025: Pengumuman Finalis\n27 Juli 2025: Pengumuman Pemenang dan Bedah Karya",
                'hadiah' => "Juara 1: Rp 7.500.000 + Trophy + Sertifikat + Publikasi\nJuara 2: Rp 5.000.000 + Trophy + Sertifikat\nJuara 3: Rp 3.000.000 + Trophy + Sertifikat\nFavorite: Rp 1.500.000 + Sertifikat",
                'jumlah_like' => 200,
                'jumlah_view' => 1425,
                'jenis_lomba' => 1,
                'penyelenggara_id' => 2, // UI
                'provinsi_id' => 11, // DKI Jakarta
                'kategori' => [3,
                'link_pendaftaran'=> null,4, 5], // SMA, Mahasiswa, Umum
            ],
            [
                'nama' => 'Kompetisi Keamanan Siber',
                'poster_url' => 'storage/posters/cyber-security.jpg',
                'biaya_pendaftaran_individu' => 0.00,
                'biaya_pendaftaran_tim' => 300000.00,
                'tanggal_mulai' => Carbon::parse('2025-06-05'),
                'tanggal_selesai' => Carbon::parse('2025-06-07'),
                'keterangan' => 'Kompetisi Keamanan Siber Indonesia dengan format Capture The Flag (CTF) untuk mengasah kemampuan dalam mengidentifikasi dan mengatasi ancaman keamanan siber.',
                'persyaratan' => "1. Tim terdiri dari 2-3 orang\n2. Peserta adalah mahasiswa aktif\n3. Melampirkan KTM\n4. Melampirkan bukti pembayaran\n5. Mengisi formulir pendaftaran",
                'jadwal_kegiatan' => "5 Juni 2025: Technical Briefing dan Workshop\n6 Juni 2025: Kompetisi CTF (24 jam)\n7 Juni 2025: Presentasi dan Pengumuman Pemenang",
                'hadiah' => "Juara 1: Rp 20.000.000 + Trophy + Sertifikat\nJuara 2: Rp 15.000.000 + Trophy + Sertifikat\nJuara 3: Rp 10.000.000 + Trophy + Sertifikat",
                'jumlah_like' => 389,
                'jumlah_view' => 2165,
                'jenis_lomba' => 1,
                'penyelenggara_id' => 6, // Telkom Indonesia
                'provinsi_id' => 12, // Jawa Barat
                'kategori' => [3],
                'link_pendaftaran'=> null,
            ],
            [
                'nama' => 'Olimpiade Matematika Nasional',
                'poster_url' => 'storage/posters/matematika.jpg',
                'biaya_pendaftaran_individu' => 150000.00,
                'biaya_pendaftaran_tim' => 250000.00,
                'tanggal_mulai' => Carbon::parse('2025-02-15'),
                'tanggal_selesai' => Carbon::parse('2025-02-17'),
                'keterangan' => 'Olimpiade Matematika Nasional adalah kompetisi matematika tingkat nasional yang menguji kemampuan peserta dalam pemecahan masalah matematika.',
                'persyaratan' => "1. Peserta adalah siswa aktif\n2. Melampirkan Kartu Pelajar\n3. Melampirkan bukti pembayaran biaya pendaftaran\n4. Mengisi formulir pendaftaran",
                'jadwal_kegiatan' => "15 Februari 2025: Babak Penyisihan\n16 Februari 2025: Semifinal\n17 Februari 2025: Final dan Pengumuman Pemenang",
                'hadiah' => "Juara 1: Rp 10.000.000 + Trophy + Sertifikat\nJuara 2: Rp 7.500.000 + Trophy + Sertifikat\nJuara 3: Rp 5.000.000 + Trophy + Sertifikat",
                'jumlah_like' => 150,
                'jumlah_view' => 1562,
                'jenis_lomba' => 0,
                'penyelenggara_id' => 1, // Kemendikbud
                'provinsi_id' => 11, // DKI Jakarta
                'kategori' => [1,2,3],
                'link_pendaftaran'=> null, // SD, SMP, SMA
            ],
            [
                'nama' => 'Hackathon Indonesia 2025',
                'poster_url' => 'storage/posters/hackathon.jpg',
                'biaya_pendaftaran_individu' => 0.00,
                'biaya_pendaftaran_tim' => 250000.00,
                'tanggal_mulai' => Carbon::parse('2025-03-20'),
                'tanggal_selesai' => Carbon::parse('2025-03-22'),
                'keterangan' => 'Hackathon Indonesia adalah kompetisi pengembangan aplikasi dalam waktu 48 jam untuk menyelesaikan masalah nyata di masyarakat.',
                'persyaratan' => "1. Tim terdiri dari 3-4 orang\n2. Peserta adalah mahasiswa aktif\n3. Melampirkan KTM/KTP masing-masing anggota\n4. Melampirkan bukti pembayaran\n5. Mengisi formulir pendaftaran",
                'jadwal_kegiatan' => "20 Maret 2025: Pembukaan dan Technical Briefing\n20-22 Maret 2025: Kompetisi (48 jam)\n22 Maret 2025: Presentasi dan Pengumuman Pemenang",
                'hadiah' => "Juara 1: Rp 20.000.000 + Trophy + Sertifikat\nJuara 2: Rp 15.000.000 + Trophy + Sertifikat\nJuara 3: Rp 10.000.000 + Trophy + Sertifikat\nBest Innovation: Rp 5.000.000 + Sertifikat",
                'jumlah_like' => 425,
                'jumlah_view' => 2156,
                'jenis_lomba' => 1,
                'penyelenggara_id' => 6, // Telkom Indonesia
                'provinsi_id' => 12, // Jawa Barat
                'kategori' => [4],
                'link_pendaftaran'=> null, // Mahasiswa
            ],
            [
                'nama' => 'Lomba Karya Tulis Ilmiah Nasional',
                'poster_url' => 'storage/posters/lkti.jpg',
                'biaya_pendaftaran_individu' => 75000.00,
                'biaya_pendaftaran_tim' => 100000.00,
                'tanggal_mulai' => Carbon::parse('2025-04-10'),
                'tanggal_selesai' => Carbon::parse('2025-04-12'),
                'keterangan' => 'Lomba Karya Tulis Ilmiah Nasional adalah kompetisi penulisan karya ilmiah dengan tema "Inovasi Teknologi untuk Indonesia Berkelanjutan".',
                'persyaratan' => "1. Peserta adalah mahasiswa aktif\n2. Tim terdiri dari 2-3 orang dari universitas yang sama\n3. Melampirkan KTM\n4. Melampirkan bukti pembayaran\n5. Mengisi formulir pendaftaran",
                'jadwal_kegiatan' => "10 April 2025: Presentasi Paper\n11 April 2025: Tanya Jawab dan Diskusi\n12 April 2025: Pengumuman Pemenang",
                'hadiah' => "Juara 1: Rp 7.500.000 + Trophy + Sertifikat\nJuara 2: Rp 5.000.000 + Trophy + Sertifikat\nJuara 3: Rp 3.000.000 + Trophy + Sertifikat",
                'jumlah_like' => 187,
                'jumlah_view' => 976,
                'jenis_lomba' => 1,
                'penyelenggara_id' => 3, // ITB
                'provinsi_id' => 12, // Jawa Barat
                'kategori' => [4],
                'link_pendaftaran'=> null, // Mahasiswa
            ],
            [
                'nama' => 'Lomba Desain Logo Nasional',
                'poster_url' => 'storage/posters/desain-logo.jpg',
                'biaya_pendaftaran_individu' => 75000.00,
                'biaya_pendaftaran_tim' => 125000.00,
                'tanggal_mulai' => Carbon::parse('2025-05-05'),
                'tanggal_selesai' => Carbon::parse('2025-05-07'),
                'keterangan' => 'Lomba Desain Logo Nasional untuk tema "Indonesia Maju 2045" dalam rangka menyambut 100 tahun Indonesia Merdeka.',
                'persyaratan' => "1. Terbuka untuk umum\n2. Karya harus original\n3. Format pengumpulan PNG dan AI/PSD\n4. Melampirkan bukti pembayaran\n5. Mengisi formulir pendaftaran",
                'jadwal_kegiatan' => "5 Mei 2025: Pameran Karya\n6 Mei 2025: Presentasi Finalis\n7 Mei 2025: Pengumuman Pemenang",
                'hadiah' => "Juara 1: Rp 15.000.000 + Trophy + Sertifikat\nJuara 2: Rp 10.000.000 + Trophy + Sertifikat\nJuara 3: Rp 7.500.000 + Trophy + Sertifikat\nFavorite: Rp 3.000.000 + Sertifikat",
                'jumlah_like' => 225,
                'jumlah_view' => 1823,
                'jenis_lomba' => 1,
                'penyelenggara_id' => 3, // UI
                'provinsi_id' => 11, // DKI Jakarta
                'kategori' => [4,5],
                'link_pendaftaran'=> null, // Mahasiswa, Umum
            ],
            [
                'nama' => 'Festival Robotika Indonesia',
                'poster_url' => 'storage/posters/robotika.jpg',
                'biaya_pendaftaran_individu' => 0.00,
                'biaya_pendaftaran_tim' => 300000.00,
                'tanggal_mulai' => Carbon::parse('2025-06-15'),
                'tanggal_selesai' => Carbon::parse('2025-06-18'),
                'keterangan' => 'Festival Robotika Indonesia adalah kompetisi robotika terbesar di Indonesia dengan berbagai kategori lomba.',
                'persyaratan' => "1. Tim terdiri dari 3-5 orang\n2. Peserta adalah pelajar atau mahasiswa aktif\n3. Melampirkan Kartu Pelajar/KTM\n4. Melampirkan bukti pembayaran\n5. Mengisi formulir pendaftaran\n6. Mematuhi spesifikasi robot sesuai kategori",
                'jadwal_kegiatan' => "15 Juni 2025: Technical Meeting dan Inspection\n16-17 Juni 2025: Kompetisi\n18 Juni 2025: Final dan Pengumuman Pemenang",
                'hadiah' => "Kategori Line Follower:\nJuara 1: Rp 10.000.000 + Trophy + Sertifikat\nJuara 2: Rp 7.500.000 + Trophy + Sertifikat\nJuara 3: Rp 5.000.000 + Trophy + Sertifikat\n\nKategori Soccer Robot:\nJuara 1: Rp 15.000.000 + Trophy + Sertifikat\nJuara 2: Rp 10.000.000 + Trophy + Sertifikat\nJuara 3: Rp 7.500.000 + Trophy + Sertifikat",
                'jumlah_like' => 410,
                'jumlah_view' => 2345,
                'jenis_lomba' => 0,
                'penyelenggara_id' => 4, // UGM
                'provinsi_id' => 14, // DIY
                'kategori' => [3,4],
                'link_pendaftaran'=> null, // SMA, Mahasiswa
            ],

            // 15 additional competitions
            [
                'nama' => 'Kompetisi Debat Bahasa Inggris',
                'poster_url' => 'storage/posters/debat-inggris.jpg',
                'biaya_pendaftaran_individu' => 0.00,
                'biaya_pendaftaran_tim' => 200000.00,
                'tanggal_mulai' => Carbon::parse('2025-07-05'),
                'tanggal_selesai' => Carbon::parse('2025-07-07'),
                'keterangan' => 'Kompetisi Debat Bahasa Inggris Nasional dengan format British Parliamentary untuk meningkatkan kemampuan berpikir kritis dan berbicara di depan umum.',
                'persyaratan' => "1. Tim terdiri dari 3 orang\n2. Peserta adalah mahasiswa aktif\n3. Melampirkan KTM\n4. Melampirkan bukti pembayaran\n5. Mengisi formulir pendaftaran",
                'jadwal_kegiatan' => "5 Juli 2025: Babak Penyisihan\n6 Juli 2025: Perempat Final dan Semifinal\n7 Juli 2025: Final dan Pengumuman Pemenang",
                'hadiah' => "Juara 1: Rp 10.000.000 + Trophy + Sertifikat\nJuara 2: Rp 7.500.000 + Trophy + Sertifikat\nJuara 3: Rp 5.000.000 + Trophy + Sertifikat\nBest Speaker: Rp 2.000.000 + Trophy + Sertifikat",
                'jumlah_like' => 120,
                'jumlah_view' => 1672,
                'jenis_lomba' => 0,
                'penyelenggara_id' => 2, // PETRA
                'provinsi_id' => 11, // DKI Jakarta
                'kategori' => [4],
                'link_pendaftaran'=> null, // Mahasiswa
            ],
            [
                'nama' => 'Olimpiade Fisika Nasional',
                'poster_url' => 'storage/posters/fisika.jpg',
                'biaya_pendaftaran_individu' => 150000.00,
                'biaya_pendaftaran_tim' => 0.00,
                'tanggal_mulai' => Carbon::parse('2025-08-10'),
                'tanggal_selesai' => Carbon::parse('2025-08-12'),
                'keterangan' => 'Olimpiade Fisika Nasional adalah kompetisi fisika tingkat nasional yang menguji kemampuan teori dan eksperimen peserta dalam bidang fisika.',
                'persyaratan' => "1. Peserta adalah siswa SMA/SMK/MA aktif\n2. Melampirkan Kartu Pelajar\n3. Melampirkan bukti pembayaran\n4. Mengisi formulir pendaftaran",
                'jadwal_kegiatan' => "10 Agustus 2025: Babak Penyisihan (Teori)\n11 Agustus 2025: Babak Final (Eksperimen)\n12 Agustus 2025: Pengumuman Pemenang",
                'hadiah' => "Juara 1: Rp 8.000.000 + Trophy + Sertifikat\nJuara 2: Rp 6.000.000 + Trophy + Sertifikat\nJuara 3: Rp 4.000.000 + Trophy + Sertifikat",
                'jumlah_like' => 180,
                'jumlah_view' => 1487,
                'jenis_lomba' => 1,
                'penyelenggara_id' => 5, // Kemendikbud
                'provinsi_id' => 11, // DKI Jakarta
                'kategori' => [3],
                'link_pendaftaran'=> null, // SMA
            ],
            [
                'nama' => 'Kompetisi Desain UI/UX',
                'poster_url' => 'storage/posters/ui-ux.jpg',
                'biaya_pendaftaran_individu' => 150000.00,
                'biaya_pendaftaran_tim' => 200000.00,
                'tanggal_mulai' => Carbon::parse('2025-07-15'),
                'tanggal_selesai' => Carbon::parse('2025-07-17'),
                'keterangan' => 'Kompetisi Desain UI/UX dengan tema "Aplikasi Masa Depan" untuk mendorong inovasi dalam desain antarmuka yang berfokus pada pengalaman pengguna.',
                'persyaratan' => "1. Tim terdiri dari 1-3 orang\n2. Peserta adalah mahasiswa aktif\n3. Melampirkan KTM\n4. Melampirkan bukti pembayaran\n5. Mengisi formulir pendaftaran",
                'jadwal_kegiatan' => "15 Juli 2025: Workshop UI/UX Design\n16 Juli 2025: Presentasi Karya\n17 Juli 2025: Pengumuman Pemenang",
                'hadiah' => "Juara 1: Rp 12.000.000 + Trophy + Sertifikat\nJuara 2: Rp 8.000.000 + Trophy + Sertifikat\nJuara 3: Rp 5.000.000 + Trophy + Sertifikat\nBest Innovation: Rp 3.000.000 + Sertifikat",
                'jumlah_like' => 205,
                'jumlah_view' => 1895,
                'jenis_lomba' => 0,
                'penyelenggara_id' => 4, // ITB
                'provinsi_id' => 12, // Jawa Barat
                'kategori' => [4],
                'link_pendaftaran'=> null, // Mahasiswa
            ],

            [
                'nama' => 'Kompetisi Videografi Pendek',
                'poster_url' => 'storage/posters/videografi.jpg',
                'biaya_pendaftaran_individu' => 100000.00,
                'biaya_pendaftaran_tim' => 160000.00,
                'tanggal_mulai' => Carbon::parse('2025-08-15'),
                'tanggal_selesai' => Carbon::parse('2025-08-17'),
                'keterangan' => 'Kompetisi Videografi Pendek dengan tema "Indonesia Kini dan Nanti" untuk mendokumentasikan keindahan dan tantangan Indonesia melalui media visual.',
                'persyaratan' => "1. Terbuka untuk umum\n2. Durasi video 1-3 menit\n3. Format MP4 resolusi minimal 1080p\n4. Melampirkan bukti pembayaran\n5. Mengisi formulir pendaftaran",
                'jadwal_kegiatan' => "15 Agustus 2025: Pemutaran Video Hari 1\n16 Agustus 2025: Pemutaran Video Hari 2 dan Workshop\n17 Agustus 2025: Pengumuman Pemenang",
                'hadiah' => "Juara 1: Rp 8.000.000 + Trophy + Sertifikat\nJuara 2: Rp 5.000.000 + Trophy + Sertifikat\nJuara 3: Rp 3.000.000 + Trophy + Sertifikat\nPeople's Choice: Rp 2.000.000 + Sertifikat",
                'jumlah_like' => 310,
                'jumlah_view' => 1765,
                'jenis_lomba' => 1,
                'penyelenggara_id' => 3, // UI
                'provinsi_id' => 11, // DKI Jakarta
                'kategori' => [5],
                'link_pendaftaran'=> null, // Umum
            ],
            [
                'nama' => 'Lomba Menulis Esai Nasional',
                'poster_url' => 'storage/posters/esai.jpg',
                'biaya_pendaftaran_individu' => 85000.00,
                'biaya_pendaftaran_tim' => 0.00,
                'tanggal_mulai' => Carbon::parse('2025-06-25'),
                'tanggal_selesai' => Carbon::parse('2025-06-27'),
                'keterangan' => 'Lomba Menulis Esai Nasional dengan tema "Keberlanjutan Lingkungan di Era Digital" untuk mendorong pemikiran kritis tentang isu-isu terkini.',
                'persyaratan' => "1. Terbuka untuk mahasiswa\n2. Karya harus original 1000-1500 kata\n3. Format DOC/DOCX\n4. Melampirkan bukti pembayaran\n5. Mengisi formulir pendaftaran",
                'jadwal_kegiatan' => "25 Juni 2025: Seminar Penulisan Esai\n26 Juni 2025: Pengumuman Finalis\n27 Juni 2025: Presentasi dan Pengumuman Pemenang",
                'hadiah' => "Juara 1: Rp 7.000.000 + Trophy + Sertifikat + Publikasi\nJuara 2: Rp 5.000.000 + Trophy + Sertifikat\nJuara 3: Rp 3.000.000 + Trophy + Sertifikat",
                'jumlah_like' => 267,
                'jumlah_view' => 1450,
                'jenis_lomba' => 1,
                'penyelenggara_id' => 4, // ITB
                'provinsi_id' => 12, // Jawa Barat
                'kategori' => [4],
                'link_pendaftaran'=> null, // Mahasiswa
            ],
            [
                'nama' => 'Turnamen Futsal Antar SMP',
                'poster_url' => 'storage/posters/futsal-smp.jpg',
                'biaya_pendaftaran_individu' => 0.00,
                'biaya_pendaftaran_tim' => 350000.00,
                'tanggal_mulai' => Carbon::parse('2025-03-15'),
                'tanggal_selesai' => Carbon::parse('2025-03-17'),
                'keterangan' => 'Turnamen Futsal Antar SMP Se-Jawa untuk mendorong semangat olahraga dan sportivitas di kalangan pelajar.',
                'persyaratan' => "1. Tim terdiri dari 10 siswa (5 inti, 5 cadangan)\n2. Peserta adalah siswa SMP aktif\n3. Melampirkan Kartu Pelajar\n4. Melampirkan bukti pembayaran\n5. Mengisi formulir pendaftaran",
                'jadwal_kegiatan' => "15 Maret 2025: Babak Penyisihan\n16 Maret 2025: Babak Perempat dan Semifinal\n17 Maret 2025: Babak Final dan Pengumuman Pemenang",
                'hadiah' => "Juara 1: Rp 10.000.000 + Trophy + Medali + Sertifikat\nJuara 2: Rp 7.500.000 + Trophy + Medali + Sertifikat\nJuara 3: Rp 5.000.000 + Trophy + Medali + Sertifikat\nBest Player: Trophy + Sertifikat\nTop Scorer: Trophy + Sertifikat",
                'jumlah_like' => 182,
                'jumlah_view' => 1950,
                'jenis_lomba' => 0,
                'penyelenggara_id' => 1, // Kemendikbud
                'provinsi_id' => 12, // Jawa Barat
                'kategori' => [2],
                'link_pendaftaran'=> null, // SMP
            ],
            [
                'nama' => 'Kompetisi Data Science',
                'poster_url' => 'storage/posters/data-science.jpg',
                'biaya_pendaftaran_individu' => 150000.00,
                'biaya_pendaftaran_tim' => 250000.00,
                'tanggal_mulai' => Carbon::parse('2025-09-25'),
                'tanggal_selesai' => Carbon::parse('2025-09-27'),
                'keterangan' => 'Kompetisi Data Science dengan studi kasus nyata untuk mengasah kemampuan analisis dan pengolahan data dalam menyelesaikan masalah.',
                'persyaratan' => "1. Tim terdiri dari 2-3 orang\n2. Peserta adalah mahasiswa aktif\n3. Melampirkan KTM\n4. Melampirkan bukti pembayaran\n5. Mengisi formulir pendaftaran",
                'jadwal_kegiatan' => "25 September 2025: Workshop Data Science\n26 September 2025: Kompetisi dan Pengerjaan Kasus\n27 September 2025: Presentasi dan Pengumuman Pemenang",
                'hadiah' => "Juara 1: Rp 15.000.000 + Trophy + Sertifikat\nJuara 2: Rp 10.000.000 + Trophy + Sertifikat\nJuara 3: Rp 7.500.000 + Trophy + Sertifikat\nBest Insight: Rp 3.000.000 + Sertifikat",
                'jumlah_like' => 200,
                'jumlah_view' => 2120,
                'jenis_lomba' => 1,
                'penyelenggara_id' => 6, // Telkom Indonesia
                'provinsi_id' => 11, // DKI Jakarta
                'kategori' => [4],
                'link_pendaftaran'=> null, // Mahasiswa
            ],
            [
                'nama' => 'Lomba Cerdas Cermat SMP',
                'poster_url' => 'storage/posters/cerdas-cermat-smp.jpg',
                'biaya_pendaftaran_individu' => 0.00,
                'biaya_pendaftaran_tim' => 85000.00,
                'tanggal_mulai' => Carbon::parse('2025-05-15'),
                'tanggal_selesai' => Carbon::parse('2025-05-17'),
                'keterangan' => 'Lomba Cerdas Cermat untuk tingkat SMP yang meliputi materi pelajaran umum, pengetahuan umum, dan wawasan kebangsaan.',
                'persyaratan' => "1. Tim terdiri dari 3 siswa SMP\n2. Berasal dari sekolah yang sama\n3. Melampirkan Kartu Pelajar\n4. Melampirkan bukti pembayaran\n5. Mengisi formulir pendaftaran",
                'jadwal_kegiatan' => "15 Mei 2025: Babak Penyisihan\n16 Mei 2025: Babak Semifinal\n17 Mei 2025: Babak Final dan Pengumuman Pemenang",
                'hadiah' => "Juara 1: Rp 6.000.000 + Trophy + Sertifikat\nJuara 2: Rp 4.000.000 + Trophy + Sertifikat\nJuara 3: Rp 2.500.000 + Trophy + Sertifikat",
                'jumlah_like' => 232,
                'jumlah_view' => 1475,
                'jenis_lomba' => 1,
                'penyelenggara_id' => 1, // Kemendikbud
                'provinsi_id' => 11, // DKI Jakarta
                'kategori' => [2],
                'link_pendaftaran'=> null, // SMP
            ],
            [
                'nama' => 'Lomba Menulis Puisi Nasional',
                'poster_url' => 'storage/posters/puisi.jpg',
                'biaya_pendaftaran_individu' => 0.00,
                'biaya_pendaftaran_tim' => 0.00,
                'tanggal_mulai' => Carbon::parse('2025-10-20'),
                'tanggal_selesai' => Carbon::parse('2025-10-22'),
                'keterangan' => 'Lomba Menulis Puisi Nasional dengan tema "Cinta dan Harapan" untuk mengekspresikan keindahan bahasa dan kedalaman perasaan.',
                'persyaratan' => "1. Terbuka untuk umum\n2. Karya harus original maksimal 30 baris\n3. Format pengumpulan DOC/PDF\n4. Melampirkan bukti pembayaran\n5. Mengisi formulir pendaftaran",
                'jadwal_kegiatan' => "20 Oktober 2025: Workshop Puisi\n21 Oktober 2025: Pembacaan Puisi Finalis\n22 Oktober 2025: Pengumuman Pemenang",
                'hadiah' => "Juara 1: Rp 5.000.000 + Trophy + Sertifikat + Publikasi\nJuara 2: Rp 3.500.000 + Trophy + Sertifikat\nJuara 3: Rp 2.000.000 + Trophy + Sertifikat\nFavorite: Rp 1.000.000 + Sertifikat",
                'jumlah_like' => 265,
                'jumlah_view' => 1385,
                'jenis_lomba' => 1,
                'penyelenggara_id' => 3, // UI
                'provinsi_id' => 11, // DKI Jakarta
                'kategori' => [3,4,5],
                'link_pendaftaran'=> null, // SMA, Mahasiswa, Umum
            ],
            [
                'nama' => 'Kompetisi Fotografi Nasional',
                'poster_url' => 'storage/posters/fotografi.png',
                'biaya_pendaftaran_individu' => 100000.00,
                'biaya_pendaftaran_tim' => 0.00,
                'tanggal_mulai' => Carbon::parse('2025-09-01'),
                'tanggal_selesai' => Carbon::parse('2025-09-03'),
                'keterangan' => 'Kompetisi Fotografi Nasional dengan tema "Keindahan Alam dan Budaya Indonesia" untuk mengeksplorasi kekayaan alam dan keberagaman budaya Indonesia.',
                'persyaratan' => "1. Terbuka untuk umum\n2. Karya harus original\n3. Format JPEG resolusi minimal 12MP\n4. Melampirkan bukti pembayaran\n5. Mengisi formulir pendaftaran",
                'jadwal_kegiatan' => "1 September 2025: Pameran Karya Finalis\n2 September 2025: Presentasi dan Penjurian\n3 September 2025: Pengumuman Pemenang",
                'hadiah' => "Juara 1: Rp 10.000.000 + Trophy + Sertifikat\nJuara 2: Rp 7.500.000 + Trophy + Sertifikat\nJuara 3: Rp 5.000.000 + Trophy + Sertifikat\nFavorite: Rp 2.500.000 + Sertifikat",
                'jumlah_like' => 387,
                'jumlah_view' => 2105,
                'jenis_lomba' => 0,
                'penyelenggara_id' => 5, //Telkom Indonesia
                'provinsi_id' => 12, // Jawa Barat
                'kategori' => [5],
                'link_pendaftaran'=> null, // Umum
            ],
            [
                'nama' => 'Kompetisi Mobile Legends',
                'poster_url' => 'storage/posters/mobile-legends.jpg',
                'biaya_pendaftaran_individu' => 0.00,
                'biaya_pendaftaran_tim' => 200000.00,
                'tanggal_mulai' => Carbon::parse('2025-08-22'),
                'tanggal_selesai' => Carbon::parse('2025-08-24'),
                'keterangan' => 'Turnamen Mobile Legends Bang Bang Nasional untuk mengasah kemampuan strategi dan kerja sama tim dalam eSports.',
                'persyaratan' => "1. Tim terdiri dari 5 orang inti dan 1 cadangan\n2. Minimal level akun 30\n3. Melampirkan bukti pembayaran\n4. Mengisi formulir pendaftaran",
                'jadwal_kegiatan' => "22 Agustus 2025: Babak Penyisihan (Grup)\n23 Agustus 2025: Babak Perempat Final dan Semifinal\n24 Agustus 2025: Babak Final dan Pengumuman Pemenang",
                'hadiah' => "Juara 1: Rp 15.000.000 + Trophy + Sertifikat\nJuara 2: Rp 10.000.000 + Trophy + Sertifikat\nJuara 3: Rp 5.000.000 + Trophy + Sertifikat\nMVP: Rp 2.000.000 + Sertifikat",
                'jumlah_like' => 210,
                'jumlah_view' => 3245,
                'jenis_lomba' => 1,
                'penyelenggara_id' => 6, // Telkom Indonesia
                'provinsi_id' => 11, // DKI Jakarta
                'kategori' => [5],
                'link_pendaftaran'=> null, // Umum
            ],
            [
                'nama' => 'Lomba Cipta Lagu Anak',
                'poster_url' => 'storage/posters/cipta-lagu.jpg',
                'biaya_pendaftaran_individu' => 150000.00,
                'biaya_pendaftaran_tim' => 250000.00,
                'tanggal_mulai' => Carbon::parse('2025-09-15'),
                'tanggal_selesai' => Carbon::parse('2025-09-17'),
                'keterangan' => 'Lomba Cipta Lagu Anak dengan tema "Cinta Tanah Air" untuk menumbuhkan kreativitas dan menanamkan nilai-nilai positif bagi anak-anak Indonesia.',
                'persyaratan' => "1. Terbuka untuk umum\n2. Karya harus original\n3. Format MP3 dan partitur\n4. Melampirkan bukti pembayaran\n5. Mengisi formulir pendaftaran",
                'jadwal_kegiatan' => "15 September 2025: Workshop Penulisan Lagu\n16 September 2025: Presentasi Karya Finalis\n17 September 2025: Pengumuman Pemenang",
                'hadiah' => "Juara 1: Rp 10.000.000 + Trophy + Sertifikat + Rekaman Profesional\nJuara 2: Rp 7.500.000 + Trophy + Sertifikat\nJuara 3: Rp 5.000.000 + Trophy + Sertifikat\nFavorite: Rp 2.500.000 + Sertifikat",
                'jumlah_like' => 298,
                'jumlah_view' => 1745,
                'jenis_lomba' => 0,
                'penyelenggara_id' => 1, // Kemendikbud
                'provinsi_id' => 11, // DKI Jakarta
                'kategori' => [5],
                'link_pendaftaran'=> null, // Umum
            ],

        ];

        // Pastikan direktori storage/posters ada
        Storage::disk('public')->makeDirectory('posters', 0775, true);

        foreach ($lombas as $lomba) {
            $kategoris = $lomba['kategori'];
            unset($lomba['kategori']);

            // Pastikan URL poster mengikuti format storage
            if (isset($lomba['poster_url'])) {
                $posterPath = $lomba['poster_url'];
                if (!str_starts_with($posterPath, 'images/posters/')) {
                    $posterFileName = basename($posterPath);
                    $lomba['poster_url'] = 'images/posters/' . $posterFileName;
                }
            }

            $lombaModel = Lomba::create($lomba);

            // Attach kategori peserta
            $lombaModel->pesertaKategori()->attach($kategoris);
        }
    }
}
