@extends('layouts.master')
@section('content')
<div class="w-full flex justify-center items-center min-h-[70vh]">

    <div class="bg-white shadow-lg rounded-2xl p-10 w-full max-w-2xl text-center">

        <!-- Icon -->
        <div class="text-5xl mb-4">👨‍💼</div>

        <!-- Title -->
        <h1 class="text-2xl font-bold text-gray-800 mb-2">
            Sistem Pendataan Pegawai
        </h1>

        <!-- Subtitle -->
        <p class="text-gray-500 mb-6">
            Selamat datang di sistem manajemen data pegawai perusahaan
        </p>

        <!-- Buttons -->
        <div class="flex justify-center gap-4">

            <a href="{{ route('login') }}"
               class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-500 transition">
                Login
            </a>

            <a href="{{ route('register') }}"
               class="bg-gray-700 text-white px-6 py-2 rounded-lg hover:bg-gray-600 transition">
                Register
            </a>

        </div>

    </div>

</div>
@endsection