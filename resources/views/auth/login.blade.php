@extends('layouts.landing')

@section('content')
<div class="min-h-screen flex justify-center items-center bg-cover bg-center relative"
    style="background-image: url('/images/bg-rumah-sakit.jpg')">

    <div class="absolute inset-0 bg-black/40 backdrop-blur-sm"></div>

    <div class="relative z-10 w-full max-w-md bg-white/10 backdrop-blur-lg p-8 rounded-2xl border border-white/20 shadow-xl">
        <h2 class="text-2xl font-bold text-white mb-4">Login Admin</h2>

        @if(session('error'))
        <div class="mb-4 p-3 bg-red-500/60 text-white rounded-lg">
            {{ session('error') }}
        </div>
        @endif

        <form method="POST" action="{{ route('login.process') }}" class="space-y-4">
            @csrf

            <div>
                <label class="text-white">Nama Admin</label>
                <input name="name" class="w-full rounded-lg mt-1 bg-white/30 text-white p-2">
            </div>

            <div>
                <label class="text-white">Nomor Telepon</label>
                <input name="phone" class="w-full rounded-lg mt-1 bg-white/30 text-white p-2">
            </div>

            <div class="mb-4">
                <a href="{{ url('/') }}"
                    class="inline-flex items-center px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-200 rounded-md hover:bg-gray-300 dark:hover:bg-gray-600 transition">
                    ← Kembali
                </a>
            </div>

            <button class="w-full bg-emerald-600 hover:bg-emerald-700 text-white py-2 rounded-xl mt-4">
                Login
            </button>
        </form>

    </div>

</div>
@endsection