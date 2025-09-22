@extends('layouts.user')

@section('content')
    <main class="min-h-[80vh]">
        <section id="profil-pengelola">
            <div class="px-20 py-10 bg-white">
                <h1 class="text-2xl poppins-semibold text-center text-orange-500">Tempat Uji Kompetensi</h1>
                <div class="mt-10 grid grid-cols-3 gap-10">
                    @foreach ($tuks as $tuk)
                        <div
                            class="bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                            <a>
                                <img class="rounded-t-lg w-full h-[250px] object-cover" src="/uploads/{{ $tuk->image }}"
                                    alt="" />
                            </a>
                            <div class="p-5">
                                <a>
                                    <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                                        {{ $tuk->name }}
                                    </h5>
                                </a>
                                <p class="mb-3 text-base font-normal text-gray-700 dark:text-gray-400">
                                    {{ $tuk->address }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section id="asesor">
            <div class="px-20 py-10 bg-gray-50">
                <h1 class="text-2xl poppins-semibold text-center text-orange-500">Asesor Bersertifikat</h1>
                <p class="mt-2 text-gray-700 text-center">
                    Profil asesor bersertifikat dan berpengalaman
                </p>
                <div class="mt-10 grid grid-cols-3 gap-5">
                    @foreach ($asesors as $asesor)
                        <div class="block p-5 bg-white border border-gray-200 rounded-lg shadow-sm">
                            <h5 class="mb-1 text-lg text-center font-medium tracking-tight text-gray-900">
                                {{ $asesor->nama }}
                            </h5>
                            <p class="font-normal text-base text-center text-gray-700">
                                {{ $asesor->universitas }}
                            </p>
                            <p class="font-normal text-sm text-center text-gray-700">
                                {{ $asesor->no_registrasi }}
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </main>
@endsection
