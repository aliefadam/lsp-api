@extends('layouts.admin')

@section('content')
    <div class="flex justify-between items-start">
        @include('partials.breadcrumb', [
            'current' => $title,
        ])
    </div>

    <form method="POST" action="{{ route('admin.popup.update') }}" class="mt-5" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="bg-white w-full lg:w-1/2 rounded-md shadow-md p-5 space-y-5">
            <div class="mb-5">
                <label class="block mb-2 text-sm font-medium text-gray-900" for="image">
                    Brosur yang sedang tampil • <span class="text-sm text-gray-600">(format: png, jpg, jpeg)</span>
                </label>
                @if ($popup?->image)
                    <img src="/uploads/{{ $popup->image }}" class="my-5 object-cover rounded-md shadow-md" alt="">
                @endif
                <input
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    id="image" name="image" type="file">
            </div>
            <div class="flex justify-end">
                <div class="flex gap-4">
                    <button type="submit"
                        class="text-white bg-orange-600 hover:bg-orange-700 focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5">
                        Simpan
                    </button>
                    <a href="{{ route('admin.popup.destroy') }}"
                        class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5">
                        Hapus Brosur
                    </a>
                </div>
            </div>
        </div>
    </form>
@endsection
