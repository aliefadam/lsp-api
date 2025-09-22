@extends('layouts.user')

@section('content')
    <section class="h-[400px] flex flex-col justify-center bg-white items-center">
        <div class="flex items-center gap-5 mb-4">
            <img src="/imgs/LOGO BNSP.png" class="w-[120px] h-[50px] object-cover" alt="">
            <img src="/imgs/LOGO IAPA.png" class="w-[120px] h-[50px] object-cover" alt="">
            <img src="/imgs/LOGO LSP.png" class="w-[120px] h-[50px] object-cover" alt="">
        </div>
        <h1 class="text-4xl poppins-semibold">
            Lembaga <span class="text-orange-600">Sertifikasi Profesi</span> Administrasi Publik Indonesia
        </h1>
        <p class="mt-4 w-[50%] text-center">LSP-API Mewujudkan profesionalisme dan standar kompetensi administrasi publik
            Indonesia melalui sertifikasi yang kredibel dan terpercaya.</p>
        <a href="{{ route('sertifikasi') }}"
            class="text-white bg-orange-500 hover:bg-orange-600 focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 mt-3">
            Cari Skema Sertifikasi
        </a>
    </section>

    <section id="tentang-kami" class="px-20 py-10 bg-gray-50">
        <h1 class="text-2xl poppins-semibold text-orange-500">Profil Perusahaan</h1>
        <div class="grid grid-cols-2 gap-10">
            <div class="">
                <div class="mt-3 text-black text-justify">
                    {!! $profil_perusahaan->desc !!}
                </div>
            </div>
            <div class="">
                <img src="/uploads/{{ $profil_perusahaan->image }}" alt="" class="shadow-md rounded-md">
            </div>
        </div>
    </section>

    <section id="profil-pengelola">
        <div class="px-20 py-10 bg-white">
            <h1 class="text-2xl poppins-semibold text-center text-orange-500">Susunan Pengurus LSP-API</h1>
            {{-- <p class="mt-2 text-gray-700 text-center">
                Landasan filosofi yang mengarahkan setiap langkah kami dalam mengembangkan kompetensi profesional
            </p> --}}
            <div class="mt-10 space-y-10">
                <div class="flex justify-center items-center gap-5 relative">
                    <div class="absolute w-full -bottom-5">
                        <hr class="text-orange-600 w-[47%] mx-auto">
                    </div>
                    <div class="absolute w-full -bottom-[9.5px]">
                        <hr class="text-orange-600 w-[1.45%] mx-auto rotate-90">
                    </div>
                    <div class="w-[300px]">
                    </div>

                    <div class="border border-orange-500 rounded-md w-[300px] shadow-md">
                        <img src="/uploads/{{ json_decode($susunan_pengurus->direktur)->image }}" alt=""
                            class="w-full h-[250px] object-cover">
                        <div class="bg-orange-500 p-5 rounded-br-md rounded-bl-md">
                            <h1 class="text-white poppins-semibold">
                                {{ json_decode($susunan_pengurus->direktur)->nama }}
                            </h1>
                            <span class="text-sm text-white italic">
                                {{ json_decode($susunan_pengurus->direktur)->jabatan }}
                            </span>
                        </div>
                    </div>
                    <div class="w-[300px]">
                    </div>
                </div>
                <div class="flex justify-center items-center gap-5 relative">
                    <div class="border border-orange-500 rounded-md w-[300px] shadow-md relative">
                        <div class="absolute w-full -top-[11px]">
                            <hr class="text-orange-600 w-[7%] mx-auto rotate-90">
                        </div>
                        <div class="absolute w-full -top-14">
                            <h1 class="text-center text-orange-500 poppins-semibold">Departemen Sertifikasi</h1>
                        </div>

                        <img src="/uploads/{{ json_decode($susunan_pengurus->departemen_sertifikasi_manajer)->image }}"
                            alt="" class="w-full h-[250px] object-cover">
                        <div class="bg-orange-500 p-5 rounded-br-md rounded-bl-md">
                            <h1 class="text-white poppins-semibold">
                                {{ json_decode($susunan_pengurus->departemen_sertifikasi_manajer)->nama }}
                            </h1>
                            <span class="text-sm text-white italic">
                                {{ json_decode($susunan_pengurus->departemen_sertifikasi_manajer)->jabatan }}
                            </span>
                        </div>
                    </div>
                    <div class="w-[300px]">
                    </div>
                    <div class="border border-orange-500 rounded-md w-[300px] shadow-md relative">
                        <div class="absolute w-full -top-[11px]">
                            <hr class="text-orange-600 w-[7%] mx-auto rotate-90">
                        </div>
                        <div class="absolute w-full -top-14">
                            <h1 class="text-center text-orange-500 poppins-semibold">Departemen Manajemen Mutu</h1>
                        </div>

                        <img src="/uploads/{{ json_decode($susunan_pengurus->departemen_manajemen_mutu_manajer)->image }}"
                            alt="" class="w-full h-[250px] object-cover">
                        <div class="bg-orange-500 p-5 rounded-br-md rounded-bl-md">
                            <h1 class="text-white poppins-semibold">
                                {{ json_decode($susunan_pengurus->departemen_manajemen_mutu_manajer)->nama }}
                            </h1>
                            <span class="text-sm text-white italic">
                                {{ json_decode($susunan_pengurus->departemen_manajemen_mutu_manajer)->jabatan }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center items-center gap-5">
                    <div class="border border-orange-500 rounded-md w-[300px] shadow-md relative">
                        <div class="absolute w-full -top-[21px]">
                            <hr class="text-orange-600 w-[14%] mx-auto rotate-90">
                        </div>
                        <div class="absolute w-full -bottom-[11px]">
                            <hr class="text-orange-600 w-[7%] mx-auto rotate-90">
                        </div>

                        <img src="/uploads/{{ json_decode($susunan_pengurus->departemen_sertifikasi_anggota)->image }}"
                            alt="" class="w-full h-[250px] object-cover">
                        <div class="bg-orange-500 p-5 rounded-br-md rounded-bl-md">
                            <h1 class="text-white poppins-semibold">
                                {{ json_decode($susunan_pengurus->departemen_sertifikasi_anggota)->nama }}
                            </h1>
                            <span class="text-sm text-white italic">
                                {{ json_decode($susunan_pengurus->departemen_sertifikasi_anggota)->jabatan }}
                            </span>
                        </div>
                    </div>
                    <div class="w-[300px]">
                    </div>
                    <div class="border border-orange-500 rounded-md w-[300px] shadow-md relative">
                        <div class="absolute w-full -top-[21px]">
                            <hr class="text-orange-600 w-[14%] mx-auto rotate-90">
                        </div>
                        <div class="absolute w-full -bottom-[11px]">
                            <hr class="text-orange-600 w-[7%] mx-auto rotate-90">
                        </div>

                        <img src="/uploads/{{ json_decode($susunan_pengurus->departemen_manajemen_mutu_anggota)->image }}"
                            alt="" class="w-full h-[250px] object-cover">
                        <div class="bg-orange-500 p-5 rounded-br-md rounded-bl-md">
                            <h1 class="text-white poppins-semibold">
                                {{ json_decode($susunan_pengurus->departemen_manajemen_mutu_anggota)->nama }}
                            </h1>
                            <span class="text-sm text-white italic">
                                {{ json_decode($susunan_pengurus->departemen_manajemen_mutu_anggota)->jabatan }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center items-center gap-5 relative">
                    <div class="absolute w-full -top-5">
                        <hr class="text-orange-600 w-[47%] mx-auto">
                    </div>
                    <div class="absolute w-full -top-[9.5px]">
                        <hr class="text-orange-600 w-[1.45%] mx-auto rotate-90">
                    </div>
                    <div class="absolute w-full -top-14">
                        <h1 class="text-center text-orange-500 poppins-semibold">Departemen Administrasi</h1>
                    </div>

                    <div class="w-[300px]">
                    </div>
                    <div class="border border-orange-500 rounded-md w-[300px] shadow-md">
                        <img src="/uploads/{{ json_decode($susunan_pengurus->departemen_administrasi_manajer)->image }}"
                            alt="" class="w-full h-[250px] object-cover">
                        <div class="bg-orange-500 p-5 rounded-br-md rounded-bl-md">
                            <h1 class="text-white poppins-semibold">
                                {{ json_decode($susunan_pengurus->departemen_administrasi_manajer)->nama }}
                            </h1>
                            <span class="text-sm text-white italic">
                                {{ json_decode($susunan_pengurus->departemen_administrasi_manajer)->jabatan }}
                            </span>
                        </div>
                    </div>
                    <div class="w-[300px]">
                    </div>
                </div>
                <div class="flex justify-center items-center gap-5">
                    <div class="w-[300px]">
                    </div>
                    <div class="border border-orange-500 rounded-md w-[300px] shadow-md relative">
                        <div class="absolute w-full -top-[21px]">
                            <hr class="text-orange-600 w-[14%] mx-auto rotate-90">
                        </div>

                        <img src="/uploads/{{ json_decode($susunan_pengurus->departemen_administrasi_anggota)->image }}"
                            alt="" class="w-full h-[250px] object-cover">
                        <div class="bg-orange-500 p-5 rounded-br-md rounded-bl-md">
                            <h1 class="text-white poppins-semibold">
                                {{ json_decode($susunan_pengurus->departemen_administrasi_anggota)->nama }}
                            </h1>
                            <span class="text-sm text-white italic">
                                {{ json_decode($susunan_pengurus->departemen_administrasi_anggota)->jabatan }}
                            </span>
                        </div>
                    </div>
                    <div class="w-[300px]">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="visi-misi">
        <div class="px-20 py-10 bg-gray-50">
            <h1 class="text-2xl poppins-semibold text-center text-orange-500">Visi, Misi & Nilai Perusahaan</h1>
            <p class="mt-2 text-gray-700 text-center">Landasan filosofi yang mengarahkan setiap langkah kami dalam
                mengembangkan
                kompetensi profesional</p>
            <div class="mt-10 grid grid-cols-3 gap-5">
                <div class="p-8 bg-white shadow-sm rounded-sm">
                    <i class="fa-regular fa-eye p-4 bg-blue-100 text-blue-500 rounded-md"></i>
                    <h1 class="poppins-medium text-lg mt-3">Visi</h1>
                    <div class="mt-2 text-gray-700 text-justify ckeditor">
                        {!! $visi_misi->visi !!}
                    </div>
                </div>
                <div class="p-8 bg-white shadow-sm rounded-sm">
                    <i class="fa-regular fa-thumbs-up p-4 bg-emerald-100 text-emerald-500 rounded-md"></i>
                    <h1 class="poppins-medium text-lg mt-3">Misi</h1>
                    <div class="ckeditor mt-2 text-gray-700">
                        {!! $visi_misi->misi !!}
                    </div>
                </div>
                <div class="p-8 bg-white shadow-sm rounded-sm">
                    <i class="fa-regular fa-bullseye-arrow p-4 bg-purple-100 text-purple-500 rounded-md"></i>
                    <h1 class="poppins-medium text-lg mt-3">Sasaran</h1>
                    <div class="ckeditor mt-2 text-gray-700">
                        {!! $visi_misi->target !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
