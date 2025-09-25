@extends('layouts.user')

@section('content')
    <section class="h-[260px] shadow-sm flex flex-col justify-center bg-white items-center">
        <h1 class="text-2xl poppins-semibold text-center text-orange-500">Jadwal Uji Kompetensi</h1>
        <p class="text-gray-700 text-center mt-2">
            Tentukan jadwal uji kompetensi Anda dengan menyesuaikan ketersediaan waktu.
        </p>
    </section>
    <main class="px-10 py-10 min-h-dvh">
        <div class="grid grid-cols-4 gap-10">
            @foreach ($events as $event)
                <div class="rounded-md shadow-md duration-200 overflow-hidden relative">
                    <div class="p-5 bg-white">
                        <h1 class="poppins-medium h-[45px]">{{ $event->name }}</h1>
                        <div class="flex items-center gap-3 text-sm text-gray-600 mt-3">
                            <i class="fa-solid fa-location-dot"></i>
                            <span>{{ Str::limit($event->place, 30, '...') }}</span>
                        </div>
                        <div class="flex items-center gap-3 text-sm text-gray-600 mt-2">
                            <i class="fa-solid fa-calendar"></i>
                            <span>{{ $event->date }}</span>
                        </div>
                        <div class="flex items-center gap-3 text-sm text-gray-600 mt-2">
                            <i class="fa-solid fa-clock"></i>
                            <span>
                                {{ Carbon\Carbon::parse($event->start_time)->format('H:i') }} WIB
                            </span>
                        </div>
                        <div class="mt-5 flex gap-3">
                            <button type="submit" data-modal-target="detail-modal" data-modal-toggle="detail-modal"
                                data-id="{{ $event->id }}"
                                class="btn-show-detail cursor-pointer w-full text-orange-600 bg-white border border-orange-600 hover:bg-orange-50 focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5">
                                Detail
                            </button>
                            <a href="{{ route('pendaftaran.create') }}"
                                class="cursor-pointer w-full text-center text-white bg-orange-600 hover:bg-orange-700 focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5">
                                Daftar
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </main>

    <div id="detail-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-sm">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900">
                        Detail Jadwal
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
                <div id="container-modal" class="h-[500px] w-[500px]"></div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(".btn-show-detail").click(showDetail);

        function showDetail() {
            const id = $(this).data("id");

            $.ajax({
                url: "{{ route('jadwal.show', ':id') }}".replace(':id', id),
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
    </script>
@endsection
