<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Event::create([
            "name" => "Sertifikasi Analisis Kebijakan LSP P3 API Tahun 2025",
            "slug" => "sertifikasi-analisis-kebijakan-lsp-p3-api-tahun-2025",
            "place" => "Universitas Wijaya Putra - FISIP, Universitas Wijaya Putra Jl. Raya Benowo (Sememi) No. 1-3, Kel. Pakal, Kec. Benowo, Kota Surabaya.",
            "date" => "2025-09-18",
            "start_time" => "12:00:00",
            "end_time" => "15:00:00",
            "desc" => null,
            "is_active" => 1,
        ]);
    }
}
