<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contact::create([
            "address" => "Jl. Pd. Benowo Indah No.1-3, Babat Jerawat, Kec. Pakal, Surabaya, Jawa Timur 60197",
            "link_gmap" => "https://maps.app.goo.gl/3SzxexWQdWoVZz4A8",
            "phone" => "62895364711840",
            "email" => "lsp.api.iapa@gmail.com",
        ]);
    }
}
