<?php

namespace Database\Seeders;

use App\Models\SusunanPengurus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SusunanPengurusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SusunanPengurus::create([
            "direktur" => json_encode([
                "nama" => "Sri Juni Woro Astuti",
                "jabatan" => "Direktur",
                "image" => "char.png",
            ]),
            "departemen_sertifikasi_manajer" => json_encode([
                "nama" => "M. Husni Tamrin",
                "jabatan" => "Manajer",
                "image" => "char.png",
            ]),
            "departemen_sertifikasi_anggota" => json_encode([
                "nama" => "Denny Iswanto",
                "jabatan" => "Anggota",
                "image" => "char.png",
            ]),
            "departemen_manajemen_mutu_manajer" => json_encode([
                "nama" => "Yanuar Fauzuddin",
                "jabatan" => "Manajer",
                "image" => "char.png",
            ]),
            "departemen_manajemen_mutu_anggota" => json_encode([
                "nama" => "Supriyanto",
                "jabatan" => "Anggota",
                "image" => "char.png",
            ]),
            "departemen_administrasi_manajer" => json_encode([
                "nama" => "Arie Ambarwati",
                "jabatan" => "Manajer",
                "image" => "char.png",
            ]),
            "departemen_administrasi_anggota" => json_encode([
                "nama" => "Arini Sulistyowati",
                "jabatan" => "Anggota",
                "image" => "char.png",
            ]),
        ]);
    }
}
