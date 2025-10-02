<footer class="bg-white px-10 py-14 flex gap-7 text-white">
    <div class="flex-[2]">
        <h1 class="text-lg poppins-semibold text-orange-700">LSP - API</h1>
        <p class="text-sm mt-4 text-orange-500">Mewujudkan profesionalisme dan standar kompetensi administrasi publik
            Indonesia melalui sertifikasi yang kredibel dan terpercaya.</p>
        <div class="mt-5 flex gap-5">
            <a href="{{ getSosmed()->facebook ?? '' }}" target="_blank"
                class="w-10 h-10 bg-orange-700 rounded-lg flex items-center justify-center hover:scale-105 duration-200 cursor-pointer">
                <div class="w-5 h-5 flex items-center justify-center">
                    <i class="fa-brands fa-facebook"></i>
                </div>
            </a>
            <a href="{{ getSosmed()->twitter ?? '' }}" target="_blank"
                class="w-10 h-10 bg-orange-700 rounded-lg flex items-center justify-center hover:scale-105 duration-200 cursor-pointer">
                <div class="w-5 h-5 flex items-center justify-center">
                    <i class="fa-brands fa-twitter"></i>
                </div>
            </a>
            <a href="{{ getSosmed()->instagram ?? '' }}" target="_blank"
                class="w-10 h-10 bg-orange-700 rounded-lg flex items-center justify-center hover:scale-105 duration-200 cursor-pointer">
                <div class="w-5 h-5 flex items-center justify-center">
                    <i class="fa-brands fa-instagram"></i>
                </div>
            </a>
            <a href="{{ getSosmed()->linkedin ?? '' }}" target="_blank"
                class="w-10 h-10 bg-orange-700 rounded-lg flex items-center justify-center hover:scale-105 duration-200 cursor-pointer">
                <div class="w-5 h-5 flex items-center justify-center">
                    <i class="fa-brands fa-linkedin"></i>
                </div>
            </a>
        </div>
    </div>
    <div class="flex-[1]">
        <h1 class="text-orange-700 poppins-semibold">Informasi</h1>
        <div class="flex flex-col mt-4 gap-3">
            <a href="#tentang-kami" class="text-sm text-orange-500 hover:scale-105 duration-200">Tentang Kami</a>
            <a href="#profil-pengelola" class="text-sm text-orange-500 hover:scale-105 duration-200">Profil
                Pengelola</a>
            <a href="#visi-misi" class="text-sm text-orange-500 hover:scale-105 duration-200">Visi & Misi</a>
            <a href="#skema-sertifikasi" class="text-sm text-orange-500 hover:scale-105 duration-200">Skema
                Sertifikasi</a>
        </div>
    </div>
    <div class="flex-[1]">
        <h1 class="text-orange-700 poppins-semibold">Kontak</h1>
        <div class="flex flex-col mt-4 gap-4">
            <div class="flex gap-3">
                <i class="fa-regular translate-y-1 fa-location-dot text-orange-500"></i>
                <a href="{{ getContact()->link_gmap }}" target="_blank"
                    class="text-sm text-orange-500 hover:scale-105 duration-200">
                    {{ getContact()->address }}
                </a>
            </div>
            <div class="flex gap-3">
                <i class="fa-regular translate-y-1 fa-phone text-orange-500"></i>
                <a href="tel:+{{ getContact()->phone }}" class="text-sm text-orange-500 hover:scale-105 duration-200">
                    +{{ getContact()->phone }}
                </a>
            </div>
            <div class="flex gap-3">
                <i class="fa-regular translate-y-1 fa-envelope text-orange-500"></i>
                <a href="mailto:{{ getContact()->email }}" class="text-sm text-orange-500 hover:scale-105 duration-200">
                    {{ getContact()->email }}
                </a>
            </div>
        </div>
    </div>
</footer>
