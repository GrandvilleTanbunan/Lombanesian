<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Penyelenggara;

class PenyelenggaraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $penyelenggaras = [
            [
                'nama' => 'Kementerian Pendidikan dan Kebudayaan',
                'logo_url' => 'storage/penyelenggara/kemendikbud.png',
                'tentang' => 'Kementerian Pendidikan dan Kebudayaan Republik Indonesia adalah kementerian dalam Pemerintah Indonesia yang menyelenggarakan urusan di bidang pendidikan dan kebudayaan.',
                'website' => 'https://www.kemdikbud.go.id/',
                'provinsi_id' => 11,
            ],
            [
                'nama' => 'Petra Christian University',
                'logo_url' => 'storage/penyelenggara/pcu.png',
                'tentang' => "Universitas Kristen Petra adalah tempat di mana pemimpin-pemimpin sosial global dibentuk dan ditempa berlandaskan nilai-nilai kristiani. Kami mengundangmu untuk menimba ilmu di universitas yang peduli dan global, untuk belajar di bawah staf pengajar yang teruji dan bergabung dengan para mahasiswa dengan visi yang sama—membawa dampak bagi dunia.

Meningkatkan KREDIBILITAS UK Petra menjadi perguruan tinggi kelas dunia.

Membangun CIVILITAS kehidupan berbangsa dan bernegara di UK Petra dalam rangka pembentukan, pengembangan dan penguatan Civil Society.

Visi:
Menjadi Universitas Kristen terkemuka di dunia yang mentransformasi masyarakat untuk Kemuliaan Tuhan.

Misi:
Mempertahankan INTEGRITAS UK Petra sebagai perguruan tinggi Kristen.
Meningkatkan KREDIBILITAS UK Petra menjadi perguruan tinggi kelas dunia.
Membangun CIVILITAS kehidupan berbangsa dan bernegara di UK Petra dalam rangka pembentukan, pengembangan dan penguatan Civil Society.",
                'website' => 'https://www.petra.ac.id/',
                'provinsi_id' => 15, // Jawa Timur
            ],
            [
                'nama' => 'Universitas Indonesia',
                'logo_url' => 'storage/penyelenggara/ui.png',
                'tentang' => 'UI adalah salah satu universitas riset atau institusi akademik terkemuka di dunia yang terus mengejar pencapaian tertinggi dalam hal penemuan, pengembangan dan difusi pengetahuan secara regional dan global.

Dengan prestasi yang terus diraihnya UI berada di peringkat kampus terbaik di Indonesia berdasarkan penilaian Lembaga pemeringkatan dunia.

Dengan lebih dari 400.000 alumni dalam jaringan yang kuat, UI terus memainkan peran penting di tingkat nasional dan global. Berdasarkan penilaian Quacquarelli Symonds, UI merupakan kampus penghasil lulusan terbaik di Indonesia yang kompeten, inovatif dan efektif di lingkungan kerja.

UI terus bekerjasama aktif dalam jaringan internasional dengan banyak perguruan tinggi ternama dunia serta beberapa asosiasi pendidikan dan riset diantaranya: APRU (Association of Pacific Rim Universities), AUN (ASEAN University Network), and ASAIHL (Association of South East Asia Institution of Higher Learning) dan dikenal sebagai pionir inovasi.',
                'website' => 'https://www.ui.ac.id/',
                'provinsi_id' => 11,
            ],
            [
                'nama' => 'Institut Teknologi Bandung',
                'logo_url' => 'storage/penyelenggara/itb.png',
                'tentang' => 'Institut Teknologi Bandung (ITB) merupakan sekolah tinggi teknik pertama di Indonesia yang didirikan pada tanggal 3 Juli 1920 sebagai de Technische Hoogeschool te Bandoeng (TH). Tanggal 2 Maret 1959 diresmikan sebagai ITB dengan misi pengabdian ilmu pengetahuan dan teknologi untuk memajukan Indonesia. ITB hadir untuk mengoptimalkan pembangunan bangsa yang maju dan bermartabat.',
                'website' => 'https://itb.ac.id/',
                'provinsi_id' => 12, // Jawa Barat
            ],
            [
                'nama' => 'Universitas Gadjah Mada',
                'logo_url' => 'storage/penyelenggara/ugm.png',
                'tentang' => 'Universitas Gadjah Mada lahir dari kancah perjuangan revolusi kemerdekaan bangsa Indonesia. Didirikan pada periode awal kemerdekaan, UGM didaulat sebagai Balai Nasional Ilmu Pengetahuan dan Kebudayaan bagi penyelenggaraan pendidikan tinggi nasional.

Berdiri dengan nama “Universitas Negeri Gadjah Mada”, perguruan tinggi ini merupakan gabungan dari beberapa sekolah tinggi yang telah lebih dulu didirikan, di antaranya Balai Perguruan Tinggi Gadjah Mada, Sekolah Tinggi Teknik, dan Akademi Ilmu Politik yang terletak di Yogyakarta, Balai Pendidikan Ahli Hukum di Solo, serta Perguruan Tinggi Kedokteran Bagian Praklinis di Klaten, yang disahkan dengan Peraturan Pemerintah No. 23 Tahun 1949 tentang Peraturan Penggabungan Perguruan Tinggi menjadi Universiteit.',
                'website' => 'https://ugm.ac.id/id/',
                'provinsi_id' => 14,
            ],
            [
                'nama' => 'Telkom Indonesia',
                'logo_url' => 'storage/penyelenggara/telkom.png',
                'tentang' => 'PT Telkom Indonesia (Persero) Tbk (Telkom) adalah badan usaha milik negara (BUMN) yang bergerak di bidang layanan teknologi informasi dan komunikasi serta telekomunikasi digital di Indonesia.

Pemilik mayoritas saham Telkom adalah pemerintah Republik Indonesia dengan kepemilikan sebesar 52,09 %. Sementara sisa kepemilikan saham sebesar 47,91 % dipegang oleh publik. Telkom memiliki 12 anak perusahaan atau subsidiary yang bergerak di berbagai sektor dan memberikan dampak positif baik untuk investor maupun rakyat Indonesia.

Pendirian PN Telekomunikasi, sesuai PP No. 30 tanggal 6 Juli 1965, pada dasarnya ditujukan untuk membangun ekonomi nasional sesuai dengan ekonomi terpimpin dengan mengutamakan kebutuhan rakyat dan ketenteraman rakyat serta ketenangan kerja dalam perusahaan, menuju masyarakat yang adil dan makmur materiil dan spiritual. Semangat itulah yang senantiasa diemban TelkomGroup, dari produk fixed line hingga saat ini bertransformasi menjadi digital telecommunication company.',
                'website' => 'https://www.telkom.co.id/sites',
                'provinsi_id' => 12, // Jawa Barat
            ],
        ];

        foreach ($penyelenggaras as $penyelenggara) {
            Penyelenggara::create($penyelenggara);
        }
    }
}
