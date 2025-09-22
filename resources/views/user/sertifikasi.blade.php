@extends('layouts.user')

@section('content')
    <section class="h-[260px] shadow-sm flex flex-col justify-center bg-white items-center">
        <h1 class="text-2xl poppins-semibold text-center text-orange-500">Skema Sertifikasi</h1>
        <p class="text-gray-700 text-center mt-2">
            Pilih skema sertifikasi yang sesuai dengan keahlian dan jalur karir anda
        </p>
    </section>
    <main class="px-10 py-10 min-h-dvh">
        <div class="grid grid-cols-4 gap-10">
            @foreach ($schemes as $scheme)
                <div class="rounded-md shadow-md duration-200 overflow-hidden relative">
                    <img src="/imgs/header-example.png" alt="" class="w-full h-[200px] object-cover">
                    <div class="p-5 bg-white">
                        <h1 class="poppins-medium">{{ $scheme->name }}</h1>
                        {{-- <p class="text-sm !text-gray-600 mt-2">
                            {!! Str::limit($scheme->desc, 60, '...') !!}
                        </p> --}}
                        <a href="{{ route('sertifikasi.detail', ['slug' => $scheme->slug]) }}"
                            class="block mt-5 text-sm text-orange-700">
                            Lihat Detail
                            <i class="fa-regular fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
@endsection
