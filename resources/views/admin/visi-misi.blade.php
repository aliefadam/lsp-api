@extends('layouts.admin')

@section('content')
    <div class="flex justify-between items-start">
        @include('partials.breadcrumb', [
            'current' => $title,
        ])
    </div>

    <form action="{{ route('admin.visi-misi.update') }}" method="POST" class="mt-5" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="bg-white w-full lg:w-1/2 rounded-md shadow-md p-5 space-y-5">
            <div class="">
                <label for="visi" class="block mb-2 text-sm font-medium text-gray-900 ">
                    Visi
                </label>
                <textarea id="visi" rows="4" name="visi"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-orange-500 focus:border-orange-500 resize-none"
                    placeholder="">{{ $visi_misi->visi }}</textarea>
            </div>
            <div class="">
                <label for="visi" class="block mb-2 text-sm font-medium text-gray-900 ">
                    Misi
                </label>
                <textarea id="misi" rows="4" name="misi"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-orange-500 focus:border-orange-500 resize-none"
                    placeholder="">{{ $visi_misi->misi }}</textarea>
            </div>
            <div class="">
                <label for="visi" class="block mb-2 text-sm font-medium text-gray-900 ">
                    Target
                </label>
                <textarea id="target" rows="4" name="target"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-orange-500 focus:border-orange-500 resize-none"
                    placeholder="">{{ $visi_misi->target }}</textarea>
            </div>
            <div class="flex justify-end">
                <button type="submit"
                    class="text-white bg-orange-600 hover:bg-orange-700 focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5">
                    Simpan
                </button>
            </div>
        </div>
    </form>
@endsection
@section('script')
    <script>
        ClassicEditor
            .create(document.querySelector('#visi'), {
                toolbar: [
                    "undo",
                    "redo",
                    "|",
                    "heading",
                    "|",
                    "bold",
                    "italic",
                    "underline",
                    "|",
                    "link",
                    "bulletedList",
                    "numberedList",
                    "|",
                    "alignment:left",
                    "alignment:center",
                    "alignment:right",
                    "alignment:justify",
                ],
            })
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#misi'), {
                toolbar: [
                    "undo",
                    "redo",
                    "|",
                    "heading",
                    "|",
                    "bold",
                    "italic",
                    "underline",
                    "|",
                    "link",
                    "bulletedList",
                    "numberedList",
                    "|",
                    "alignment:left",
                    "alignment:center",
                    "alignment:right",
                    "alignment:justify",
                ],
            })
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#target'), {
                toolbar: [
                    "undo",
                    "redo",
                    "|",
                    "heading",
                    "|",
                    "bold",
                    "italic",
                    "underline",
                    "|",
                    "link",
                    "bulletedList",
                    "numberedList",
                    "|",
                    "alignment:left",
                    "alignment:center",
                    "alignment:right",
                    "alignment:justify",
                ],
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
