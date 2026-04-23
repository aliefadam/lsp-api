<?php

namespace Database\Seeders;

use App\Models\PendaftaranHeader;
use Illuminate\Database\Seeder;

class PendaftaranHeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (PendaftaranHeader::count() === 0) {
            PendaftaranHeader::create([
                "image" => "/imgs/header-example.png",
            ]);
        }
    }
}
