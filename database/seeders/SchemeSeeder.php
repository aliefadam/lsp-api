<?php

namespace Database\Seeders;

use App\Models\Scheme;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SchemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Scheme::create([
        //     "event_id" => 1,
        //     "name" => "Kualifikasi 5 Bidang Analisis Kebijakan",
        //     "price" => 1_500_000,
        // ]);
        // Scheme::create([
        //     "event_id" => 1,
        //     "name" => "Kualifikasi 6 Bidang Analisis Kebijakan",
        //     "price" => 2_000_000,
        // ]);
        // Scheme::create([
        //     "event_id" => 1,
        //     "name" => "Kualifikasi 7 Bidang Analisis Kebijakan",
        //     "price" => 2_500_000,
        // ]);
        Scheme::create([
            "name" => "SKEMA SERTIFIKASI KKNI KUALIFIKASI 5 BIDANG ANALISIS KEBIJAKAN PUBLIK",
            "slug" => "skema-sertifikasi-kkni-kualifikasi-5-bidang-analisis-kebijakan-publik",
            "desc" => "<p>Skema sertifikasi KKNI Level 5 Bidang Analisis Kebijakan Publik merupakan skema sertifikasi yang dikembangkan oleh Komite Skema Sertifikasi LSP Lembaga Administrasi Negara untuk memenuhi kebutuhan sertifikasi kompetensi kerja di LSP Lembaga Administrasi Negara. Kemasan yang digunakan mengacu pada Standar Kompetensi Kerja Nasional Indonesia yang ditetapkan berdasarkan Keputusan Menteri Tenaga Kerja dan Transmigrasi Republik Indonesia Nomor 209 Tahun 2013 Tentang Kategori Jasa Profesional, Ilmiah dan Teknis Golongan Pokok Jasa Arsitektur dan Teknik Sipil Serta Konsultasi YBDI Golongan Jasa Arsitektur dan Teknik Sipil; Analisis dan Uji Teknis Sub Golongan Jasa Arsitektur dan Teknik Sipil Serta Konsultasi Teknis YBDI Bidang Arsitektur Sub Bidang Arsitektur Lanskap Perancang Lanskap, Keputusan Menteri Ketenagakerjaan Republik Indonesia Nomor 320 Tahun 2016 Tentang Kategori Konstruksi Golongan Pokok Konstruksi Bangunan Sipil pada Jabatan Kerja Ahli Teknik Dermaga, Keputusan Menteri Ketenagakerjaan Republik Indonesia Nomor 629 Tahun 2016 Tentang Kategori Kegiatan Jasa Lainnya Golongan Pokok Kegiatan Organisasi Bisnis, Pengusaha dan Profesi Bidang Kehumasan, Keputusan Menteri Ketenagakerjaan Republik Nomor 32 Tahun 2017 Tentang Penetapan Standar Kompetensi Kerja Nasional Indonesia Kategori Pertanian, Kehutanan dan Perikanan Golongan Pokok Pertanian Tanaman, Peternakan, Perburuan dan Kegiatan Yang Berhubungan Dengan Itu (YBDI) Bidang Manajemen Agribisnis, Keputusan Menteri Ketenagakerjaan Republik Indonesia Nomor 126 Tahun 2017 Tentang Kategori Pertambangan dan Penggalian Golongan Pokok Pertambangan Minyak Bumi dan Gas Alam dan Panas Bumi Pada Jabatan Kerja Ahli Geokimia Panas Bumi, Keputusan Menteri Ketenagakerjaan Republik Indonesia Nomor 106 Tahun 2018 Tentang Penetapan Standar Kompetensi Kerja Nasional Indonesia Kategori Aktivitas Profesional, Ilmiah dan Teknis Golongan Pokok Penelitian dan Pengembangan Ilmu Pengetahuan pada Jabatan Kerja Analis Kebijakan Publik, Keputusan Menteri Ketenagakerjaan Republik Indonesia Nomor 11 Tahun 2019 tentang Penetapan Standar Kompetensi Kerja Nasional Indonesia Kategori Administrasi Pemerintahan, Pertahanan dan Jaminan Sosial Wajib Golongan Pokok Administrasi Pemerintahan, Pertahanan dan Jaminan Sosial Wajib Bidang Perencanaan Pembangunan, Peraturan Lembaga Administrasi Negara Nomor 14 Tahun 2019 tentang Kerangka Kualifikasi Nasional Indonesia Analis Kebijakan dan Keputusan Kepala Lembaga Administrasi Negara Nomor 547/K.1/HKM.02.2/2019 tentang Jenjang Kerangka Kualifikasi Nasional Indonesia Analis Kebijakan. Skema sertifikasi ini digunakan sebagai acuan pada pelaksanaan assesmen oleh Asesor kompetensi LSP LAN dan memastikan kompetensi pada KKNI Level 5 Bidang Analisis Kebijakan Publik.</p>",
            "price" => 1500000,
            "doc" => "SCHEME_DOC_20250917122656.pdf",
        ]);
        Scheme::create([
            "name" => "SKEMA SERTIFIKASI KKNI KUALIFIKASI 6 BIDANG ANALISIS KEBIJAKAN PUBLIK",
            "slug" => "skema-sertifikasi-kkni-kualifikasi-6-bidang-analisis-kebijakan-publik",
            "desc" => "<p>Skema sertifikasi KKNI Level 6. Bidang Analis Kebijakan Publik merupakan skema sertifikasi yang diadopsi oleh Komite Skema LSP Administrasi Publik Indonesia untuk memenuhi kebutuhan sertifikasi kompetensi kerja di bidang analisis kebijakan publik. Kemasan yang digunakan mengacu pada Standar Kompetensi Kerja Nasional Indonesia yang ditetapkan berdasarkan Keputusan Menteri Tenaga Kerja dan Transmigrasi Republik Indonesia Nomor 209 Tahun 2013 Tentang Penetapan Standar Kompetensi Kerja Nasional Indonesia Kategori Jasa Profesional, Ilmiah dan Teknis Golongan Pokok Jasa Arsitektur dan Teknik Sipil; Analisis dan Uji Teknis Golongan Jasa Arsitektur dan Teknik Sipil serta Konsultasi Teknis YBDI Sub Golongan Jasa Arsitektur dan Teknik Sipil; Analisis dan Uji Teknis Golongan Jasa Arsitektur dan Teknik Sipil serta Konsultasi Teknis YBDI Sub Golongan Jasa Arsitektur dan Teknik Sipil Serta Konsultasi Teknis YBDI Bidang Arsitektur Sub Bidang Lanskap Perancang Lanskap, Keputusan Menteri Ketenagakerjaan Republik Indonesia Nomor 629 Tahun 2016 Penetapan Standar Kompetensi Kerja Nasional Indonesia Kategori Kegiatan Jasa Lainnya Golongan Pokok Kegiatan Organisasi Bisnis, Pengusaha dan Profesi Bidang Kehumasan, Keputusan Menteri Ketenagakerjaan Republik Indonesia Nomor 32 Tahun 2017 Tentang Penetapan Standar Kompetensi Kerja Nasional Indonesia Kategori Pertanian, Kehutanan, dan Perikanan Golongan Pokok Pertanian Tanaman, Peternakan, Perburuan dan Kegiatan Yang Berhubungan Dengan Itu (YBDI) Bidang Manajemen Agribisnis, Keputusan Menteri Ketenagakerjaan Republik Indonesia Nomor 126 Tahun 2017 Tentang Penetapan Standar Kompetensi Kerja Nasional Indonesia Kategori Pertambangan dan Penggalian Golongan Pokok Pertambangan Minyak Bumi dan Gas Alam dan Panas Bumi Pada Jabatan Kerja Ahli Geokimia Panas Bumi, Keputusan Menteri Ketenagakerjaan Republik Indonesia Nomor 106 Tahun 2018 Tentang Penetapan Standar Kompetensi Kerja Nasional Indonesia Kategori Aktivitas Profesional, Ilmiah dan Teknis Golongan Pokok Penelitian dan Pengembangan Ilmu Pengetahuan pada Jabatan Kerja Analis Kebijakan Publik, Keputusan Menteri Ketenagakerjaan Republik Indonesia Nomor 11 Tahun 2019 Tentang Penetapan Standar Kompetensi Kerja Nasional Indonesia Kategori Administrasi Pemerintahan, Pertahanan dan Jaminan Sosial Wajib Golongan Pokok Administrasi Pemerintahan, Pertahanan dan Jaminan Sosial Wajib Bidang Perencanaan Pembangunan, Peraturan Lembaga Administrasi Negara Indonesia Nomor 14 Tahun 2019 tentang Kerangka Kualifikasi Nasional Indonesia Analis Kebijakan dan Keputusan Kepala Lembaga Administrasi Negara Nomor 547/K.1/HKM.02.2/2019 tentang Jenjang Kerangka Kualifikasi Nasional Indonesia Analis Kebijakan. Skema sertifikasi ini digunakan sebagai acuan pada pelaksanaan assesmen oleh Asesor kompetensi LSP dan memastikan kompetensi pada KKNI Level 6 Bidang Analisis Kebijakan Publik.</p>",
            "price" => 2000000,
            "doc" => "SCHEME_DOC_20250917122826.pdf",
        ]);
        Scheme::create([
            "name" => "SKEMA SERTIFIKASI KKNI KUALIFIKASI 7 BIDANG ANALISIS KEBIJAKAN PUBLIK",
            "slug" => "skema-sertifikasi-kkni-kualifikasi-7-bidang-analisis-kebijakan-publik",
            "desc" => "<p>Skema sertifikasi KKNI Level 7. Bidang Analis Kebijakan Publik merupakan skema sertifikasi yang diadopsi oleh Komite Skema LSP Administrasi Publik Indonesia untuk memenuhi kebutuhan sertifikasi kompetensi kerja di bidang analisis kebijakan publik. Kemasan yang digunakan mengacu pada Standar Kompetensi Kerja Nasional Indonesia yang ditetapkan berdasarkan Keputusan Menteri Tenaga Kerja dan Transmigrasi Republik Indonesia Nomor 209 Tahun 2013 Tentang Penetapan Standar Kompetensi Kerja Nasional Indonesia Kategori Jasa Profesional, Ilmiah dan Teknis Golongan Pokok Jasa Arsitektur dan Teknik Sipil; Analisis dan Uji Teknis Golongan Jasa Arsitektur dan Teknik Sipil serta Konsultasi Teknis YBDI Sub Golongan Jasa Arsitektur dan Teknik Sipil; Analisis dan Uji Teknis Golongan Jasa Arsitektur dan Teknik Sipil serta Konsultasi Teknis YBDI Sub Golongan Jasa Arsitektur dan Teknik Sipil Serta Konsultasi Teknis YBDI Bidang Arsitektur Sub Bidang Lanskap Perancang Lanskap, Keputusan Menteri Ketenagakerjaan Republik Indonesia Nomor 629 Tahun 2016 Penetapan Standar Kompetensi Kerja Nasional Indonesia Kategori Kegiatan Jasa Lainnya Golongan Pokok Kegiatan Organisasi Bisnis, Pengusaha dan Profesi Bidang Kehumasan, Keputusan Menteri Ketenagakerjaan Republik Indonesia Nomor 32 Tahun 2017 Tentang Penetapan Standar Kompetensi Kerja Nasional Indonesia Kategori Pertanian, Kehutanan, dan Perikanan Golongan Pokok Pertanian Tanaman, Peternakan, Perburuan dan Kegiatan Yang Berhubungan Dengan Itu (YBDI) Bidang Manajemen Agribisnis, Keputusan Menteri Ketenagakerjaan Republik Indonesia Nomor 126 Tahun 2017 Tentang Penetapan Standar Kompetensi Kerja Nasional Indonesia Kategori Pertambangan dan Penggalian Golongan Pokok Pertambangan Minyak Bumi dan Gas Alam dan Panas Bumi Pada Jabatan Kerja Ahli Geokimia Panas Bumi, Keputusan Menteri Ketenagakerjaan Republik Indonesia Nomor 106 Tahun 2018 Tentang Penetapan Standar Kompetensi Kerja Nasional Indonesia Kategori Aktivitas Profesional, Ilmiah dan Teknis Golongan Pokok Penelitian dan Pengembangan Ilmu Pengetahuan pada Jabatan Kerja Analis Kebijakan Publik, Keputusan Menteri Ketenagakerjaan Republik Indonesia Nomor 11 Tahun 2019 Tentang Penetapan Standar Kompetensi Kerja Nasional Indonesia Kategori Administrasi Pemerintahan, Pertahanan dan Jaminan Sosial Wajib Golongan Pokok Administrasi Pemerintahan, Pertahanan dan Jaminan Sosial Wajib Bidang Perencanaan Pembangunan, Peraturan Lembaga Administrasi Negara Indonesia Nomor 14 Tahun 2019 tentang Kerangka Kualifikasi Nasional Indonesia Analis Kebijakan dan Keputusan Kepala Lembaga Administrasi Negara Nomor 547/K.1/HKM.02.2/2019 tentang Jenjang Kerangka Kualifikasi Nasional Indonesia Analis Kebijakan. Skema sertifikasi ini digunakan sebagai acuan pada pelaksanaan assesmen oleh Asesor kompetensi LSP dan memastikan kompetensi pada KKNI Level 7 Bidang Analisis Kebijakan Publik.</p>",
            "price" => 2500000,
            "doc" => "SCHEME_DOC_20250917122928.pdf",
        ]);
    }
}
