@extends('layouts.admin')

@section('content')
    <div class="flex justify-between items-start">
        @include('partials.breadcrumb', [
            'current' => $title,
        ])
        <a href="{{ route('admin.tuk.create') }}"
            class="text-white bg-orange-600 border border-orange-600 hover:bg-orange-700 focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5">
            <i class="fas fa-plus mr-1.5"></i> Tambah TUK
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
                            Nama Tempat
                        </th>
                        <th scope="col" class="px-6 py-4 w-[300px]">
                            Alamat
                        </th>
                        <th scope="col" class="px-6 py-4">
                            Gambar
                        </th>
                        <th scope="col" class="px-6 py-4">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tuks as $tuk)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $tuk->name }}</td>
                            <td>{{ $tuk->address }}</td>
                            <td>
                                <img src="/uploads/{{ $tuk->image }}"
                                    class="w-[150px] h-[100px] object-cover rounded-md shadow-md" alt="">
                            </td>
                            <td class="flex items-center gap-3">
                                <a href="{{ route('admin.tuk.edit', $tuk->id) }}"
                                    class="text-blue-500 poppins-medium hover:text-blue-600 hover:underline">Edit</a>
                                <a href="javascript:void(0)" data-id="{{ $tuk->id }}"
                                    class="btn-delete text-red-500 poppins-medium hover:text-red-600 hover:underline">Hapus</a>
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
                        url: `{{ route('admin.tuk.destroy', ':id') }}`.replace(':id', id),
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
