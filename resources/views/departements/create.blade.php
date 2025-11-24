@extends('layouts.master')

@section('title', 'Tambah Departemen')
@section('page-title', 'Tambah Departemen')

@section('content')
<div class="max-w-2xl mx-auto mt-10 bg-white/90 dark:bg-gray-800/90 backdrop-blur-md p-8 rounded-2xl shadow-lg border border-green-200 dark:border-green-700 transition">

    <!-- Form Tambah Departemen -->
    <form action="{{ route('departements.store') }}" method="POST" class="space-y-6">
        @csrf

        <div>
            <label class="block text-green-900 dark:text-green-200 font-medium mb-2">Nama Departemen</label>
            <input type="text" name="nama_departement"
                class="w-full border border-green-300 dark:border-green-600 bg-white dark:bg-gray-900 text-gray-800 dark:text-gray-100 rounded-lg shadow-sm px-4 py-2 focus:ring-2 focus:ring-green-500 focus:outline-none"
                placeholder="Masukkan nama departemen..." required>
        </div>

        <div class="flex justify-between items-center pt-4">
            <a href="{{ route('departements.index') }}"
                class="bg-gray-500 hover:bg-gray-600 text-white px-5 py-2 rounded-lg shadow transition">
                ← Kembali
            </a>

            <button type="submit"
                class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg shadow-md transition">
                💾 Simpan
            </button>
        </div>
    </form>
</div>
@endsection