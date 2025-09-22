<div class="p-4 md:p-5 space-y-3 scrollbar bg-white rounded-md overflow-y-auto h-[500px]">
    <div class="grid grid-cols-2 border-b border-dashed pb-3">
        <span class="lg:text-sm text-xs">Nama</span>
        <span class="lg:text-sm text-xs text-gray-600 text-right">
            {{ $asesor->nama ?? '-' }}
        </span>
    </div>
    <div class="grid grid-cols-2 border-b border-dashed pb-3">
        <span class="lg:text-sm text-xs">NIK</span>
        <span class="lg:text-sm text-xs text-gray-600 text-right">
            {{ $asesor->nik ?? '-' }}
        </span>
    </div>
    <div class="grid grid-cols-2 border-b border-dashed pb-3">
        <span class="lg:text-sm text-xs">Tempat Lahir</span>
        <span class="lg:text-sm text-xs text-gray-600 text-right">
            {{ $asesor->tempat_lahir ?? '-' }}
        </span>
    </div>
    <div class="grid grid-cols-2 border-b border-dashed pb-3">
        <span class="lg:text-sm text-xs">Tanggal Lahir</span>
        <span class="lg:text-sm text-xs text-gray-600 text-right">
            {{ $asesor->tanggal_lahir ?? '-' }}
        </span>
    </div>
    <div class="grid grid-cols-2 border-b border-dashed pb-3">
        <span class="lg:text-sm text-xs">Alamat Domisili</span>
        <span class="lg:text-sm text-xs text-gray-600 text-right">
            {{ $asesor->domisili ?? '-' }}
        </span>
    </div>
    <div class="grid grid-cols-2 border-b border-dashed pb-3">
        <span class="lg:text-sm text-xs">Asal Universitas</span>
        <span class="lg:text-sm text-xs text-gray-600 text-right">
            {{ $asesor->universitas ?? '-' }}
        </span>
    </div>
    <div class="grid grid-cols-2 border-b border-dashed pb-3">
        <span class="lg:text-sm text-xs">No. Sertifikat</span>
        <span class="lg:text-sm text-xs text-gray-600 text-right">
            {{ $asesor->no_sertifikat ?? '-' }}
        </span>
    </div>
    <div class="grid grid-cols-2 border-b border-dashed pb-3">
        <span class="lg:text-sm text-xs">No. Registrasi Asesor</span>
        <span class="lg:text-sm text-xs text-gray-600 text-right">
            {{ $asesor->no_registrasi ?? '-' }}
        </span>
    </div>
    <div class="grid grid-cols-2 border-b border-dashed pb-3">
        <span class="lg:text-sm text-xs">Tanggal Sertifikat Asesor</span>
        <span class="lg:text-sm text-xs text-gray-600 text-right">
            {{ $asesor->tanggal_sertifikat_asesor ?? '-' }}
        </span>
    </div>
    <div class="grid grid-cols-2 border-b border-dashed pb-3">
        <span class="lg:text-sm text-xs">Nama Sertifikat Kompetensi Teknis</span>
        <span class="lg:text-sm text-xs text-gray-600 text-right">
            {{ $asesor->nama_sertifikat_kompentesi_teknis ?? '-' }}
        </span>
    </div>
    <div class="grid grid-cols-2 border-b border-dashed pb-3">
        <span class="lg:text-sm text-xs">Tanggal Sertifikat Kompetensi Teknis</span>
        <span class="lg:text-sm text-xs text-gray-600 text-right">
            {{ $asesor->tanggal_sertifikat_kompentesi_teknis ?? '-' }}
        </span>
    </div>
    <div class="grid grid-cols-2 border-b border-dashed pb-3">
        <span class="lg:text-sm text-xs">Kualifikasi</span>
        <span class="lg:text-sm text-xs text-gray-600 text-right">
            {{ $asesor->kualifikasi ?? '-' }}
        </span>
    </div>
    <div class="grid grid-cols-2 border-b border-dashed pb-3">
        <span class="lg:text-sm text-xs">Jumlah Uji</span>
        <span class="lg:text-sm text-xs text-gray-600 text-right">
            {{ $asesor->jumlah_uji ?? '-' }}
        </span>
    </div>
    <div class="grid grid-cols-2 border-b border-dashed pb-3">
        <span class="lg:text-sm text-xs">Rekening</span>
        <span class="lg:text-sm text-xs text-gray-600 text-right">
            {{ $asesor->nama_bank ?? '-' }}
            <span class="mx-2">•</span>
            {{ $asesor->no_rekening ?? '-' }}
        </span>
    </div>

</div>
