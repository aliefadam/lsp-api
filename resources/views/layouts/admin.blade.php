<!DOCTYPE html>
<html lang="id">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>LSP API - {{ $title }}</title>

        {{-- Logo --}}
        <link rel="shortcut icon" href="{{ asset('/imgs/LOGO LSP.png') }}" type="image/x-icon">

        {{-- Font Poppins --}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
            rel="stylesheet">

        {{-- Font Awesome --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">

        {{-- Sweetalert --}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        {{-- Custom CSS --}}
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

        {{-- Datatables --}}
        <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.min.css">

        {{-- Select2 --}}
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

        {{-- Flowbite --}}
        <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
    </head>

    <body class="bg-gray-50">
        @include('partials.notification')
        @include('partials.topbar')
        @include('partials.sidebar')

        <div class="p-5 md:ml-64 mt-16 pb-10">
            @yield('content')
        </div>

        {{-- Jquery --}}
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

        {{-- Datatables --}}
        <script src="https://cdn.datatables.net/2.2.2/js/dataTables.min.js"></script>

        {{-- Select2 --}}
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        {{-- Flowbite --}}
        <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
        <script>
            if (document.querySelector('#data-table')) {
                let table = new DataTable('#data-table');

                $(document).on("click", ".dt-paging-button", function() {
                    initFlowbite();
                });
                $(document).on("change", "#dt-search-0", function() {
                    initFlowbite();
                });
            }

            $(document).ready(function() {
                if ($('.select-2-dropdown').length) {
                    $('.select-2-dropdown').select2();
                }
            });
        </script>

        <script>
            const toggleSidebarButton = document.getElementById("toggleSidebarMobile");
            const sidebar = document.getElementById("sidebar");

            if (toggleSidebarButton && sidebar) {
                toggleSidebarButton.addEventListener("click", function() {
                    sidebar.classList.toggle("-translate-x-full");
                });
            }
        </script>

        {{-- CKEDITOR --}}
        <script>
            const hasCkeditorElement = document.querySelector('#ckeditor') || document.querySelector('.ckeditor');

            if (hasCkeditorElement) {
                const script = document.createElement('script');
                script.src = "https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js";
                script.onload = function() {
                    const toolbar = [
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
                        "uploadImage",
                    ];

                    const primaryEditor = document.querySelector('#ckeditor');
                    const secondaryEditor = document.querySelector('.ckeditor');

                    if (primaryEditor) {
                        ClassicEditor.create(primaryEditor, {
                            plugin: [
                                "SimpleUploadAdapter", "ImageUploadAdapter", "ImageUploadAdapter"
                            ],
                            toolbar,
                        }).catch(function(error) {
                            console.error(error);
                        });
                    }

                    if (secondaryEditor && secondaryEditor !== primaryEditor) {
                        ClassicEditor.create(secondaryEditor, {
                            toolbar,
                        }).catch(function(error) {
                            console.error(error);
                        });
                    }
                };

                document.body.appendChild(script);
            }
        </script>

        @yield('script')
    </body>

</html>
