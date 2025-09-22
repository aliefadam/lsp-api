<?php

namespace Database\Seeders;

use App\Models\TUK;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TUKSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TUK::create([
            "name" => "Universitas Wijaya Putra",
            "address" => "FISIP, Universitas Wijaya Putra Jl. Raya Benowo (Sememi) No. 1-3, Kel. Pakal, Kec. Benowo, Kota Surabaya.",
            "image" => "uwp.jpg",
        ]);
        TUK::create([
            "name" => "Universitas Brawijaya",
            "address" => "Fakultas Ilmu Administrasi Universitas Brawijaya, Jl. MT. Haryono No.163, Ketawanggede, Kec. Lowokwaru, Kota Malang, Jawa Timur 65145",
            "image" => "ub.jpg",
        ]);
        TUK::create([
            "name" => "Universitas Indonesia",
            "address" => "Fakultas Ilmu Administrasi Universitas Indonesia, Gedung M Lantai 2, Komplek FISIP, Jl. Prof. DR. Selo Soemardjan, Pondok Cina, Kecamatan Beji, Kota Depok, Jawa Barat 16424",
            "image" => "ui.jpg",
        ]);
    }
}
