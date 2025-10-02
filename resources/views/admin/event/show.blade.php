@extends('layouts.admin')

@section('content')
    <div class="flex justify-between items-start">
        @include('partials.breadcrumb', [
            'current' => $title,
            'before' => [
                'name' => 'Acara',
                'url' => route('admin.event.index'),
            ],
        ])
    </div>

    <div class="mt-5 space-y-5">
        <div class="bg-white rounded-sm shadow-sm p-5 space-y-5 h-fit">
            <div class="">
                <h1 class="text-base poppins-medium text-orange-500">Nama Program</h1>
                <p class="text-lg text-gray-900  text-justify mt-2">
                    {{ $event->name }}
                </p>
            </div>
            <div class="">
                <h1 class="text-base poppins-medium text-orange-500">Lokasi</h1>
                <p class="text-lg text-gray-900  text-justify mt-2">
                    {{ $event->place }}
                </p>
            </div>
            <div class="">
                <h1 class="text-base poppins-medium text-orange-500">Deskripsi Program</h1>
                <p class="text-base text-gray-900  text-justify mt-2">
                    {{ $event->desc ?? 'Tidak ada deskripsi' }}
                </p>
            </div>
            <div class="">
                <h1 class="text-base poppins-medium text-orange-500">Tanggal Pelaksanaan</h1>
                <p class="text-base text-gray-900  text-justify mt-2">
                    {{ $event->date }}
                </p>
            </div>
            <div class="">
                <h1 class="text-base poppins-medium text-orange-500">Jam Pelaksanaan</h1>
                <p class="text-base text-gray-900  text-justify mt-2">
                    {{ $event->start_time }} - {{ $event->end_time }}
                </p>
            </div>
            {{-- <div class="">
                <h1 class="text-base poppins-medium text-orange-500">Link Pendaftaran</h1>
                <div class="flex items-center gap-3">
                    <a target="_blank" href="{{ url("/sertifikasi/{$event->url}") }}"
                        class="text-sm text-blue-800 hover:text-blue-900">{{ url("/sertifikasi/{$event->url}") }}</a>
                    <button type="button" id="copy-link-pendaftaran" data-copy="{{ url("/sertifikasi/{$event->url}") }}"
                        class="text-white w-fit bg-orange-600 hover:bg-orange-700 focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-sm px-4 py-2.5">
                        <i class="fa-regular fa-copy"></i>
                    </button>
                </div>
            </div> --}}
            <div class="">
                <h1 class="text-base poppins-medium text-orange-500">Link Upload Surat Pendukung</h1>
                <div class="flex items-center gap-3">
                    <a target="_blank" href="{{ url("/sertifikasi/upload-surat-pendukung/{$event->slug}") }}"
                        class="text-sm text-blue-800 hover:text-blue-900">{{ url("/sertifikasi/upload-surat-pendukung/{$event->slug}") }}</a>
                    <button type="button" id="copy-link-upload"
                        data-copy="{{ url("/sertifikasi/upload-surat-pendukung/{$event->slug}") }}"
                        class="text-white w-fit bg-orange-600 hover:bg-orange-700 focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-sm px-4 py-2.5">
                        <i class="fa-regular fa-copy"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-sm shadow-sm p-5 h-fit">
            <h1 class="text-lg poppins-medium text-orange-500">Daftar Skema</h1>
            <div class="relative overflow-x-auto mt-4 border border-gray-200">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                No
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nama Skema
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Biaya
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($event->schedules as $schedule)
                            <tr class="bg-white border-b border-gray-200">
                                <td class="px-6 py-4">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $schedule->scheme->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ format_rupiah($schedule->scheme->price) }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="mt-5">
        <div class="relative overflow-x-auto rounded-md bg-white shadow-md">
            <div class="flex justify-between mx-5 my-5">
                <h1 class="text-base poppins-medium text-orange-500">{{ $event->response->count() }} Peserta Terdaftar</h1>
                <button type="button" data-modal-target="pengumuman-modal" data-modal-toggle="pengumuman-modal"
                    class="text-blue-800 h-fit bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5">
                    <i class="fa-regular fa-bullhorn mr-1"></i>
                    Kirim Pengumuman
                </button>
            </div>
            <table id="data-table" class="w-full text-sm text-left rtl:text-right text-gray-700">
                <thead class="text-xs text-orange-600 uppercase bg-white">
                    <tr class="bg-white border-b border-t border-gray-200">
                        <th scope="col" class="px-6 py-4">
                            No
                        </th>
                        <th scope="col" class="px-6 py-4">
                            Nama Peserta
                        </th>
                        <th scope="col" class="px-6 py-4">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-4">
                            Nomor WA
                        </th>
                        <th scope="col" class="px-6 py-4">
                            Skema yang diabmil
                        </th>
                        <th scope="col" class="px-6 py-4">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($event->response as $response)
                        <tr>
                            <td class="px-6 py-4">
                                {{ $loop->iteration }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $response->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $response->email }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $response->phone }}
                            </td>
                            <td class="px-6 py-4">
                                {{ Str::limit($response->scheme->name, 20, '...') }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <button type="button" data-modal-target="detail-modal" data-modal-toggle="detail-modal"
                                        data-id="{{ $response->id }}"
                                        class="text-orange-600 btn-show-detail bg-white hover:bg-gray-50 border border-orange-600 focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-xs px-4 py-2.5">
                                        <i class="fa-regular fa-info-circle mr-1"></i> Detail
                                    </button>
                                    <button type="button" data-modal-target="sertifikat-modal"
                                        data-modal-toggle="sertifikat-modal" data-event-id="{{ $event->id }}"
                                        data-response-id="{{ $response->id }}"
                                        class="text-orange-600 btn-get-surat-pendukung bg-white hover:bg-gray-50 border border-orange-600 focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-xs px-4 py-2.5">
                                        <i class="fa-regular fa-arrow-up-from-bracket mr-1"></i> Kirim E-Sertifikat
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div id="detail-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-sm">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900">
                        Detail Peserta
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                        data-modal-hide="detail-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div id="container-modal" class="h-[500px]"></div>
            </div>
        </div>
    </div>

    <div id="sertifikat-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-sm">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900">
                        Kirim E-Sertifikat
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                        data-modal-hide="sertifikat-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div id="container-modal-sertifikat" class=""></div>
            </div>
        </div>
    </div>


    <div id="pengumuman-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-sm">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900">
                        Kirim Pengumuman ke email peserta
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                        data-modal-hide="pengumuman-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div id="container-modal" class="p-5">
                    <form action="{{ route('admin.event.send-notification') }}" method="POST">
                        @csrf
                        <input type="hidden" name="event_id" value="{{ $event->id }}">
                        <div class="mb-5">
                            <label for="title" class="block mb-2 text-sm font-medium text-gray-900 ">
                                Judul
                            </label>
                            <input type="text" id="title" name="title"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5"
                                required />
                        </div>
                        <div class="mb-5">
                            <label for="message" class="block mb-2 text-sm font-medium text-gray-900 ">
                                Isi Pesan
                            </label>
                            <textarea id="ckeditor" rows="5" name="message"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-orange-500 focus:border-orange-500 resize-none"
                                placeholder="Tulis Pesan Disini"></textarea>
                        </div>

                        <div class="flex justify-end mt-5">
                            <button type="submit"
                                class="text-white bg-orange-500 hover:bg-orange-600 focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5">
                                <i class="fa-regular fa-paper-plane mr-1"></i>
                                Kirim
                            </button>
                        </div>
                    </form>
                    {{-- <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Isi Pesan
                    </label> --}}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $("#copy-link-pendaftaran").click(function() {
            var copyText = $(this).attr("data-copy");
            var textArea = document.createElement("textarea");
            textArea.value = copyText;
            document.body.appendChild(textArea);
            textArea.select();
            document.execCommand("copy");
            textArea.remove();

            Swal.fire({
                position: "top-end",
                text: "Link berhasil disalin",
                showConfirmButton: false,
                timer: 1500
            });
        });
        $("#copy-link-upload").click(function() {
            var copyText = $(this).attr("data-copy");
            var textArea = document.createElement("textarea");
            textArea.value = copyText;
            document.body.appendChild(textArea);
            textArea.select();
            document.execCommand("copy");
            textArea.remove();

            Swal.fire({
                position: "top-end",
                text: "Link berhasil disalin",
                showConfirmButton: false,
                timer: 1500
            });
        });

        $(document).on("click", ".btn-show-detail", showDetail);
        $(document).on("click", ".btn-get-surat-pendukung", getSuratPendukung);

        function showDetail() {
            const id = $(this).data("id");

            $.ajax({
                url: "{{ route('pendaftaran.show', ':id') }}".replace(':id', id),
                type: "GET",
                beforeSend: function() {
                    $("#container-modal").addClass("h-[500px]").html(`
                    <div class="flex justify-center items-center h-full py-5">
                        <div role="status">
                            <svg aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin fill-orange-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/><path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/></svg>
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                    `);
                },
                success: function(response) {
                    $("#container-modal").html(response.html);
                }
            })
        }

        function getSuratPendukung() {
            const event_id = $(this).data("event-id");
            const reponse_id = $(this).data("response-id");

            $.ajax({
                url: "{{ route('admin.surat-pendukung.show', [':event_id', ':response_id']) }}"
                    .replace(':event_id', event_id)
                    .replace(':response_id', reponse_id),
                type: "GET",
                beforeSend: function() {
                    $("#container-modal-sertifikat").html(`
                    <div class="flex justify-center items-center h-full py-20">
                        <div role="status">
                            <svg aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin fill-orange-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/><path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/></svg>
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                    `);
                },
                success: function(response) {
                    $("#container-modal-sertifikat").html(response.html);
                }
            })
        }
    </script>
@endsection
