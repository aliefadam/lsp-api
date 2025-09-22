<?php

namespace Database\Seeders;

use App\Models\EventResponse;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventResponseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EventResponse::create([
            'event_id' => 1,
            'name' => "Alief Sya'arah Adam",
            'email' => 'aliefadam6@gmail.com',
            'nik' => '3578192107030001',
            'place_of_birth' => 'Surabaya',
            'date_of_birth' => '2003-07-21',
            'gender' => 'Laki-laki',
            'address' => 'JL. Bandarejo Candi 3 No. 11 RT 11 RW 05, Sememi, Benowo',
            'phone' => '0895364711840',
            'pendidikan' => 'S1',
            'jurusan' => 'Teknik Informatika',
            'skema' => 'Kualifikasi 5 Bidang Analisis Kebijakan',
            'kepesertaan' => 'Individu',
            'instansi_pengusul' => null,
            'scan_ktp' => 'IMAGE_20250915015013.jpg',
            'scan_ijazah' => 'IMAGE_20250915015013.jpg',
            'surat_usulan_institusi' => null,
            'keanggotaan_iapa' => 'Bukan Anggota IAPA',
            'no_anggota_iapa' => null,
        ]);
    }
}
