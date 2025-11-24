@extends('layouts.master')

@section('title', 'Tambah Jabatan')
@section('page-title', 'Tambah Jabatan')

@section('content')
<div class="max-w-2xl mx-auto mt-10 bg-white/90 dark:bg-gray-800/90 backdrop-blur-md p-8 rounded-2xl shadow-xl border border-green-200 dark:border-green-700 transition-all">

    <h1 class="text-3xl font-semibold mb-8 text-center text-green-800 dark:text-green-200">
        🏢 Tambah Jabatan
    </h1>

    <form action="{{ route('positions.store') }}" method="POST" class="space-y-6">
        @csrf

        <!-- Nama Jabatan -->
        <div>
            <label class="block text-green-800 dark:text-green-200 font-medium mb-2">Nama Jabatan</label>
            <input type="text"
                name="nama_jabatan"
                class="w-full border border-green-200 dark:border-green-700 rounded-lg p-3 focus:ring-2 focus:ring-green-500 focus:outline-none dark:bg-gray-900 dark:text-white transition"
                placeholder="Masukkan nama jabatan"
                required>
        </div>

        <!-- Gaji Pokok -->
        <div>
            <label class="block text-green-800 dark:text-green-200 font-medium mb-2">Gaji Pokok</label>
            <input type="number"
                name="gaji_pokok"
                step="0.01"
                class="w-full border border-green-200 dark:border-green-700 rounded-lg p-3 focus:ring-2 focus:ring-green-500 focus:outline-none dark:bg-gray-900 dark:text-white transition"
                placeholder="Masukkan gaji pokok (Rp)"
                required>
        </div>

        <!-- Tombol Aksi -->
        <div class="flex justify-between items-center pt-4">
            <a href="{{ route('positions.index') }}"
                class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg shadow-sm transition">
                ← Kembali
            </a>
            <button type="submit"
                class="bg-green-700 hover:bg-green-800 text-white px-5 py-2 rounded-lg shadow-md font-medium transition">
                💾 Simpan
            </button>
        </div>
    </form>
</div>
@endsection