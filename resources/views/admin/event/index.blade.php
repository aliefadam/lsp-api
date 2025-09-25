@extends('layouts.admin')

@section('content')
    <div class="flex justify-between items-start">
        @include('partials.breadcrumb', [
            'current' => $title,
        ])
        <a href="{{ route('admin.event.create') }}"
            class="text-white bg-orange-600 border border-orange-600 hover:bg-orange-700 focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5">
            <i class="fas fa-plus mr-1.5"></i> Tambah Acara
        </a>
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
@endsection

@section('script')
    <script>
        $(".btn-delete").click(deleteEvent);

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
