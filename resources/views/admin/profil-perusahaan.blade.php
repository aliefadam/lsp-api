@extends('layouts.admin')

@section('content')
    <div class="flex justify-between items-start">
        @include('partials.breadcrumb', [
            'current' => $title,
        ])
    </div>

    <form action="{{ route('admin.profil-perusahaan.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mt-5">
            <div class="bg-white flex-[1.5] lg:w-1/2 w-full rounded-md shadow-md p-5 h-fit">
                <div class="mb-5">
                    <label for="desc" class="block mb-2 text-sm font-medium text-gray-900 ">
                        Deksripsi Perusahaan
                    </label>
                    <textarea id="ckeditor" rows="5" name="desc"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-orange-500 focus:border-orange-500 resize-none"
                        placeholder="">{!! $profil_perusahaan->desc !!}</textarea>
                </div>
                <div class="mb-5">
                    <label class="block mb-2 text-sm font-medium text-gray-900" for="image">
                        Gambar
                    </label>
                    <img src="/uploads/{{ $profil_perusahaan->image }}"
                        class="mb-3 w-full object-cover rounded-md shadow-md" alt="">
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        id="image" name="image" type="file">
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
