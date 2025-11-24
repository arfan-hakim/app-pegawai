@extends('layouts.master')

@section('title', 'Edit Jabatan')
@section('page-title', 'Edit Jabatan')

@section('content')
<div class="max-w-2xl mx-auto mt-10 bg-white/90 dark:bg-gray-800/90 backdrop-blur-md p-8 rounded-2xl shadow-xl border border-green-200 dark:border-green-700 transition-all">

    <h1 class="text-3xl font-semibold mb-8 text-center text-green-800 dark:text-green-200">
        ✏️ Edit Jabatan
    </h1>

    <form action="{{ route('positions.update', $position->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <!-- Nama Jabatan -->
        <div>
            <label class="block text-green-800 dark:text-green-200 font-medium mb-2">Nama Jabatan</label>
            <input type="text"
                name="nama_jabatan"
                value="{{ old('nama_jabatan', $position->nama_jabatan) }}"
                class="w-full border border-green-200 dark:border-green-700 rounded-lg p-3 focus:ring-2 focus:ring-green-500 focus:outline-none dark:bg-gray-900 dark:text-white transition"
                placeholder="Masukkan nama jabatan"
                required>
        </div>

        <!-- Gaji Pokok -->
        <div>
            <label class="block text-green-800 dark:text-green-200 font-medium mb-2">Gaji Pokok</label>
            <input type="number"
                name="gaji_pokok"
                value="{{ old('gaji_pokok', $position->gaji_pokok) }}"
                class="w-full border border-green-200 dark:border-green-700 rounded-lg p-3 focus:ring-2 focus:ring-green-500 focus:outline-none dark:bg-gray-900 dark:text-white transition"
                placeholder="Masukkan gaji pokok (Rp)"
                required>
        </div>

        <!-- Dibuat Pada -->
        <div>
            <label class="block text-green-800 dark:text-green-200 font-medium mb-2">Dibuat Pada</label>
            <input type="text"
                value="{{ $position->created_at }}"
                readonly
                class="w-full bg-gray-100 dark:bg-gray-900 border border-green-100 dark:border-green-700 rounded-lg p-3 text-gray-700 dark:text-gray-300 cursor-not-allowed shadow-sm">
        </div>

        <!-- Tombol Aksi -->
        <div class="flex justify-between items-center pt-4">
            <a href="{{ route('positions.index') }}"
                class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg shadow-sm transition">
                ← Batal
            </a>
            <button type="submit"
                class="bg-green-700 hover:bg-green-800 text-white px-5 py-2 rounded-lg shadow-md font-medium transition">
                💾 Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection