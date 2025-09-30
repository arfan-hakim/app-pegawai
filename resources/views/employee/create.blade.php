@extends('layouts.master')

@section('title', 'Daftar Pegawai')
@section('page-title', 'Daftar Pegawai')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold mb-6 text-gray-700">Tambah Pegawai</h1>

    <form action="{{ route('employees.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block text-gray-700">Nama Lengkap</label>
            <input type="text" name="nama_lengkap"
                class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200" required>
        </div>

        <div>
            <label class="block text-gray-700">Email</label>
            <input type="email" name="email"
                class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200" required>
        </div>

        <div>
            <label class="block text-gray-700">Nomor Telepon</label>
            <input type="text" name="nomor_telepon"
                class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200" required>
        </div>

        <div>
            <label class="block text-gray-700">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir"
                class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200" required>
        </div>

        <div>
            <label class="block text-gray-700">Alamat</label>
            <textarea name="alamat" rows="3"
                class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200" required></textarea>
        </div>

        <div>
            <label class="block text-gray-700">Tanggal Masuk</label>
            <input type="date" name="tanggal_masuk"
                class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200" required>
        </div>

        <div>
            <label class="block text-gray-700">Status</label>
            <input type="text" name="status"
                class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200" required>
        </div>

        <div class="flex justify-between">
            <a href="{{ route('employees.index') }}"
                class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600">Kembali</a>
            <button type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection