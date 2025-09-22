@extends('layouts.auth')

@section('content')
    <div class="flex w-full h-dvh justify-center items-center">
        <div class="bg-white w-1/2 p-10 rounded-md shadow-md">
            <img src="/imgs/cancel.png" class="w-[80px] mx-auto" alt="">
            <div class="mt-5 text-center">
                <h1>Pendaftaran Ditutup</h1>
                <h1 class="text-lg text-orange-700 poppins-medium">{{ $event->name }}</h1>
            </div>

            <h1 class="mt-10 text-center text-gray-700 text-sm">Pantau terus informasi pendaftaran di website kami agar tidak
                ketinggalan informasi</h1>
            <button type="button"
                class="text-white bg-orange-700 hover:bg-orange-800 focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 mt-3 mx-auto block">
                Kembali ke beranda
            </button>
        </div>
    </div>
@endsection
