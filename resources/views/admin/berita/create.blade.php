@extends('layouts.admin')

@section('content')
    <form action="{{ route('admin.berita.store') }}" method="POST" class="" enctype="multipart/form-data">
        @csrf
        <div class="flex justify-between items-start">
            @include('partials.breadcrumb', [
                'current' => $title,
                'before' => [
                    'name' => 'Tempat Uji Kompetensi',
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
                    <input type="text" id="title" name="title"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                        required />
                </div>
                <div class="mb-5">
                    <label for="berita" class="block mb-2 text-sm font-medium text-gray-900 ">
                        Isi Berita
                    </label>
                    <textarea id="ckeditor" rows="5" name="body"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-orange-500 focus:border-orange-500 resize-none"
                        placeholder=""></textarea>
                </div>
                <div class="mb-5">
                    <label class="block mb-2 text-sm font-medium text-gray-900" for="image">
                        Flyer <span class="text-xs text-gray-600 ms-1">(Jika tidak butuh tidak perlu mengisi)</span>
                    </label>
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        id="flyer" name="flyer" type="file">
                </div>
                <div class="mb-5">
                    <label class="block mb-2 text-sm font-medium text-gray-900" for="image">
                        Thumbnail
                    </label>
                    <input required accept="image/*"
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
