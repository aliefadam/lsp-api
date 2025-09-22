@extends('layouts.auth')

@section('content')
    <div class="flex w-full h-dvh justify-center items-center">
        <div class="bg-white w-1/2 p-10 rounded-md shadow-md">
            <img src="/imgs/checked.png" class="w-[80px] mx-auto" alt="">
            <div class="mt-5 text-center">
                <h1>Berhasil Melakukan Pendaftaran</h1>
                <h1 class="text-lg text-orange-700 poppins-medium">{{ $event->name }}</h1>
            </div>

            <h1 class="mt-10 text-center text-gray-700 text-sm">
                Harap menghubungi nomor dibawah ini, untuk melakukan pembayaran
            </h1>
            <h1 class="mt-2 text-center text-gray-900 poppins-medium text-sm">
                +62 813-2211-3049 (Shiva)
            </h1>
            <a href="{{ route('home') }}"
                class="text-white bg-orange-700 w-fit hover:bg-orange-800 focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 mt-5 mx-auto block">
                Kembali ke beranda
            </a>
        </div>
    </div>
@endsection
