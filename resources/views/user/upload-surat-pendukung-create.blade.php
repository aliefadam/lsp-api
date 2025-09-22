@extends('layouts.auth')

@section('content')
    <main class="w-full h-dvh flex justify-center items-center bg-gray-100">
        <div class="lg:w-[40%] w-[85%] bg-white p-10 rounded-md shadow-md">
            <h1 class="text-2xl mb-4 poppins-semibold text-orange-600 text-center">Upload Surat Pendukung</h1>
            <div class="my-5 flex flex-col gap-1 items-center">
                <span class="poppins-semibold text-lg">{{ $participant->name }}</span>
                <span>{{ $participant->nik }}</span>
            </div>
            {{-- <p class="mt-3 text-center text-gray-900 text-base">
                Silahkan unggah surat pendukung anda, dan biarkan kami memeriksanya
            </p> --}}

            <form action="{{ route('pendaftaran.upload.store', $event_id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="event_id" value="{{ $event_id }}">
                <input type="hidden" name="nik" value="{{ $participant->nik }}">
                <div class="mt-5 mb-7">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="surat_pendukung">
                        Pilih File
                    </label>
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-full cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.txt,.odt,.ods,.odp" id="surat_pendukung"
                        name="surat_pendukung" type="file">
                </div>
                <div class="">
                    <button type="submit"
                        class="cursor-pointer text-white bg-orange-600 hover:bg-orange-700 focus:outline-none focus:ring-4 focus:ring-orange-300 font-medium rounded-full text-sm px-5 py-2.5 text-center  w-full">
                        Kirim
                    </button>
                </div>
            </form>
        </div>
    </main>
@endsection
