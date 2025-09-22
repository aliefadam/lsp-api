<div class="p-4 md:p-5 space-y-3 scrollbar bg-white rounded-md overflow-y-auto h-[500px]">
    <div class="grid grid-cols-2 border-b border-dashed pb-3">
        <span class="lg:text-sm text-xs">Nama</span>
        <span class="lg:text-sm text-xs text-gray-600 text-right">
            {{ $participant->name }}
        </span>
    </div>
    <div class="grid grid-cols-2 border-b border-dashed pb-3">
        <span class="lg:text-sm text-xs">NIK</span>
        <span class="lg:text-sm text-xs text-gray-600 text-right">
            {{ $participant->nik }}
        </span>
    </div>
    <div class="grid grid-cols-2 border-b border-dashed pb-3">
        <span class="lg:text-sm text-xs">Tempat Lahir</span>
        <span class="lg:text-sm text-xs text-gray-600 text-right">
            {{ $participant->place_of_birth }}
        </span>
    </div>
    <div class="grid grid-cols-2 border-b border-dashed pb-3">
        <span class="lg:text-sm text-xs">Tanggal Lahir</span>
        <span class="lg:text-sm text-xs text-gray-600 text-right">
            {{ $participant->date_of_birth }}
        </span>
    </div>
    <div class="grid grid-cols-2 border-b border-dashed pb-3">
        <span class="lg:text-sm text-xs">Jenis Kelamin</span>
        <span class="lg:text-sm text-xs text-gray-600 text-right">
            {{ $participant->gender }}
        </span>
    </div>
    <div class="grid grid-cols-2 border-b border-dashed pb-3">
        <span class="lg:text-sm text-xs">Alamat</span>
        <span class="lg:text-sm text-xs text-gray-600 text-right">
            {{ $participant->address }}
        </span>
    </div>
    <div class="grid grid-cols-2 border-b border-dashed pb-3">
        <span class="lg:text-sm text-xs">No. Handphone/Whatsapp</span>
        <span class="lg:text-sm text-xs text-gray-600 text-right">
            {{ $participant->phone }}
        </span>
    </div>
    <div class="grid grid-cols-2 border-b border-dashed pb-3">
        <span class="lg:text-sm text-xs">Email</span>
        <span class="lg:text-sm text-xs text-gray-600 text-right">
            {{ $participant->email }}
        </span>
    </div>
    <div class="grid grid-cols-2 border-b border-dashed pb-3">
        <span class="lg:text-sm text-xs">Pendidikan</span>
        <span class="lg:text-sm text-xs text-gray-600 text-right">
            {{ $participant->pendidikan }}
        </span>
    </div>
    <div class="grid grid-cols-2 border-b border-dashed pb-3">
        <span class="lg:text-sm text-xs">Jurusan</span>
        <span class="lg:text-sm text-xs text-gray-600 text-right">
            {{ $participant->jurusan }}
        </span>
    </div>
    <div class="grid grid-cols-2 border-b border-dashed pb-3">
        <span class="lg:text-sm text-xs">Pilihan Skema Sertifikasi</span>
        <span class="lg:text-sm text-xs text-gray-600 text-right">
            {{ $participant->scheme->name }}
        </span>
    </div>
    <div class="grid grid-cols-2 border-b border-dashed pb-3">
        <span class="lg:text-sm text-xs">Jenis Kepesertaan</span>
        <span class="lg:text-sm text-xs text-gray-600 text-right">
            {{ $participant->kepesertaan }}
        </span>
    </div>

    <div class="grid grid-cols-2 border-b border-dashed pb-3">
        <span class="lg:text-sm text-xs">Scan KTP</span>
        <a href="/uploads/ktp/{{ $participant->scan_ktp }}" download
            class="lg:text-sm text-xs text-orange-600 poppins-medium text-right">
            <i class="fa-solid fa-arrow-down-to-line mr-1"></i> Download
        </a>
    </div>
    <div class="grid grid-cols-2 border-b border-dashed pb-3">
        <span class="lg:text-sm text-xs">Scan Ijazah Pendidikan Terakhir</span>
        <a href="/uploads/ijazah/{{ $participant->scan_ijazah }}" download
            class="lg:text-sm text-xs text-orange-600 poppins-medium text-right">
            <i class="fa-solid fa-arrow-down-to-line mr-1"></i> Download
        </a>
    </div>
    <div class="grid grid-cols-2 border-b border-dashed pb-3">
        <span class="lg:text-sm text-xs">Surat Usulan Institusi</span>
        @if ($participant->surat_usulan_institusi == null)
            <span class="lg:text-sm text-xs text-gray-600 text-right">
                -
            </span>
        @else
            <a href="/uploads/surat_usulan/{{ $participant->surat_usulan_institusi }}" download
                class="lg:text-sm text-xs text-orange-600 poppins-medium text-right">
                <i class="fa-solid fa-arrow-down-to-line mr-1"></i> Download
            </a>
        @endif
    </div>

    <div class="grid grid-cols-2 border-b border-dashed pb-3">
        <span class="lg:text-sm text-xs">Keanggotaan IAPA</span>
        <span class="lg:text-sm text-xs text-gray-600 text-right">
            {{ $participant->keanggotaan_iapa }}
        </span>
    </div>
    <div class="grid grid-cols-2 border-b border-dashed pb-3">
        <span class="lg:text-sm text-xs">No. Anggota IAPA</span>
        <span class="lg:text-sm text-xs text-gray-600 text-right">
            {{ $participant->no_anggota_iapa ?? '-' }}
        </span>
    </div>
</div>
