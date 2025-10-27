@extends('layouts.master')

@section('title', 'Edit Jabatan')
@section('page-title', 'Edit Jabatan')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold mb-6 text-gray-700">Edit Jabatan</h1>

    <form action="{{ route('positions.update', $position->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-gray-700 font-medium mb-1">Nama Jabatan</label>
            <input type="text" name="nama_jabatan"
                value="{{ old('nama_jabatan', $position->nama_jabatan) }}"
                class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200" required>
        </div>

        <div>
            <label class="block text-gray-700 font-medium mb-1">Gaji Pokok</label>
            <input type="number" name="gaji_pokok"
                value="{{ old('gaji_pokok', $position->gaji_pokok) }}"
                class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200" required>
        </div>

        <div>
            <label class="block text-gray-700 font-medium mb-1">Dibuat Pada</label>
            <input type="text" value="{{ $position->created_at }}" readonly
                class="w-full bg-gray-100 border-gray-300 rounded-lg shadow-sm cursor-not-allowed">
        </div>

        <div class="flex justify-between">
            <a href="{{ route('positions.index') }}"
                class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600">
                Batal
            </a>
            <button type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection