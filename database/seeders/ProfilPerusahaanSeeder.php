<?php

namespace Database\Seeders;

use App\Models\ProfilPerusahaan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfilPerusahaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProfilPerusahaan::create([
            "desc" => '
            <p>
            LSP Administrasi Publik Indonesia (LSP-API) adalah LPS Pihak ketiga yang dibentuk oleh Yayasan yang Bernama Yayasan Ilmu Administrasi Publik Negara Indonesia dalam Bahasa Inggris disebut Indonesian Association For Public Administration disingkat IAPA.
            </p>
            <p>&nbsp;</p>
            <p>
            LSP API berkedudukan di Jalan Raya Benowo No. 1-3 Surabaya (Kampus Universitas Wijaya Putra), didirikan berdasarkan Akta Pendirian Perseroan Terbatas Nomor 17 tertanggal 14 Januari 2022 yang dibuat dihadapan Notaris Christiana Inawati, SH. beralamat di Jalan Gayungsari I nomor 15, Surabaya dan telah mendapat Pengesahan berdasarkan Keputusan Menteri Hukum dan Hak Asasi Manusia Republik Indonesia Nomor AHU-0004508.AH.01.01. tahun 2022 tentang Pengesahan pendirian Badan Hukum Perseroan Terbatas PT Sertifikasi Profesi Administrasi Publik Indonesia.
            </p>
            <p>&nbsp;</p>
            <p>
            Fungsi LSP Administrasi Publik Indonesia (LSP-API) didirikan guna meningkatkan kompetensi sumber daya manusia Indonesia melalui penyelenggaraan standarisasi kompetensi profesi di bidang Administrasi Publik/ Negara, sehingga mampu mengisi dan memenuhi kebutuhan tenaga kompeten bidang Administrasi Publik/ Negara baik di sektor publik maupun privat.
            </p>
            ',
            "image" => "uwp.jpg",
        ]);
    }
}
