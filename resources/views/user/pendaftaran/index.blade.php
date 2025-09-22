@extends('layouts.auth')

@section('content')
    <form action="" class="my-10" enctype="multipart/form-data" method="POST">
        <div class="w-[70%] mt-10 mb-5 mx-auto rounded-md shadow-md">
            <img src="/imgs/header-example.png" class="rounded-md w-full object-cover" alt="">
        </div>
        <div class="p-10 bg-white w-[70%] rounded-md shadow-md mx-auto mb-5 space-y-5">
            <div>
                <label for="scheme_id" class="block mb-2 text-sm font-medium text-orange-600">
                    Skema Sertifikasi <span class="text-red-600">*</span>
                </label>
                <select id="scheme_id" name="scheme_id" required
                    class="select-2-dropdown bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full px-3 p-2.5 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                    <option selected>-- Pilih--</option>
                    @foreach ($schemes as $scheme)
                        <option value="{{ $scheme->id }}">{{ $scheme->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="schedule_id" class="block mb-2 text-sm font-medium text-orange-600">
                    Jadwal Uji Kompetensi <span class="text-red-600">*</span>
                </label>
                <select id="schedule_id" name="schedule_id" disabled required
                    class="cursor-not-allowed select-2-dropdown bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full px-3 p-2.5 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                    <option selected>-- Harap Pilih Skema Terlebih Dahulu --</option>
                </select>
            </div>
        </div>
        <div class="p-10 bg-white w-[70%] rounded-md shadow-md mx-auto mb-5 space-y-5">
            @csrf
            <div class="grid grid-cols-2 gap-5">
                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-orange-600">
                        Nama Lengkap (sesuai KTP tanpa gelar) <span class="text-red-600">*</span>
                    </label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full px-3 p-2.5 placeholder:text-gray-500">
                </div>
                <div>
                    <label for="nik" class="block mb-2 text-sm font-medium text-orange-600">
                        NIK <span class="text-red-600">*</span>
                    </label>
                    <input type="text" id="nik" name="nik" value="{{ old('nik') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full px-3 p-2.5 placeholder:text-gray-500">
                </div>
            </div>
            <div class="grid grid-cols-2 gap-5">
                <div>
                    <label for="place_of_birth" class="block mb-2 text-sm font-medium text-orange-600">
                        Tempat Lahir <span class="text-red-600">*</span>
                    </label>
                    <input type="text" id="place_of_birth" name="place_of_birth" value="{{ old('place_of_birth') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full px-3 p-2.5 placeholder:text-gray-500">
                </div>
                <div>
                    <label for="date_of_birth" class="block mb-2 text-sm font-medium text-orange-600">
                        Tanggal Lahir <span class="text-red-600">*</span>
                    </label>
                    <input type="date" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full px-3 p-2.5 placeholder:text-gray-500">
                </div>
            </div>
            <div class="grid grid-cols-2 gap-5">
                <div>
                    <label for="" class="block mb-2 text-sm font-medium text-orange-600">
                        Jenis Kelamin <span class="text-red-600">*</span>
                    </label>
                    <div class="grid grid-cols-2 gap-5">
                        <div class="flex items-center ps-4 border bg-gray-50 border-gray-300 rounded-md">
                            <input id="gender-1" type="radio" value="Laki-laki" name="gender"
                                class="w-4 h-4 text-orange-600 bg-gray-100 border-gray-300 focus:ring-orange-500">
                            <label for="gender-1" class="w-full py-2.5 ms-2 text-sm text-gray-700">
                                Laki-laki
                            </label>
                        </div>
                        <div class="flex items-center ps-4 border bg-gray-50 border-gray-300 rounded-md">
                            <input id="gender-2" type="radio" value="Perempuan" name="gender"
                                class="w-4 h-4 text-orange-600 bg-gray-100 border-gray-300 focus:ring-orange-500">
                            <label for="gender-2" class="w-full py-2.5 ms-2 text-sm text-gray-700">
                                Perempuan
                            </label>
                        </div>
                    </div>
                </div>
                <div>
                    <label for="address" class="block mb-2 text-sm font-medium text-orange-600">
                        Alamat <span class="text-red-600">*</span>
                    </label>
                    <input type="text" id="address" name="address" value="{{ old('address') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full px-3 p-2.5 placeholder:text-gray-500">
                </div>
            </div>
            <div class="grid grid-cols-2 gap-5">
                <div>
                    <label for="phone" class="block mb-2 text-sm font-medium text-orange-600">
                        No. Handphone / Whatsapp <span class="text-red-600">*</span>
                    </label>
                    <input type="text" id="phone" name="phone" value="{{ old('phone') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full px-3 p-2.5 placeholder:text-gray-500">
                </div>
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-orange-600">
                        Email <span class="text-red-600">*</span>
                    </label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full px-3 p-2.5 placeholder:text-gray-500">
                </div>
            </div>
            <div class="grid grid-cols-2 gap-5">
                <div>
                    <label for="pendidikan" class="block mb-2 text-sm font-medium text-orange-600">
                        Pendidikan <span class="text-red-600">*</span>
                    </label>
                    <select id="pendidikan" name="pendidikan"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full px-3 p-2.5 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                        <option selected>-- Pilih--</option>
                        <option value="SMA">SMA</option>
                        <option value="D1">D1</option>
                        <option value="D2">D2</option>
                        <option value="D3">D3</option>
                        <option value="S1">S1</option>
                        <option value="S2">S2</option>
                        <option value="S3">S3</option>
                    </select>
                </div>
                <div>
                    <label for="jurusan" class="block mb-2 text-sm font-medium text-orange-600">
                        Jurusan / Bidang Studi <span class="text-red-600">*</span>
                    </label>
                    <input type="text" id="jurusan" name="jurusan" value="{{ old('jurusan') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full px-3 p-2.5 placeholder:text-gray-500">
                </div>
            </div>
            <div class="grid grid-cols-2 gap-5">
                <div>
                    <label for="" class="block mb-2 text-sm font-medium text-orange-600">
                        Jenis Kepesertaan <span class="text-red-600">*</span>
                    </label>
                    <div class="grid grid-cols-2 gap-5">
                        <div class="flex items-center ps-4 border bg-gray-50 border-gray-300 rounded-md">
                            <input id="kepesertaan-1" type="radio" value="Individu" name="kepesertaan"
                                class="w-4 h-4 text-orange-600 bg-gray-100 border-gray-300 focus:ring-orange-500">
                            <label for="kepesertaan-1" class="w-full py-2.5 ms-2 text-sm text-gray-700">
                                Individu
                            </label>
                        </div>
                        <div class="flex items-center ps-4 border bg-gray-50 border-gray-300 rounded-md">
                            <input id="kepesertaan-2" type="radio" value="Institusi" name="kepesertaan"
                                class="w-4 h-4 text-orange-600 bg-gray-100 border-gray-300 focus:ring-orange-500">
                            <label for="kepesertaan-2" class="w-full py-2.5 ms-2 text-sm text-gray-700">
                                Institusi
                            </label>
                        </div>
                    </div>
                </div>
                <div>
                    <label for="instansi_pengusul" class="block mb-2 text-sm font-medium text-orange-600">
                        Instansi Pengusul (Jika ada)
                    </label>
                    <input type="text" id="instansi_pengusul" name="instansi_pengusul"
                        value="{{ old('instansi_pengusul') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full px-3 p-2.5 placeholder:text-gray-500">
                </div>
            </div>
            <div class="grid grid-cols-2 gap-5">
                <div>
                    <label for="keanggotaan_iapa" class="block mb-2 text-sm font-medium text-orange-600">
                        Keanggotaan IAPA <span class="text-red-600">*</span>
                    </label>
                    <select id="keanggotaan_iapa" name="keanggotaan_iapa"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full px-3 p-2.5 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                        <option selected>-- Pilih--</option>
                        <option value="Anggota Individu">Anggota Individu</option>
                        <option value="Anggota Institusi">Anggota Institusi</option>
                        <option value="Bukan Anggota IAPA">Bukan Anggota IAPA</option>
                    </select>
                </div>
                <div>
                    <label for="no_anggota_iapa" class="block mb-2 text-sm font-medium text-orange-600">
                        No. Anggota IAPA (jika bukan anggota, tidak perlu mengisi)
                    </label>
                    <input type="text" id="no_anggota_iapa" name="no_anggota_iapa"
                        value="{{ old('no_anggota_iapa') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full px-3 p-2.5 placeholder:text-gray-500">
                </div>
            </div>
        </div>
        <div class="p-10 bg-white w-[70%] rounded-md shadow-md mx-auto mb-5 space-y-5">
            <div>
                <label for="scan_ktp" class="block mb-2 text-sm font-medium text-orange-600">
                    Scan KTP <span class="text-red-600">*</span>
                </label>
                <input
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none"
                    id="scan_ktp" name="scan_ktp" type="file">
            </div>
            <div>
                <label for="scan_ijazah" class="block mb-2 text-sm font-medium text-orange-600">
                    Scan Ijazah Pendidikan Terakhir <span class="text-red-600">*</span>
                </label>
                <input
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none"
                    id="scan_ijazah" name="scan_ijazah" type="file">
            </div>
            <div>
                <label for="surat_usulan_institusi" class="block mb-2 text-sm font-medium text-orange-600">
                    Surat Usulan Institusi (Jika ada)
                </label>
                <input
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none"
                    id="surat_usulan_institusi" name="surat_usulan_institusi" type="file">
            </div>
        </div>
        <div class="mx-auto w-[70%] mt-7">
            <button
                class="w-full cursor-pointer block bg-orange-600 hover:bg-orange-700 rounded-md text-white py-3 text-sm poppins-medium"
                type="submit">
                Mendaftar
            </button>
            <div class="w-full mt-5">
                <span class="text-center block text-sm">
                    <a href="{{ route('home') }}" class="text-orange-600 poppins-semibold">
                        Kembali
                        ke beranda
                    </a>
                </span>
            </div>
        </div>
    </form>
@endsection

@section('script')
    <script>
        $("#scheme_id").change(getSchedule);

        function getSchedule() {
            const schemeID = $(this).val();

            $.ajax({
                type: "GET",
                url: "{{ route('schedule.show', ':scheme_id') }}".replace(':scheme_id', schemeID),
                beforeSend: function() {
                    $("#schedule_id")
                        .html(`
                        <option>Loading....</option>
                        `);
                },
                success: function(response) {
                    const html = response.html;
                    $("#schedule_id")
                        .attr("disabled", false)
                        .removeClass("cursor-not-allowed")
                        .html(html);
                }
            });
        }
    </script>
@endsection
