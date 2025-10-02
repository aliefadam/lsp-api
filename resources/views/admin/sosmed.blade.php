@extends('layouts.admin')

@section('content')
    <div class="flex justify-between items-start">
        @include('partials.breadcrumb', [
            'current' => $title,
        ])
    </div>

    <form action="{{ route('admin.sosmed.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mt-5">
            <div class="bg-white flex-[1.5] lg:w-1/2 w-full rounded-md shadow-md p-5 h-fit">
                <div class="mb-5">
                    <label for="facebook" class="block mb-2 text-sm font-medium text-gray-900 ">
                        Facebook <span class="text-xs text-gray-700">(Masukkan URL Profile)</span>
                    </label>
                    <input type="text" id="facebook" name="facebook" value="{{ $sosmed->facebook ?? '' }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5" />
                </div>
                <div class="mb-5">
                    <label for="twitter" class="block mb-2 text-sm font-medium text-gray-900 ">
                        Twitter <span class="text-xs text-gray-700">(Masukkan URL Profile)</span>
                    </label>
                    <input type="text" id="twitter" name="twitter" value="{{ $sosmed->twitter ?? '' }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5" />
                </div>
                <div class="mb-5">
                    <label for="instagram" class="block mb-2 text-sm font-medium text-gray-900 ">
                        Instagram <span class="text-xs text-gray-700">(Masukkan URL Profile)</span>
                    </label>
                    <input type="text" id="instagram" name="instagram" value="{{ $sosmed->instagram ?? '' }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5" />
                </div>
                <div class="mb-5">
                    <label for="linkedin" class="block mb-2 text-sm font-medium text-gray-900 ">
                        Linkedin <span class="text-xs text-gray-700">(Masukkan URL Profile)</span>
                    </label>
                    <input type="text" id="linkedin" name="linkedin" value="{{ $sosmed->linkedin ?? '' }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5" />
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
