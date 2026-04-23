@extends('layouts.admin')

@section('content')
    <div class="flex justify-between items-start">
        @include('partials.breadcrumb', [
            'current' => $title,
        ])
        <div class="flex items-center gap-2">
            <button type="button" data-modal-target="header-image-modal" data-modal-toggle="header-image-modal"
                class="text-orange-700 bg-white border border-orange-600 hover:bg-orange-50 focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5">
                <i class="fas fa-image mr-1.5"></i> Ganti Gambar Header
            </button>
            <a href="{{ route('admin.event.create') }}"
                class="text-white bg-orange-600 border border-orange-600 hover:bg-orange-700 focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5">
                <i class="fas fa-plus mr-1.5"></i> Tambah Acara
            </a>
        </div>
    </div>

    <div class="mt-5">
        <div class="relative overflow-x-auto rounded-md h-[80vh] bg-white shadow-md">
            <table id="data-table" class="w-full text-sm text-left rtl:text-right text-gray-700">
                <thead class="text-xs text-orange-600 uppercase bg-white">
                    <tr class="bg-white border-b border-t border-gray-200">
                        <th scope="col" class="px-6 py-4">
                            No
                        </th>
                        <th scope="col" class="px-6 py-4">
                            Nama Acara
                        </th>
                        <th scope="col" class="px-6 py-">
                            Tempat
                        </th>
                        <th scope="col" class="px-6 py-4">
                            Tanggal
                        </th>
                        <th scope="col" class="px-6 py-4">
                            Jam
                        </th>
                        <th scope="col" class="px-6 py-4">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($events as $event)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $event->name }}</td>
                            <td>{{ Str::limit($event->place, 50, '...') }}</td>
                            <td>{{ $event->date }}</td>
                            <td>{{ Carbon\Carbon::parse($event->start_time)->format('H:i') }} WIB</td>
                            {{-- <td>
                                @if ($event->is_active)
                                    <span
                                        class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-sm">Dibuka
                                    </span>
                                @else<span
                                        class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded-sm">Ditutup
                                    </span>
                                @endif
                            </td> --}}
                            {{-- <td>{{ $event->response->count() }}</td> --}}
                            <td>
                                <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown-{{ $loop->iteration }}"
                                    class="text-orange-700 bg-white hover:bg-gray-50 border border-orange-600 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center"
                                    type="button">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                </button>

                                <!-- Dropdown menu -->
                                <div id="dropdown-{{ $loop->iteration }}"
                                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-md w-44">
                                    <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownDefaultButton">
                                        <li>
                                            <a href="{{ route('admin.event.edit-status', $event->id) }}"
                                                class="block px-4 py-2 hover:bg-gray-100">
                                                @if ($event->is_active)
                                                    Tutup Pendaftaran
                                                @else
                                                    Buka Pendaftaran
                                                @endif
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('admin.event.edit', $event->id) }}"
                                                class="block px-4 py-2 hover:bg-gray-100">Edit</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('admin.event.show', $event->id) }}"
                                                class="btn-detail block px-4 py-2 hover:bg-gray-100">
                                                Lihat
                                                Detail
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)" data-id="{{ $event->id }}"
                                                class="block px-4 py-2 btn-delete hover:bg-gray-100 text-red-600">
                                                Hapus
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div id="header-image-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <div class="relative bg-white rounded-lg shadow-sm">
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900">
                        Ganti Gambar Header Pendaftaran
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                        data-modal-toggle="header-image-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <form class="p-4 md:p-5" action="{{ route('admin.event.update-header-image') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="space-y-4">
                        <div>
                            <label for="header-image-input" class="block mb-2 text-sm font-medium text-gray-900">
                                Upload Gambar Baru <span class="text-sm text-gray-600">(png, jpg, jpeg, webp)</span>
                            </label>
                            <input id="header-image-input" name="image" type="file"
                                accept="image/png, image/jpeg, image/webp"
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50">
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900">Preview Gambar</label>
                            <img id="header-image-preview"
                                src="{{ $pendaftaranHeader?->image ?? '/imgs/header-example.png' }}"
                                class="w-full max-h-[280px] rounded-md shadow object-cover"
                                alt="Preview Header Pendaftaran">
                        </div>
                    </div>
                    <div class="flex justify-end mt-6">
                        <button type="submit"
                            class="text-white inline-flex items-center bg-orange-500 hover:bg-orange-600 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $("#header-image-input").on("change", function() {
            const file = this.files[0];
            if (!file) return;

            const reader = new FileReader();
            reader.onload = function(e) {
                $("#header-image-preview").attr("src", e.target.result);
            };
            reader.readAsDataURL(file);
        });

        $(document).on("click", ".btn-delete", deleteEvent)

        function deleteEvent() {
            const id = $(this).data("id");

            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Aksi ini tidak dapat dibatalkan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, yakin!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `{{ route('admin.event.destroy', ':id') }}`.replace(':id', id),
                        type: 'DELETE',
                        data: {
                            _token: "{{ csrf_token() }}",
                        },
                        beforeSend: function() {
                            Swal.fire({
                                title: 'Loading',
                                text: 'Please wait...',
                                didOpen: () => {
                                    Swal.showLoading()
                                }
                            });
                        },
                        success: function(data) {
                            location.reload();
                        },
                    });
                }
            });
        }
    </script>
@endsection
