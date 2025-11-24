@extends('layouts.master')

@section('title', 'Gunakan Saldo Koperasi')
@section('page-title', 'Gunakan Saldo Koperasi')

@section('content')
<div class="max-w-lg mx-auto mt-10 bg-white/90 dark:bg-gray-800/90 backdrop-blur-md p-8 rounded-2xl shadow-xl border border-green-200 dark:border-green-700 transition-all">

    <h1 class="text-3xl font-semibold mb-6 text-center text-green-800 dark:text-green-200">
        💳 Gunakan Saldo Koperasi
    </h1>

    @if(session('error'))
    <div class="bg-red-100 dark:bg-red-900/40 border-l-4 border-red-600 text-red-700 dark:text-red-200 p-4 rounded-lg mb-6 shadow-sm">
        ⚠️ {{ session('error') }}
    </div>
    @endif

    <!-- Info Pegawai -->
    <div class="overflow-hidden rounded-xl border border-green-100 dark:border-green-700 mb-6">
        <table class="w-full text-left text-gray-700 dark:text-gray-200">
            <tr class="border-b border-green-100 dark:border-green-700">
                <th class="px-4 py-2 bg-green-50 dark:bg-green-900/30 font-semibold">Nama Pegawai</th>
                <td class="px-4 py-2">{{ $koperasi->employee->nama_lengkap }}</td>
            </tr>
            <tr>
                <th class="px-4 py-2 bg-green-50 dark:bg-green-900/30 font-semibold">Saldo Saat Ini</th>
                <td class="px-4 py-2 font-semibold text-green-700 dark:text-green-300">
                    Rp {{ number_format($koperasi->saldo, 0, ',', '.') }}
                </td>
            </tr>
        </table>
    </div>

    <!-- Form Gunakan Saldo -->
    <form action="{{ route('koperasis.useBalance', $koperasi->id) }}" method="POST" class="space-y-5">
        @csrf
        <div>
            <label class="block text-green-800 dark:text-green-200 font-medium mb-2">
                Jumlah yang Ingin Dipakai
            </label>
            <input
                type="number"
                name="jumlah"
                class="w-full border border-green-200 dark:border-green-700 rounded-lg p-3 focus:ring-2 focus:ring-green-500 focus:outline-none dark:bg-gray-900 dark:text-white transition"
                placeholder="Masukkan jumlah (Rp)">
            @error('jumlah')
            <p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Tombol Aksi -->
        <div class="flex justify-between items-center pt-4">
            <a href="{{ route('koperasis.index') }}"
                class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition shadow-sm">
                ← Kembali
            </a>
            <button type="submit"
                class="bg-green-700 hover:bg-green-800 text-white px-5 py-2 rounded-lg shadow-md font-medium transition">
                💸 Gunakan Saldo
            </button>
        </div>
    </form>
</div>
@endsection