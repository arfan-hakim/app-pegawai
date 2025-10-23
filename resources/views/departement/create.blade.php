@extends('layouts.master')

@section('title', 'Tambah Departemen')
@section('page-title', 'Tambah Departemen')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold mb-6 text-gray-700">Tambah Departemen</h1>

    <form action="{{ route('departements.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block text-gray-700">Nama Departemen</label>
            <input type="text" name="nama_departement"
                class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200" required>
        </div>

        <div class="flex justify-between">
            <a href="{{ route('departements.index') }}"
                class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600">
                Kembali
            </a>
            <button type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection