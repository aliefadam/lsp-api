@extends('layouts.admin')

@section('content')
    <form action="{{ route('admin.berita.update', $berita->id) }}" method="POST" class="" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="flex justify-between items-start">
            @include('partials.breadcrumb', [
                'current' => $title,
                'before' => [
                    'name' => 'Berita',
                    'url' => route('admin.berita.index'),
                ],
            ])
        </div>

        <div class="mt-5">
            <div class="bg-white flex-[1.5] lg:w-1/2 w-full rounded-md shadow-md p-5 h-fit">
                <div class="mb-5">
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 ">
                        Judul
                    </label>
                    <input type="text" id="title" name="title" value="{{ $berita->title }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                        required />
                </div>
                <div class="mb-5">
                    <label for="berita" class="block mb-2 text-sm font-medium text-gray-900 ">
                        Isi Berita
                    </label>
                    <textarea id="ckeditor" rows="5" name="body"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-orange-500 focus:border-orange-500 resize-none"
                        placeholder="">{{ $berita->body }}</textarea>
                </div>
                <div class="mb-5">
                    <label class="block mb-2 text-sm font-medium text-gray-900" for="image">
                        Flyer <span class="text-xs text-gray-600 ms-1">(Jika tidak butuh tidak perlu mengisi)</span>
                    </label>
                    <div class="p-3 bg-red-600 text-white rounded-md mb-3 flex justify-between text-sm">
                        <div class="flex items-center gap-2">
                            <i class="fa-solid fa-file-pdf"></i>
                            <span>{{ $berita->flyer }}</span>
                        </div>
                        <a href="/uploads/flyer/{{ $berita->flyer }}" target="_blank" class="flex items-center gap-2">
                            <i class="fa-solid fa-up-right-from-square"></i>
                            <span>Buka</span>
                        </a>
                    </div>
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        id="flyer" name="flyer" type="file">
                </div>
                <div class="mb-5">
                    <label class="block mb-2 text-sm font-medium text-gray-900" for="image">
                        Thumbnail
                    </label>

                    <img src="/uploads/thumbnail/{{ $berita->thumbnail }}" class="w-full rounded-md shadow-md mb-3"
                        alt="">
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        id="thumbnail" name="thumbnail" type="file">
                </div>
                <div class="flex justify-end">
                    <button type="submit"
                        class="text-white bg-orange-600 hover:bg-orange-700 focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5">
                        Simpan
                    </button>
                </div>
            </div>
        </div>
        </div>
    </form>
@endsection
