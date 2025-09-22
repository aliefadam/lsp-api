@extends('layouts.admin')

@section('content')
    <form action="{{ route('admin.event.store') }}" method="POST" class="" enctype="multipart/form-data">
        @csrf
        <div class="flex justify-between items-start">
            @include('partials.breadcrumb', [
                'current' => $title,
                'before' => [
                    'name' => 'Acara',
                    'url' => route('admin.event.index'),
                ],
            ])
        </div>

        <div class="mt-5">
            <div class="bg-white lg:w-1/2 w-full rounded-md shadow-md p-5 h-fit">
                <div class="mb-5">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">
                        Nama Acara
                    </label>
                    <input type="text" id="name" name="name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                        required />
                </div>
                <div class="mb-5">
                    <label for="place" class="block mb-2 text-sm font-medium text-gray-900 ">
                        Lokasi Acara
                    </label>
                    <select id="place" name="place"
                        class="select-2-dropdown bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full px-3 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                        <option selected>-- Pilih--</option>
                        @foreach ($tuks as $tuk)
                            <option value="{{ $tuk->name }} - {{ $tuk->address }}">
                                {{ $tuk->name }} - {{ $tuk->address }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-5">
                    <label for="date" class="block mb-2 text-sm font-medium text-gray-900 ">
                        Tanggal
                    </label>
                    <input type="date" id="date" name="date"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                        required />
                </div>
                <div class="mb-5">
                    <label for="start_time" class="block mb-2 text-sm font-medium text-gray-900 ">
                        Jam Mulai
                    </label>
                    <input type="time" id="start_time" name="start_time"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                        required />
                </div>
                <div class="mb-5">
                    <label for="end_time" class="block mb-2 text-sm font-medium text-gray-900 ">
                        Jam Selesai
                    </label>
                    <input type="time" id="end_time" name="end_time"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                        required />
                </div>
                <div class="mb-5">
                    <label for="desc" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Deskripsi Acara
                    </label>
                    <textarea id="desc" name="desc" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-orange-500 focus:border-orange-500"></textarea>
                </div>
                <div class="mb-5">
                    <label for="desc" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Pilih Skema Sertifikasi
                    </label>
                    <div class="flex flex-col gap-3">
                        @foreach ($schemes as $scheme)
                            <div class="flex items-center ps-4 border bg-gray-50 border-gray-300 rounded-md">
                                <input id="scheme-{{ $loop->iteration }}" type="checkbox" value="{{ $scheme->id }}"
                                    name="schemes[]"
                                    class="w-4 h-4 text-orange-600 bg-gray-100 border-gray-300 focus:ring-orange-500">
                                <label for="scheme-{{ $loop->iteration }}" class="w-full py-2.5 ms-2 text-sm text-gray-700">
                                    {{ $scheme->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="flex justify-end">
                    <button type="submit"
                        class="text-white bg-orange-600 hover:bg-orange-700 focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5">
                        Simpan
                    </button>
                </div>
            </div>
            {{-- <div class="flex gap-5">
                <div class="flex-[2] h-fit">
                    <div class="bg-white rounded-md shadow-md p-5 h-fit">
                        <div class="flex justify-between">
                            <h1 class="poppins-medium">Skema Sertifikasi + Harga</h1>
                            <a href="javascript:void(0)" id="btn-add-scheme"
                                class="text-sm text-orange-600 hover:underline poppins-medium">Tambah</a>
                        </div>
                        <div class="mt-4">
                            <div class="flex gap-3">
                                <div class="w-[60%]">
                                    <input type="text" id="scheme" name="scheme[]"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                        placeholder="Nama Skema" required />
                                </div>
                                <div class="w-[40%]">
                                    <input type="number" id="price" name="price[]"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                        placeholder="Harga" required />
                                </div>
                            </div>
                            <div class="" id="more-scheme"></div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </form>
@endsection

@section('script')
    <script>
        $("#btn-add-scheme").click(addScheme);

        function addScheme() {
            const html = `
            <div class="flex gap-3 mt-3">
                <div class="w-[60%]">
                    <input type="text" id="scheme" name="scheme[]"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                        placeholder="Nama Skema" required />
                </div>
                <div class="w-[40%]">
                    <input type="number" id="price" name="price[]"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                        placeholder="Harga" required />
                </div>
                <button type="button" class="btn-delete-scheme bg-red-500 hover:bg-red-600 text-white px-4 rounded-lg">
                    <i class="fa-regular fa-trash"></i>
                </button>
            </div>
            `;

            $("#more-scheme").append(html);
        }

        $(document).on("click", ".btn-delete-scheme", function() {
            $(this).parent().remove();
        });
    </script>
@endsection
