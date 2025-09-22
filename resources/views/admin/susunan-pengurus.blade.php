@extends('layouts.admin')

@section('content')
    <div class="flex justify-between items-start">
        @include('partials.breadcrumb', [
            'current' => $title,
        ])
    </div>

    <form action="{{ route('admin.susunan-pengurus.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mt-5">
            <div class="bg-white flex-[1.5] lg:w-1/2 w-full rounded-md shadow-md p-5 h-fit">
                <div class="mb-10">
                    <h1 class="text-lg text-orange-500 poppins-medium border-b border-orange-500 pb-2">Direktur</h1>
                    <div class="mt-3">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">
                            Nama
                        </label>
                        <input type="text" id="name" name="nama_direktur"
                            value="{{ json_decode($susunan_pengurus->direktur)->nama }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                            required />
                    </div>
                    <div class="mt-3">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">
                            Foto
                        </label>
                        <img src="/uploads/{{ json_decode($susunan_pengurus->direktur)->image }}"
                            class="mb-3 w-[150px] h-[150px] object-cover rounded-md shadow-md" alt="">
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            id="image" name="foto_direktur" type="file">
                    </div>
                </div>

                <div class="mb-10">
                    <h1 class="text-lg text-orange-500 poppins-medium border-b border-orange-500 pb-2">Departemen
                        Sertifikasi</h1>
                    <div class="mt-3">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">
                            Nama Manajer
                        </label>
                        <input type="text" id="name" name="nama_departemen_sertifikasi_manajer"
                            value="{{ json_decode($susunan_pengurus->departemen_sertifikasi_manajer)->nama }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                            required />
                    </div>
                    <div class="mt-3">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">
                            Foto Manajer
                        </label>
                        <img src="/uploads/{{ json_decode($susunan_pengurus->departemen_sertifikasi_manajer)->image }}"
                            class="mb-3 w-[150px] h-[150px] object-cover rounded-md shadow-md" alt="">
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            id="image" name="foto_departemen_sertifikasi_manajer" type="file">
                    </div>
                    <div class="mt-3">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">
                            Nama Anggota
                        </label>
                        <input type="text" id="name" name="nama_departemen_sertifikasi_anggota"
                            value="{{ json_decode($susunan_pengurus->departemen_sertifikasi_anggota)->nama }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                            required />
                    </div>
                    <div class="mt-3">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">
                            Foto Anggota
                        </label>
                        <img src="/uploads/{{ json_decode($susunan_pengurus->departemen_sertifikasi_anggota)->image }}"
                            class="mb-3 w-[150px] h-[150px] object-cover rounded-md shadow-md" alt="">
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            id="image" name="foto_departemen_sertifikasi_anggota" type="file">
                    </div>
                </div>

                <div class="mb-10">
                    <h1 class="text-lg text-orange-500 poppins-medium border-b border-orange-500 pb-2">
                        Departemen Manajemen Mutu
                    </h1>
                    <div class="mt-3">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">
                            Nama Manajer
                        </label>
                        <input type="text" id="name" name="nama_departemen_manajemen_mutu_manajer"
                            value="{{ json_decode($susunan_pengurus->departemen_manajemen_mutu_manajer)->nama }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                            required />
                    </div>
                    <div class="mt-3">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">
                            Foto Manajer
                        </label>
                        <img src="/uploads/{{ json_decode($susunan_pengurus->departemen_manajemen_mutu_manajer)->image }}"
                            class="mb-3 w-[150px] h-[150px] object-cover rounded-md shadow-md" alt="">
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            id="image" name="foto_departemen_manajemen_mutu_manajer" type="file">
                    </div>
                    <div class="mt-3">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">
                            Nama Anggota
                        </label>
                        <input type="text" id="name" name="nama_departemen_manajemen_mutu_anggota"
                            value="{{ json_decode($susunan_pengurus->departemen_manajemen_mutu_anggota)->nama }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                            required />
                    </div>
                    <div class="mt-3">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">
                            Foto Anggota
                        </label>
                        <img src="/uploads/{{ json_decode($susunan_pengurus->departemen_manajemen_mutu_anggota)->image }}"
                            class="mb-3 w-[150px] h-[150px] object-cover rounded-md shadow-md" alt="">
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            id="image" name="foto_departemen_manajemen_mutu_anggota" type="file">
                    </div>
                </div>

                <div class="mb-10">
                    <h1 class="text-lg text-orange-500 poppins-medium border-b border-orange-500 pb-2">
                        Departemen Administrasi
                    </h1>
                    <div class="mt-3">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">
                            Nama Manajer
                        </label>
                        <input type="text" id="name" name="nama_departemen_administrasi_manajer"
                            value="{{ json_decode($susunan_pengurus->departemen_administrasi_manajer)->nama }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                            required />
                    </div>
                    <div class="mt-3">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">
                            Foto Manajer
                        </label>
                        <img src="/uploads/{{ json_decode($susunan_pengurus->departemen_administrasi_manajer)->image }}"
                            class="mb-3 w-[150px] h-[150px] object-cover rounded-md shadow-md" alt="">
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            id="image" name="foto_departemen_administrasi_manajer" type="file">
                    </div>
                    <div class="mt-3">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">
                            Nama Anggota
                        </label>
                        <input type="text" id="name" name="nama_departemen_administrasi_anggota"
                            value="{{ json_decode($susunan_pengurus->departemen_administrasi_anggota)->nama }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                            required />
                    </div>
                    <div class="mt-3">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">
                            Foto Anggota
                        </label>
                        <img src="/uploads/{{ json_decode($susunan_pengurus->departemen_administrasi_anggota)->image }}"
                            class="mb-3 w-[150px] h-[150px] object-cover rounded-md shadow-md" alt="">
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            id="image" name="foto_departemen_administrasi_anggota" type="file">
                    </div>
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
