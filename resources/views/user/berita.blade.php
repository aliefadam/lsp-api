@extends('layouts.user')

@section('content')
    <section class="h-[260px] shadow-sm flex flex-col justify-center bg-white items-center">
        <h1 class="text-2xl poppins-semibold text-center text-orange-600">Berita</h1>
        <p class="text-gray-700 text-center mt-2">
            Dapatkan informasi terbaru seputar sertifikasi profesi, perkembangan, dan tren industri digital yang
            dapat membantu mengembangkan karier Anda.
        </p>
    </section>
    <main class="px-10 py-10 min-h-dvh">
        <div class="mt-10 grid grid-cols-4 gap-10">
            @foreach ($data_berita as $berita)
                <div class="rounded-md shadow-md duration-200 overflow-hidden">
                    <img src="/uploads/thumbnail/{{ $berita->thumbnail }}" alt=""
                        class="w-full h-[200px] object-cover">
                    <div class="p-5 bg-white">
                        <div class="flex justify-between items-center text-xs text-gray-600 mb-2">
                            <span><i class="fa-regular fa-eye"></i> {{ $berita->views }} Views </span>
                            <span>{{ $berita->created_at->translatedFormat('l, d-m-Y') }}</span>
                        </div>
                        <h1 class="poppins-medium">
                            {{ Str::limit($berita->title, 50, '...') }}
                        </h1>
                        <a href="{{ route('berita.detail', $berita->slug) }}" class="block mt-5 text-sm text-orange-700">
                            Lihat Detail
                            <i class="fa-regular fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
@endsection
