@extends('layouts.user')

@section('content')
    <section class="h-[260px] shadow-sm flex flex-col justify-center bg-white items-center">
        <h1 class="text-2xl poppins-semibold text-center text-orange-500">Galeri</h1>
        <p class="text-gray-700 text-center mt-2">
            Dokumentasi kegiatan pelaksanaan uji kompetensi dan lain-lain
        </p>
    </section>
    <main class="px-10 py-10 min-h-dvh">
        <div class="grid grid-cols-4 gap-10">
            @foreach ($galleries as $gallery)
                <div class="relative">
                    <button type="button" data-id="{{ $gallery->id }}" data-modal-target="detail-modal"
                        data-modal-toggle="detail-modal"
                        class="cursor-pointer btn-detail absolute left-3 top-3 text-white bg-orange-600 hover:bg-orange-700 focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-sm px-3.5 py-2.5">
                        <i class="fa-solid fa-up-right-and-down-left-from-center scale-110"></i>
                    </button>

                    <img src="/uploads/gallery/{{ $gallery->name }}"
                        class="w-full h-[200px] object-cover rounded-md shadow-md" alt="">
                </div>
            @endforeach
        </div>
    </main>

    <div class="fixed inset-0 bg-gray-900/70 z-50 w-full h-dvh hidden justify-center items-center" id="overlay">
        <div class="absolute top-12 right-12 cursor-pointer">
            <i class="fa-solid fa-xmark text-white text-4xl hover:scale-110 duration-200" id="close-modal"></i>
        </div>
        <div class="relative w-[60%] mx-auto" id="preview-image"></div>
    </div>
@endsection

@section('script')
    <script>
        $(".btn-detail").click(showDetail);
        $("#close-modal").click(closeModal);

        function closeModal() {
            $("#overlay").removeClass("flex").addClass("hidden");
        }

        function showDetail() {
            $("#overlay").addClass("flex").removeClass("hidden");
            const id = $(this).data("id");
            $.ajax({
                type: "GET",
                url: "{{ route('galeri.show', ':id') }}".replace(':id', id),
                beforeSend: function() {
                    $("#preview-image").html(`
                    <div class="flex justify-center items-center h-full py-5">
                        <div role="status">
                            <svg aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin fill-orange-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/><path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/></svg>
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                    `);
                },
                success: function(response) {
                    $("#preview-image").html(`
                        <img class="w-full rounded-md border-3 border-white" src="/uploads/gallery/${response.image}" alt="">
                    `);
                }
            });
        }
    </script>
@endsection
