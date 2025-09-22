@extends('layouts.auth')

@section('content')
    <main class="w-full h-dvh flex justify-center items-center bg-gray-100">
        <div class="lg:w-[40%] w-[85%] bg-white p-10 rounded-md shadow-md">
            <h1 class="text-2xl mb-4 poppins-semibold text-orange-600 text-center">Upload Surat Pendukung</h1>
            <p class="mt-3 text-center text-gray-900 text-base">
                Silahkan masukkan NIK anda, kami akan melakukan pengecekan terlebih dahulu
            </p>

            <form action="{{ route('pendaftaran.upload.cek-nik', $event->slug) }}" method="POST">
                @csrf
                <input type="hidden" name="event_id" value="{{ $event->id }}">
                <div class="my-5">
                    <div class="relative">
                        <input type="text" id="nik" name="nik" value="{{ old('nik') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-orange-600 focus:border-orange-600 block w-full p-2.5 text-center"
                            placeholder="Input NIK Disini" required>
                    </div>
                </div>

                <div class="">
                    <button type="submit"
                        class="cursor-pointer text-white bg-orange-600 hover:bg-orange-700 focus:outline-none focus:ring-4 focus:ring-orange-300 font-medium rounded-full text-sm px-5 py-2.5 text-center  w-full">
                        Selanjutnya
                    </button>
                </div>
            </form>
        </div>
    </main>
@endsection
