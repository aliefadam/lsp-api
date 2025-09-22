@extends('layouts.auth')

@section('content')
    <div class="flex justify-center items-center h-dvh">
        <div class="bg-white w-[70%] h-[80dvh] overflow-hidden shadow-md rounded-lg grid grid-cols-2">
            <div class="relative">
                <div class="absolute top-0 left-0 w-full h-full flex flex-col justify-center items-center bg-orange-500/50">
                    <h1 class="text-3xl poppins-semibold text-white">LSP-API</h1>
                    <p class="text-sm text-white text-center mt-2">
                        Lembaga Sertifikasi Profesi Administrasi Publik Indonesia
                    </p>
                </div>
                <img src="{{ asset('imgs/login.jpg') }}" class="h-full object-cover" alt="">
            </div>
            <div class="p-10 flex flex-col justify-center relative">
                <div class="flex items-center gap-5 mb-4 absolute right-5 top-5">
                    <img src="/imgs/LOGO BNSP.png" class="w-[80px] object-cover" alt="">
                    <img src="/imgs/LOGO IAPA.png" class="w-[80px] object-cover" alt="">
                    <img src="/imgs/LOGO LSP.png" class="w-[80px] object-cover" alt="">
                </div>
                <h1 class="text-orange-500 text-2xl poppins-semibold text-center">Masuk Administrator</h1>
                <form action="{{ route('login.post') }}" class="mt-6" method="POST">
                    @csrf
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-orange-600">
                            Email
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                <i class="fa-solid fa-envelope text-orange-500"></i>
                            </div>
                            <input type="email" id="email" name="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full ps-10 p-2.5 placeholder:text-gray-500">
                        </div>
                    </div>
                    <div class="mt-5">
                        <label for="password" class="block mb-2 text-sm font-medium text-orange-600">
                            Password
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                <i class="fa-solid fa-lock text-orange-500"></i>
                            </div>
                            <input type="password" id="password" name="password"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full ps-10 p-2.5 placeholder:text-gray-500">
                        </div>
                    </div>
                    <button
                        class="cursor-pointer block mt-6 bg-orange-600 hover:bg-orange-700 rounded-md w-full text-white p-2.5 text-sm poppins-medium"
                        type="submit">
                        Login
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
