@extends('layouts.admin')

@section('content')
    <div class="flex justify-between items-start">
        @include('partials.breadcrumb', [
            'current' => $title,
        ])
        <a href="{{ route('admin.berita.create') }}"
            class="text-white bg-orange-600 border border-orange-600 hover:bg-orange-700 focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5">
            <i class="fas fa-plus mr-1.5"></i> Tambah Berita
        </a>
    </div>

    <div class="mt-5">
        <div class="relative overflow-x-auto rounded-md bg-white shadow-md">
            <table id="data-table" class="w-full text-sm text-left rtl:text-right text-gray-700">
                <thead class="text-xs text-orange-600 uppercase bg-white">
                    <tr class="bg-white border-b border-t border-gray-200">
                        <th scope="col" class="px-6 py-4">
                            No
                        </th>
                        <th scope="col" class="px-6 py-4">
                            Judul
                        </th>
                        <th scope="col" class="px-6 py-4">
                            Flyer
                        </th>
                        <th scope="col" class="px-6 py-4">
                            Thumbnail
                        </th>
                        <th scope="col" class="px-6 py-4">
                            Tanggal
                        </th>
                        <th scope="col" class="px-6 py-4">
                            Pengunjung
                        </th>
                        <th scope="col" class="px-6 py-4">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data_berita as $berita)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $berita->title }}</td>
                            <td>
                                <div
                                    class="px-3 py-2 bg-red-600 hover:bg-red-700 w-fit text-white rounded-md mb-3 flex justify-between text-sm">
                                    <a href="/uploads/flyer/{{ $berita->flyer }}" target="_blank"
                                        class="flex items-center gap-2">
                                        <i class="fa-solid fa-file-pdf"></i>
                                        <span>Buka</span>
                                    </a>
                                </div>
                            </td>
                            <td>
                                <img src="/uploads/thumbnail/{{ $berita->thumbnail }}"
                                    class="w-[150px] h-[100px] object-cover rounded-md shadow-md" alt="">
                            </td>
                            <td>
                                {{ $berita->created_at->translatedFormat('l, d-m-Y') }}
                            </td>
                            <td>
                                {{ $berita->views }}
                            </td>
                            <td class="flex gap-3 items-center">
                                <a href="{{ route('admin.berita.edit', $berita->id) }}"
                                    class="text-sm hover:underline poppins-medium text-blue-700">
                                    Edit
                                </a>
                                <a href="javascript:void(0)" data-id="{{ $berita->id }}"
                                    class="text-sm btn-delete hover:underline poppins-medium text-orange-700">Hapus</a>
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
                        url: `{{ route('admin.berita.destroy', ':id') }}`.replace(':id', id),
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
