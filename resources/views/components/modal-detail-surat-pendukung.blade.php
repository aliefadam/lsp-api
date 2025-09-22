<div class="p-4 md:p-5 space-y-3 scrollbar bg-white rounded-md overflow-y-auto">
    <div class="grid grid-cols-2 border-b border-dashed pb-3">
        <span class="lg:text-sm text-xs">Surat Pendukung</span>
        @if ($surat_pendukung == null)
            <span class="lg:text-sm text-xs text-gray-600 text-right">
                <span
                    class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-red-900 dark:text-red-300">
                    Belum Diupload
                </span>
            </span>
        @else
            <a href="/uploads/surat-pendukung/{{ $surat_pendukung }}" download
                class="lg:text-sm text-xs text-orange-600 poppins-medium text-right">
                <i class="fa-solid fa-arrow-down-to-line mr-1"></i> Download
            </a>
        @endif
    </div>
    <form
        action="{{ route('admin.surat-pendukung.store', ['event_id' => $event_id, 'response_id' => $response_id]) }}"
        class="mt-5" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="mb-5">
            <label class="block mb-2 text-sm font-medium text-gray-900" for="sertifikat">
                Pilih E-Sertifikat
            </label>
            <input
                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                id="sertifikat" name="sertifikat" type="file">
        </div>
        <button type="submit"
            class="text-white bg-orange-600 hover:bg-orange-700 focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 w-full">
            Kirim E-Sertifikat ke Email Peserta
        </button>
    </form>
</div>
