<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Gallery::create([
            "name" => "GALLERY_IMAGE_0_20250914033407.jpg",
        ]);
        Gallery::create([
            "name" => "GALLERY_IMAGE_2_20250914033407.jpg",
        ]);
        Gallery::create([
            "name" => "GALLERY_IMAGE_3_20250914033407.jpg",
        ]);
        Gallery::create([
            "name" => "GALLERY_IMAGE_4_20250914033407.jpg",
        ]);
    }
}
