@extends('layouts.master')

@section('title', 'Tambah Jabatan')
@section('page-title', 'Tambah Jabatan')

@section('content')

<div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold mb-6 text-gray-700">Tambah Jabatan</h1>
    <form action="{{ route('positions.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block text-gray-700">Nama Jabatan</label>
            <input type="text" name="nama_jabatan"
                class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200" required>
        </div>

        <div>
            <label class="block text-gray-700">Gaji Pokok</label>
            <input type="number" name="gaji_pokok" step="0.01"
                class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200" required>
        </div>

        <div class="flex justify-between">
            <a href="{{ route('positions.index') }}"
                class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600">
                Kembali
            </a>
            <button type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                Simpan
            </button>
        </div>
    </form>
</div> @endsection