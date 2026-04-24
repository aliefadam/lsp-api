<?php

use App\Models\Contact;
use App\Models\Menu;
use App\Models\Sosmed;
use Illuminate\Support\Facades\Auth;

if (!function_exists("getMenuSidebar")) {
    function getMenuSidebar()
    {
        return Menu::where("role", "admin")->get();
        if (Auth::check()) {
        }
        return;
    }
}

if (!function_exists("active_sidebar")) {
    function active_sidebar($url)
    {
        return request()->is($url) || request()->is($url . '/*') ? 'text-white bg-orange-600' : 'text-gray-700 hover:bg-gray-100';
    }
}

if (!function_exists("format_rupiah")) {
    function format_rupiah($number)
    {
        $formattedNumber = number_format($number, 0, ',', '.');
        return 'Rp ' . $formattedNumber;
    }
}

if (!function_exists("getSosmed")) {
    function getSosmed()
    {
        return Sosmed::first();
    }
}

if (!function_exists("getContact")) {
    function getContact()
    {
        return Contact::first();
    }
}
