<nav class="fixed bg-white z-10 top-0 left-0 w-full flex justify-between items-center shadow-md px-10 h-[75px]">
    <div class="flex items-center gap-3">
        <img src="/imgs/logo-iapa.png" alt="">
        <h1 class="poppins-semibold text-[20px]">LSP - <span class="text-orange-500">API</span></h1>
    </div>
    <div class="flex items-center gap-5">
        <div class="flex items-center gap-8">
            <a href="{{ route('home') }}" class="{{ Route::is('home') ? 'text-orange-600' : 'text-black' }}">
                <i class="fa-regular fa-house mr-1"></i>
                Beranda
            </a>
            <a href="{{ route('informasi') }}"
                class="flex items-center gap-2 {{ Route::is('informasi') ? 'text-orange-600' : 'text-black' }}">
                <i class="fa-regular fa-circle-info"></i>
                Informasi
            </a>

            <a href="javascript:void(0)" id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                class="flex items-center gap-2 {{ Route::is('sertifikasi') || Route::is('sertifikasi.*') || Route::is('jadwal') ? 'text-orange-600' : 'text-black' }}">
                <i class="fa-regular fa-award"></i>
                Sertifikasi
                <i class="fa-solid fa-caret-down"></i>
            </a>
            <!-- Dropdown menu -->
            <div id="dropdown"
                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-[200px] dark:bg-gray-700">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                    <li>
                        <a href="{{ route('sertifikasi') }}"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Skema
                            Sertifikasi</a>
                    </li>
                    <li>
                        <a href="{{ route('jadwal') }}"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Jadwal
                            Uji Kompetensi</a>
                    </li>
                </ul>
            </div>

            <a href="{{ route('galeri') }}"
                class="flex items-center gap-2 {{ Route::is('galeri') ? 'text-orange-600' : 'text-black' }}">
                <i class="fa-regular fa-image"></i>
                Galeri
            </a>
            <a href="{{ route('berita') }}"
                class="flex items-center gap-2 {{ Route::is('berita') || Route::is('berita.*') ? 'text-orange-600' : 'text-black' }}">
                <i class="fa-regular fa-newspaper"></i>
                Berita
            </a>
            <a href="{{ route('pendaftaran.create') }}"
                class="bg-orange-600 hover:bg-orange-700 py-2.5 px-4 text-white text-sm rounded-md">
                Pendaftaran
            </a>
            {{-- <a href="{{ route('berita') }}"
                class="flex items-center gap-2 {{ Route::is('berita') ? 'text-orange-600' : 'text-black' }}">
                <i class="fa-regular fa-newspaper"></i>
                Berita
            </a> --}}
        </div>
        {{-- <div class="flex items-center gap-5">
            <a href="" class="text-sms">
                <i class="fa-regular fa-right-to-bracket mr-1"></i>
                Masuk
            </a>
            <a href="" class="bg-orange-600 py-2.5 px-4 text-white text-sm rounded-md">
                Daftar
            </a>
        </div> --}}
    </div>
</nav>
