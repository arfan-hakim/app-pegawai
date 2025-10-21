@extends('layouts.master')

@section('title', 'Edit Departemen')
@section('page-title', 'Edit Departemen')

@section('content')
<div class="container mx-auto max-w-2xl bg-white shadow-md rounded-lg p-6">
    <h2 class="text-2xl font-bold mb-6 text-gray-700">Edit Data Departemen</h2>

    <form action="{{ route('departements.update', $department->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-gray-700">Nama Departemen</label>
            <input type="text" name="nama_departemen"
                value="{{ old('nama_departemen', $department->nama_departemen) }}"
                class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring focus:ring-blue-300"
                required>
        </div>

        <div>
            <label class="block text-gray-700">Kode Departemen</label>
            <input type="text" name="kode_departemen"
                value="{{ old('kode_departemen', $department->kode_departemen) }}"
                class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring focus:ring-blue-300"
                required>
        </div>

        <div>
            <label class="block text-gray-700">Lokasi</label>
            <input type="text" name="lokasi"
                value="{{ old('lokasi', $department->lokasi) }}"
                class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring focus:ring-blue-300">
        </div>

        <div>
            <label class="block text-gray-700">Deskripsi</label>
            <textarea name="deskripsi" rows="3"
                class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring focus:ring-blue-300">{{ old('deskripsi', $department->deskripsi) }}</textarea>
        </div>

        <div class="flex justify-between">
            <a href="{{ route('departements.index') }}"
                class="bg-gray-500 text-white px-4 py-2 rounded-lg shadow hover:bg-gray-600">
                Batal
            </a>
            <button type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700">
                Update
            </button>
        </div>
    </form>
</div>
@endsection