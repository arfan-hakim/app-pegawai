@extends('layouts.landing') {{-- layout khusus landing page --}}

@section('content')
<div class="min-h-screen flex items-center justify-center bg-cover bg-center relative"
    style="background-image: url('/images/bg-rumah-sakit.jpg')">

    <div class="absolute inset-0 bg-black/40 backdrop-blur-sm"></div>

    <div class="relative z-10 text-center max-w-2xl bg-white/10 backdrop-blur-lg p-10 rounded-3xl shadow-2xl border border-white/20">
        <h1 class="text-4xl font-bold text-white mb-4 drop-shadow">Admin Kepegawaian</h1>
        <p class="text-white/90 text-lg leading-relaxed">
            Aplikasi ini dirancang untuk membantu pengelolaan data pegawai, gaji, koperasi,
            dan seluruh administrasi kepegawaian secara efisien dan terintegrasi.
        </p>

        <a href="{{ route('login.form') }}"
            class="mt-6 inline-block px-6 py-3 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl shadow-lg transition">
            Login Admin
        </a>
    </div>
</div>
@endsection