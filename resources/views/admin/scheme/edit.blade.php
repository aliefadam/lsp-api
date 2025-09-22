@extends('layouts.admin')

@section('content')
    <form action="{{ route('admin.scheme.update', $scheme->id) }}" method="POST" class="" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="flex justify-between items-start">
            @include('partials.breadcrumb', [
                'current' => $title,
                'before' => [
                    'name' => 'Skema',
                    'url' => route('admin.scheme.index'),
                ],
            ])
        </div>

        <div class="mt-5">
            <div class="bg-white flex-[1.5] lg:w-1/2 w-full rounded-md shadow-md p-5 h-fit">
                <div class="mb-5">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">
                        Nama Skema
                    </label>
                    <input type="text" id="name" name="name" value="{{ $scheme->name }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                        required />
                </div>
                <div class="mb-5">
                    <label for="desc" class="block mb-2 text-sm font-medium text-gray-900 ">
                        Deskripsi
                    </label>
                    <textarea id="ckeditor" name="desc" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-orange-500 focus:border-orange-500">{{ $scheme->desc }}</textarea>
                </div>
                <div class="mb-5">
                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900 ">
                        Harga
                    </label>
                    <input type="number" id="price" name="price" value="{{ $scheme->price }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                        required />
                </div>
                <div class="mb-5">
                    <label class="block mb-2 text-sm font-medium text-gray-900" for="doc">
                        Dokumen Detail Skema (PDF)
                    </label>
                    <div class="p-3 bg-red-600 text-white rounded-md mb-3 flex justify-between text-sm">
                        <div class="flex items-center gap-2">
                            <i class="fa-solid fa-file-pdf"></i>
                            <span>{{ $scheme->doc }}</span>
                        </div>
                        <a href="/uploads/schemes/{{ $scheme->doc }}" target="_blank" class="flex items-center gap-2">
                            <i class="fa-solid fa-up-right-from-square"></i>
                            <span>Buka</span>
                        </a>
                    </div>
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none"
                        id="doc" name="doc" type="file">
                </div>
                <div class="flex justify-end">
                    <button type="submit"
                        class="text-white bg-orange-600 hover:bg-orange-700 focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5">
                        Simpan
                    </button>
                </div>
            </div>
        </div>
    </form>
@endsection
