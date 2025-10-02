<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\MenuDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin
        $newMenu = Menu::create([
            "role" => "admin",
            "name" => "beranda",
        ]);
        MenuDetail::create([
            "menu_id" => $newMenu->id,
            "name" => "profil perusahaan",
            "route" => "admin.profil-perusahaan.index",
            "icon" => "fa-regular fa-building-user",
        ]);
        MenuDetail::create([
            "menu_id" => $newMenu->id,
            "name" => "susunan pengurus",
            "route" => "admin.susunan-pengurus.index",
            "icon" => "fa-regular fa-sitemap",
        ]);
        MenuDetail::create([
            "menu_id" => $newMenu->id,
            "name" => "visi & misi",
            "route" => "admin.visi-misi.index",
            "icon" => "fa-regular fa-bullseye-pointer",
        ]);

        $newMenu = Menu::create([
            "role" => "admin",
            "name" => "sertifikasi",
        ]);
        MenuDetail::create([
            "menu_id" => $newMenu->id,
            "name" => "acara",
            "route" => "admin.event.index",
            "icon" => "fa-regular fa-users-rectangle",
        ]);
        MenuDetail::create([
            "menu_id" => $newMenu->id,
            "name" => "skema",
            "route" => "admin.scheme.index",
            "icon" => "fa-regular fa-award",
        ]);

        $newMenu = Menu::create([
            "role" => "admin",
            "name" => "informasi",
        ]);
        MenuDetail::create([
            "menu_id" => $newMenu->id,
            "name" => "TUK",
            "route" => "admin.tuk.index",
            "icon" => "fa-regular fa-location-dot",
        ]);
        MenuDetail::create([
            "menu_id" => $newMenu->id,
            "name" => "asesor",
            "route" => "admin.asesor.index",
            "icon" => "fa-regular fa-users",
        ]);

        $newMenu = Menu::create([
            "role" => "admin",
            "name" => "galeri",
        ]);
        MenuDetail::create([
            "menu_id" => $newMenu->id,
            "name" => "galeri",
            "route" => "admin.galeri.index",
            "icon" => "fa-regular fa-image",
        ]);

        $newMenu = Menu::create([
            "role" => "admin",
            "name" => "berita",
        ]);
        MenuDetail::create([
            "menu_id" => $newMenu->id,
            "name" => "berita",
            "route" => "admin.berita.index",
            "icon" => "fa-regular fa-newspaper",
        ]);

        $newMenu = Menu::create([
            "role" => "admin",
            "name" => "footer",
        ]);
        MenuDetail::create([
            "menu_id" => $newMenu->id,
            "name" => "sosmed",
            "route" => "admin.sosmed.index",
            "icon" => "fa-brands fa-instagram",
        ]);
        MenuDetail::create([
            "menu_id" => $newMenu->id,
            "name" => "kontak",
            "route" => "admin.contact.index",
            "icon" => "fa-regular fa-address-book",
        ]);
    }
}
