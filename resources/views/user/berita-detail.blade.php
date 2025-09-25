@extends('layouts.user')

@section('content')
    <main class="px-10 py-10 min-h-dvh">
        <div class="grid grid-cols-3 gap-10">
            <div class="col-span-2">
                <h1 class="text-2xl poppins-bold">{{ $berita->title }}</h1>
                <div class="flex items-center gap-3 mt-3">
                    <span class="text-sm text-gray-700">
                        <i class="fa-regular fa-calendar mr-1"></i>
                        {{ $berita->created_at->translatedFormat('l, d-m-Y') }}
                    </span>
                    <span class="text-sm text-gray-700">
                        <i class="fa-regular fa-eye mr-1"></i>
                        {{ $berita->views }}
                    </span>
                </div>
                <div class="mt-5">
                    <img src="/uploads/thumbnail/{{ $berita->thumbnail }}" class="w-full object-cover rounded-md shadow-md"
                        alt="">
                </div>
                <div class="ckeditor mt-5">
                    {!! $berita->body !!}
                </div>
                <div class="mt-5">
                    <img class="rounded-md shadow-md" src="/uploads/flyer/{{ $berita->flyer }}" alt="">
                </div>
                <div class="">
                    <h1 class="text-base poppins-medium text-orange-500">Flyer</h1>
                    <div class="p-4 bg-red-600 text-white rounded-md mb-3 flex gap-5 text-sm mt-3 w-fit">
                        <div class="flex items-center gap-2">
                            <i class="fa-solid fa-file-pdf"></i>
                            <span>{{ $berita->flyer }}</span>
                        </div>
                        <a href="/uploads/flyer/{{ $berita->flyer }}" target="_blank" class="flex items-center gap-2">
                            <i class="fa-solid fa-up-right-from-square"></i>
                            <span>Buka</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-span-1">
                <h1 class="text-xl poppins-medium border-b pb-3 border-gray-400">Berita Lainnya</h1>
                <div class="mt-5 space-y-5">
                    @foreach ($data_berita as $berita)
                        <a href="{{ route('berita.detail', $berita->slug) }}" class="flex gap-3 hover:bg-gray-100">
                            <img src="/uploads/thumbnail/{{ $berita->thumbnail }}" alt=""
                                class="w-[100px] h-[100px] rounded-md shadow-md object-cover">
                            <div class="flex flex-col">
                                <h1 class="text-base poppins-semibold">
                                    {{ Str::limit($berita->title, 50, '...') }}
                                </h1>
                                <div class="flex items-center gap-3 mt-2">
                                    <span class="text-sm text-gray-700">
                                        <i class="fa-regular fa-calendar mr-1"></i>
                                        {{ $berita->created_at->translatedFormat('l, d-m-Y') }}
                                    </span>
                                    <span class="text-sm text-gray-700">
                                        <i class="fa-regular fa-eye mr-1"></i>
                                        {{ $berita->views }}
                                    </span>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
@endsection
