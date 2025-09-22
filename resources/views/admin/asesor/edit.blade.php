@extends('layouts.admin')

@section('content')
    <form action="{{ route('admin.asesor.update', $asesor->id) }}" method="POST" class="" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="flex justify-between items-start">
            @include('partials.breadcrumb', [
                'current' => $title,
                'before' => [
                    'name' => 'Asesor',
                    'url' => route('admin.asesor.index'),
                ],
            ])
        </div>

        <div class="mt-5">
            <div class="bg-white flex-[1.5] lg:w-1/2 w-full rounded-md shadow-md p-5 h-fit">
                <div class="mb-5">
                    <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 ">
                        Nama
                    </label>
                    <input type="text" id="nama" name="nama" value="{{ $asesor->nama }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5" />
                </div>
                <div class="mb-5">
                    <label for="tempat_lahir" class="block mb-2 text-sm font-medium text-gray-900 ">
                        Tempat Lahir
                    </label>
                    <input type="text" id="tempat_lahir" name="tempat_lahir" value="{{ $asesor->tempat_lahir }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5" />
                </div>
                <div class="mb-5">
                    <label for="tanggal_lahir" class="block mb-2 text-sm font-medium text-gray-900 ">
                        Tanggal Lahir
                    </label>
                    <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="{{ $asesor->tanggal_lahir }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5" />
                </div>
                <div class="mb-5">
                    <label for="nik" class="block mb-2 text-sm font-medium text-gray-900 ">
                        NIK
                    </label>
                    <input type="text" id="nik" name="nik" value="{{ $asesor->nik }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5" />
                </div>
                <div class="mb-5">
                    <label for="domisili" class="block mb-2 text-sm font-medium text-gray-900 ">
                        Alamat Domisili
                    </label>
                    <textarea id="domisili" name="domisili" rows="4" value="{{ $asesor->domisili }}"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-orange-500 focus:border-orange-500"></textarea>
                </div>
                <div class="mb-5">
                    <label for="universitas" class="block mb-2 text-sm font-medium text-gray-900 ">
                        Asal Universitas
                    </label>
                    <input type="text" id="universitas" name="universitas" value="{{ $asesor->universitas }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5" />
                </div>
                <div class="mb-5">
                    <label for="no_sertifikat" class="block mb-2 text-sm font-medium text-gray-900 ">
                        No. Sertifikat
                    </label>
                    <input type="text" id="no_sertifikat" name="no_sertifikat" value="{{ $asesor->no_sertifikat }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5" />
                </div>
                <div class="mb-5">
                    <label for="no_registrasi" class="block mb-2 text-sm font-medium text-gray-900 ">
                        No. Registrasi Asesor
                    </label>
                    <input type="text" id="no_registrasi" name="no_registrasi" value="{{ $asesor->no_registrasi }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5" />
                </div>
                <div class="mb-5">
                    <label for="tanggal_sertifikat_asesor" class="block mb-2 text-sm font-medium text-gray-900 ">
                        Tanggal Sertifikat Asesor
                    </label>
                    <input type="date" id="tanggal_sertifikat_asesor" name="tanggal_sertifikat_asesor"
                        value="{{ $asesor->tanggal_sertifikat_asesor }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5" />
                </div>
                <div class="mb-5">
                    <label for="nama_sertifikat_kompetensi_teknis" class="block mb-2 text-sm font-medium text-gray-900 ">
                        Nama Sertifikat Kompetensi Teknis
                    </label>
                    <input type="text" id="nama_sertifikat_kompetensi_teknis" name="nama_sertifikat_kompetensi_teknis"
                        value="{{ $asesor->nama_sertifikat_kompentesi_teknis }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5" />
                </div>
                <div class="mb-5">
                    <label for="tanggal_sertifikat_kompetensi_teknis" class="block mb-2 text-sm font-medium text-gray-900 ">
                        Tanggal Sertifikat Kompetensi Teknis
                    </label>
                    <input type="date" id="tanggal_sertifikat_kompetensi_teknis"
                        name="tanggal_sertifikat_kompetensi_teknis"
                        value="{{ $asesor->tanggal_sertifikat_kompetensi_teknis }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5" />
                </div>
                <div class="mb-5">
                    <label for="kualifikasi" class="block mb-2 text-sm font-medium text-gray-900 ">
                        Kualifikasi
                    </label>
                    <input type="text" id="kualifikasi" name="kualifikasi" value="{{ $asesor->kualifikasi }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5" />
                </div>
                <div class="mb-5">
                    <label for="jumlah_uji" class="block mb-2 text-sm font-medium text-gray-900 ">
                        Jumlah Uji
                    </label>
                    <input type="number" id="jumlah_uji" name="jumlah_uji" value="{{ $asesor->jumlah_uji }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5" />
                </div>
                <div class="mb-5">
                    <label for="" class="block mb-2 text-sm font-medium text-gray-900 ">
                        Rekening
                    </label>
                    <div class="flex gap-3">
                        <input type="text" id="nama_rekening" name="nama_bank"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                            placeholder="Nama Bank (BCA, BRI, BNI)" value="{{ $asesor->nama_bank }}" />
                        <input type="text" id="no_rekening" name="no_rekening" value="{{ $asesor->no_rekening }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                            placeholder="No. Rekening" />
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
        </div>
    </form>
@endsection
