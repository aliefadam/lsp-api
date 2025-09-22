@extends('layouts.user')

@section('content')
    <section class="h-[260px] shadow-sm flex flex-col justify-center bg-white items-center">
        <h1 class="text-2xl poppins-semibold text-center">Daftar Asesor</h1>
        <p class="text-gray-700 text-center mt-2">
            Temukan asesor bersertifikat dan berpengalaman yang siap menilai kompetensi Anda sesuai dengan standar industri
            terkini.
        </p>
    </section>
    <main class="px-10 py-10 min-h-dvh">
        <div class="flex justify-between">
            <div class="">
                <label for="simple-search" class="sr-only">Search</label>
                <div class="relative w-full">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <i class="fa-regular fa-magnifying-glass text-gray-400"></i>
                    </div>
                    <input type="text" id="simple-search"
                        class="bg-white shadow-sm border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-600 focus:border-orange-600 block w-[300px] ps-10 p-2.5"
                        placeholder="Cari Asesor..." required />
                </div>
            </div>
            <select id=""
                class="bg-white border border-gray-300 w-[300px] text-gray-600 text-sm rounded-lg focus:ring-orange-600 focus:border-orange-600 block p-2.5">
                <option selected>Semua Kategori</option>
            </select>
        </div>
        <div class="mt-10 grid grid-cols-4 gap-10">
            <div class="rounded-md shadow-md duration-200 overflow-hidden relative">
                <div class="p-5 bg-white">
                    <div class="flex gap-3">
                        <img src="https://readdy.ai/api/search-image?query=professional%20indonesian%20male%20assessor%20portrait%20in%20business%20suit%20with%20confident%20smile%2C%20clean%20white%20background%2C%20professional%20headshot%20photography&width=200&height=200&seq=assessor001&orientation=squarish"
                            alt="" class="object-cover size-14 rounded-md">
                        <div class="flex flex-col">
                            <h1 class="poppins-medium">Dr. Ahmad Rahman, M.Kom</h1>
                            <p class="text-xs text-gray-600">Senior Web Developer</p>
                            <p class="mt-1 text-xs text-gray-600">12 Tahun Pengalaman</p>
                        </div>
                    </div>


                    <div class="mt-5">
                        <h2 class="mb-2 poppins-medium text-gray-900">Skema Kompetensi :</h2>
                        <ul class="space-y-1 text-gray-500 list-disc list-inside">
                            <li class="text-sm">
                                Junior Web Developer
                            </li>
                            <li class="text-sm">
                                Frontend Developer
                            </li>
                            <li class="text-sm">
                                Fullstack Developer
                            </li>
                        </ul>
                    </div>

                    <a href=""
                        class="bg-orange-700 text-white w-full mt-5 rounded-md block py-2 text-center text-sm">Lihat
                        Detail</a>
                </div>
            </div>
        </div>
    </main>
@endsection
