@extends('layouts.user')

@section('content')
    <section class="h-[260px] flex flex-col justify-center bg-orange-500 text-white items-center">
        <img src="/imgs/header-example.png" class="rounded-md w-full object-cover" alt="">

        {{-- <h1 class="text-3xl poppins-semibold text-center">{{ $scheme->name }}</h1> --}}
        {{-- <p class="text-center mt-2">
            Sertifikasi {{ $sertifikasi['category'] }}
        </p> --}}
    </section>
    <main class="px-10 py-10 min-h-dvh bg-gray-50">
        {{-- <div class="grid grid-cols-3 gap-10">
            <div class="bg-white shadow-sm rounded-sm p-5">
                <i class="fa-regular fa-timer p-4 bg-orange-100 text-orange-700 rounded-lg"></i>
                <p class="mt-3">Durasi Program</p>
                <h1 class="text-lg poppins-medium text-orange-600">6 Bulan</h1>
            </div>
            <div class="bg-white shadow-sm rounded-sm p-5">
                <i class="fa-regular fa-circle-dollar p-4 bg-emerald-100 text-emerald-700 rounded-lg"></i>
                <p class="mt-3">Biaya</p>
                <h1 class="text-lg poppins-medium text-orange-600">Rp. 5,000,000</h1>
            </div>
            <div class="bg-white shadow-sm rounded-sm p-5">
                <i class="fa-regular fa-calendar-check p-4 bg-amber-100 text-amber-700 rounded-lg"></i>
                <p class="mt-3">Jadwal Terdekat</p>
                <h1 class="text-lg poppins-medium text-orange-600">15 September 2025</h1>
            </div>
        </div> --}}

        {{-- <button
            class="block w-full rounded-md cursor-pointer hover:bg-orange-700 mt-10 py-3 px-5 bg-orange-600 text-white">Daftar
            Sekarang
        </button> --}}

        <div class="mt-10 flex gap-5 relative">
            <div class="space-y-5 flex-[1.5] h-fit">
                <div class="bg-white rounded-sm shadow-sm p-5 space-y-5">
                    <div class="">
                        <h1 class="text-base poppins-medium text-orange-500">Nama Skema</h1>
                        <p class="text-lg text-gray-900  text-justify mt-2">
                            {{ $scheme->name }}
                        </p>
                    </div>
                    <div class="">
                        <h1 class="text-base poppins-medium text-orange-500">Harga Skema</h1>
                        <div class="ckeditor mt-2">
                            {{ format_rupiah($scheme->price) }}
                        </div>
                    </div>
                    <div class="">
                        <h1 class="text-base poppins-medium text-orange-500">Deskripsi Skema</h1>
                        <div class="ckeditor mt-2">
                            {!! $scheme->desc !!}
                        </div>
                    </div>
                    <div class="">
                        <h1 class="text-base poppins-medium text-orange-500">Dokumen Detail Skema</h1>
                        <div class="p-4 bg-red-600 text-white rounded-md mb-3 flex gap-5 text-sm mt-3 w-fit">
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-file-pdf"></i>
                                <span>{{ $scheme->doc }}</span>
                            </div>
                            <a href="/uploads/schemes/{{ $scheme->doc }}" target="_blank" class="flex items-center gap-2">
                                <i class="fa-solid fa-up-right-from-square"></i>
                                <span>Buka</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="space-y-5 flex-[1]">
                <div class="bg-white p-5 rounded-md shadow-md">
                    <h1 class="text-lg poppins-medium text-orange-500">Formulir Pendaftaran</h1>
                    <form action="{{ route('pendaftaran.store', ['event_id' => $scheme->id]) }}" class="mt-5 space-y-5"
                        enctype="multipart/form-data" method="POST">
                        @csrf
                        <div>
                            <div>
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">
                                    Nama Lengkap (sesuai KTP tanpa gelar)
                                </label>
                                <input type="text" id="name" name="name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full px-3 p-2.5 placeholder:text-gray-500">
                            </div>
                        </div>
                        <div>
                            <label for="nik" class="block mb-2 text-sm font-medium text-gray-900">
                                NIK
                            </label>
                            <input type="text" id="nik" name="nik"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full px-3 p-2.5 placeholder:text-gray-500">
                        </div>
                        <div>
                            <label for="place_of_birth" class="block mb-2 text-sm font-medium text-gray-900">
                                Tempat Lahir
                            </label>
                            <input type="text" id="place_of_birth" name="place_of_birth"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full px-3 p-2.5 placeholder:text-gray-500">
                        </div>
                        <div>
                            <label for="date_of_birth" class="block mb-2 text-sm font-medium text-gray-900">
                                Tanggal Lahir
                            </label>
                            <input type="date" id="date_of_birth" name="date_of_birth"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full px-3 p-2.5 placeholder:text-gray-500">
                        </div>
                        <div>
                            <label for="" class="block mb-2 text-sm font-medium text-gray-900">
                                Jenis Kelamin
                            </label>
                            <div class="grid grid-cols-2 gap-5">
                                <div class="flex items-center ps-4 border bg-gray-50 border-gray-300 rounded-md">
                                    <input id="gender-1" type="radio" value="Laki-laki" name="gender"
                                        class="w-4 h-4 text-orange-600 bg-gray-100 border-gray-300 focus:ring-orange-500">
                                    <label for="gender-1" class="w-full py-2.5 ms-2 text-sm text-gray-700">
                                        Laki-laki
                                    </label>
                                </div>
                                <div class="flex items-center ps-4 border bg-gray-50 border-gray-300 rounded-md">
                                    <input id="gender-2" type="radio" value="Perempuan" name="gender"
                                        class="w-4 h-4 text-orange-600 bg-gray-100 border-gray-300 focus:ring-orange-500">
                                    <label for="gender-2" class="w-full py-2.5 ms-2 text-sm text-gray-700">
                                        Perempuan
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div>
                            <label for="address" class="block mb-2 text-sm font-medium text-gray-900">
                                Alamat
                            </label>
                            <input type="text" id="address" name="address"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full px-3 p-2.5 placeholder:text-gray-500">
                        </div>
                        <div>
                            <label for="phone" class="block mb-2 text-sm font-medium text-gray-900">
                                No. Handphone / Whatsapp
                            </label>
                            <input type="text" id="phone" name="phone"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full px-3 p-2.5 placeholder:text-gray-500">
                        </div>
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">
                                Email
                            </label>
                            <input type="email" id="email" name="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full px-3 p-2.5 placeholder:text-gray-500">
                        </div>
                        <div>
                            <label for="pendidikan" class="block mb-2 text-sm font-medium text-gray-900">
                                Pendidikan
                            </label>
                            <select id="pendidikan" name="pendidikan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full px-3 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                                <option selected>-- Pilih--</option>
                                <option value="SMA">SMA</option>
                                <option value="D1">D1</option>
                                <option value="D2">D2</option>
                                <option value="D3">D3</option>
                                <option value="S1">S1</option>
                                <option value="S2">S2</option>
                                <option value="S3">S3</option>
                            </select>
                        </div>
                        <div>
                            <label for="jurusan" class="block mb-2 text-sm font-medium text-gray-900">
                                Jurusan / Bidang Studi
                            </label>
                            <input type="text" id="jurusan" name="jurusan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full px-3 p-2.5 placeholder:text-gray-500">
                        </div>
                        <div>
                            <label for="skema" class="block mb-2 text-sm font-medium text-gray-900">
                                Pilihan Skema Sertifikasi
                            </label>
                            <select id="skema" name="skema"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full px-3 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                                <option selected>-- Pilih--</option>
                                @foreach ($scheme->schemes as $scheme)
                                    <option value="{{ $scheme->name }}">{{ $scheme->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="" class="block mb-2 text-sm font-medium text-gray-900">
                                Jenis Kepesertaan
                            </label>
                            <div class="grid grid-cols-2 gap-5">
                                <div class="flex items-center ps-4 border bg-gray-50 border-gray-300 rounded-md">
                                    <input id="kepesertaan-1" type="radio" value="Individu" name="kepesertaan"
                                        class="w-4 h-4 text-orange-600 bg-gray-100 border-gray-300 focus:ring-orange-500">
                                    <label for="kepesertaan-1" class="w-full py-2.5 ms-2 text-sm text-gray-700">
                                        Individu
                                    </label>
                                </div>
                                <div class="flex items-center ps-4 border bg-gray-50 border-gray-300 rounded-md">
                                    <input id="kepesertaan-2" type="radio" value="Institusi" name="kepesertaan"
                                        class="w-4 h-4 text-orange-600 bg-gray-100 border-gray-300 focus:ring-orange-500">
                                    <label for="kepesertaan-2" class="w-full py-2.5 ms-2 text-sm text-gray-700">
                                        Institusi
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div>
                            <label for="instansi_pengusul" class="block mb-2 text-sm font-medium text-gray-900">
                                Instansi Pengusul (Jika ada)
                            </label>
                            <input type="text" id="instansi_pengusul" name="instansi_pengusul"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full px-3 p-2.5 placeholder:text-gray-500">
                        </div>
                        <div>
                            <label for="scan_ktp" class="block mb-2 text-sm font-medium text-gray-900">
                                Scan KTP
                            </label>
                            <input
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                id="scan_ktp" name="scan_ktp" type="file">
                        </div>
                        <div>
                            <label for="scan_ijazah" class="block mb-2 text-sm font-medium text-gray-900">
                                Scan Ijazah Pendidikan Terakhir
                            </label>
                            <input
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                id="scan_ijazah" name="scan_ijazah" type="file">
                        </div>
                        <div>
                            <label for="surat_usulan_institusi" class="block mb-2 text-sm font-medium text-gray-900">
                                Surat Usulan Institusi (Jika ada)
                            </label>
                            <input
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                id="surat_usulan_institusi" name="surat_usulan_institusi" type="file">
                        </div>
                        <div>
                            <label for="keanggotaan_iapa" class="block mb-2 text-sm font-medium text-gray-900">
                                Keanggotaan IAPA
                            </label>
                            <select id="keanggotaan_iapa" name="keanggotaan_iapa"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full px-3 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                                <option selected>-- Pilih--</option>
                                <option value="Anggota Individu">Anggota Individu</option>
                                <option value="Anggota Institusi">Anggota Institusi</option>
                                <option value="Bukan Anggota IAPA">Bukan Anggota IAPA</option>
                            </select>
                        </div>
                        <div>
                            <label for="no_anggota_iapa" class="block mb-2 text-sm font-medium text-gray-900">
                                No. Anggota IAPA (jika bukan anggota, tidak perlu mengisi)
                            </label>
                            <input type="text" id="no_anggota_iapa" name="no_anggota_iapa"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full px-3 p-2.5 placeholder:text-gray-500">
                        </div>
                        <button
                            class="w-full cursor-pointer block bg-orange-600 hover:bg-orange-700 rounded-md text-white p-2.5 text-sm poppins-medium"
                            type="submit">
                            Mendaftar
                        </button>
                    </form>
                </div>
            </div> --}}
        </div>
    </main>
@endsection
