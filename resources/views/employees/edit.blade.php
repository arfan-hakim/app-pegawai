@extends('layouts.master')

@section('title', 'Edit Data Pegawai')
@section('page-title', 'Edit Data Pegawai')

@section('content')
<div class="max-w-3xl mx-auto bg-white/90 dark:bg-gray-800/90 backdrop-blur-md p-8 rounded-2xl shadow-xl border border-green-200 dark:border-green-700 transition-all">

    <!-- Notifikasi Error -->
    @if ($errors->any())
    <div class="mb-6 p-4 bg-red-50 dark:bg-red-900/40 border-l-4 border-red-500 text-red-700 dark:text-red-300 rounded-lg">
        <strong>Terjadi kesalahan:</strong>
        <ul class="list-disc ml-5 mt-2 space-y-1">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- Notifikasi Sukses -->
    @if (session('success'))
    <div class="mb-6 p-4 bg-green-50 dark:bg-green-900/40 border-l-4 border-green-500 text-green-700 dark:text-green-300 rounded-lg">
        {{ session('success') }}
    </div>
    @endif

    <!-- Form -->
    <form action="{{ route('employees.update', $employee->id) }}" method="POST" class="space-y-5">
        @csrf
        @method('PUT')

        <!-- Nama Lengkap -->
        <div>
            <label class="block text-green-800 dark:text-green-200 font-semibold mb-1">Nama Lengkap</label>
            <input type="text" name="nama_lengkap"
                class="w-full border-green-300 dark:border-green-700 bg-white/90 dark:bg-gray-900 text-gray-800 dark:text-gray-100 rounded-lg shadow-sm focus:ring-2 focus:ring-green-500 focus:border-green-500"
                value="{{ old('nama_lengkap', $employee->nama_lengkap) }}" required>
        </div>

        <!-- Email -->
        <div>
            <label class="block text-green-800 dark:text-green-200 font-semibold mb-1">Email</label>
            <input type="email" name="email"
                class="w-full border-green-300 dark:border-green-700 bg-white/90 dark:bg-gray-900 text-gray-800 dark:text-gray-100 rounded-lg shadow-sm focus:ring-2 focus:ring-green-500 focus:border-green-500"
                value="{{ old('email', $employee->email) }}" required>
        </div>

        <!-- Nomor Telepon -->
        <div>
            <label class="block text-green-800 dark:text-green-200 font-semibold mb-1">Nomor Telepon</label>
            <input type="text" name="nomor_telepon"
                class="w-full border-green-300 dark:border-green-700 bg-white/90 dark:bg-gray-900 text-gray-800 dark:text-gray-100 rounded-lg shadow-sm focus:ring-2 focus:ring-green-500 focus:border-green-500"
                value="{{ old('nomor_telepon', $employee->nomor_telepon) }}" required>
        </div>

        <!-- Tanggal Lahir -->
        <div>
            <label class="block text-green-800 dark:text-green-200 font-semibold mb-1">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir"
                class="w-full border-green-300 dark:border-green-700 bg-white/90 dark:bg-gray-900 text-gray-800 dark:text-gray-100 rounded-lg shadow-sm focus:ring-2 focus:ring-green-500 focus:border-green-500"
                value="{{ old('tanggal_lahir', $employee->tanggal_lahir) }}" required>
        </div>

        <!-- Alamat -->
        <div>
            <label class="block text-green-800 dark:text-green-200 font-semibold mb-1">Alamat</label>
            <textarea name="alamat" rows="3"
                class="w-full border-green-300 dark:border-green-700 bg-white/90 dark:bg-gray-900 text-gray-800 dark:text-gray-100 rounded-lg shadow-sm focus:ring-2 focus:ring-green-500 focus:border-green-500"
                required>{{ old('alamat', $employee->alamat) }}</textarea>
        </div>

        <!-- Tanggal Masuk -->
        <div>
            <label class="block text-green-800 dark:text-green-200 font-semibold mb-1">Tanggal Masuk</label>
            <input type="date" name="tanggal_masuk"
                class="w-full border-green-300 dark:border-green-700 bg-white/90 dark:bg-gray-900 text-gray-800 dark:text-gray-100 rounded-lg shadow-sm focus:ring-2 focus:ring-green-500 focus:border-green-500"
                value="{{ old('tanggal_masuk', $employee->tanggal_masuk) }}" required>
        </div>

        <!-- Departemen -->
        <div>
            <label class="block text-green-800 dark:text-green-200 font-semibold mb-1">Departemen</label>
            <select name="departement_id"
                class="w-full border-green-300 dark:border-green-700 bg-white/90 dark:bg-gray-900 text-gray-800 dark:text-gray-100 rounded-lg shadow-sm focus:ring-2 focus:ring-green-500 focus:border-green-500"
                required>
                <option value="">-- Pilih Departemen --</option>
                @foreach ($departement as $d)
                <option value="{{ $d->id }}" {{ old('departement_id', $employee->departement_id) == $d->id ? 'selected' : '' }}>
                    {{ $d->nama_departement }}
                </option>
                @endforeach
            </select>
        </div>

        <!-- Jabatan -->
        <div>
            <label class="block text-green-800 dark:text-green-200 font-semibold mb-1">Jabatan</label>
            <select name="jabatan_id"
                class="w-full border-green-300 dark:border-green-700 bg-white/90 dark:bg-gray-900 text-gray-800 dark:text-gray-100 rounded-lg shadow-sm focus:ring-2 focus:ring-green-500 focus:border-green-500"
                required>
                <option value="">-- Pilih Jabatan --</option>
                @foreach ($jabatan as $j)
                <option value="{{ $j->id }}" {{ old('jabatan_id', $employee->jabatan_id) == $j->id ? 'selected' : '' }}>
                    {{ $j->nama_jabatan }}
                </option>
                @endforeach
            </select>
        </div>

        <!-- Status -->
        <div>
            <label class="block text-green-800 dark:text-green-200 font-semibold mb-1">Status</label>
            <select name="status"
                class="w-full border-green-300 dark:border-green-700 bg-white/90 dark:bg-gray-900 text-gray-800 dark:text-gray-100 rounded-lg shadow-sm focus:ring-2 focus:ring-green-500 focus:border-green-500"
                required>
                <option value="">-- Pilih Status --</option>
                <option value="aktif" {{ old('status', $employee->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="nonaktif" {{ old('status', $employee->status) == 'nonaktif' ? 'selected' : '' }}>Tidak Aktif</option>
            </select>
        </div>

        <!-- Tombol -->
        <div class="flex justify-between items-center pt-6">
            <a href="{{ route('employees.index') }}"
                class="bg-gray-600 hover:bg-gray-700 text-white px-5 py-2 rounded-lg shadow transition">
                ← Kembali
            </a>
            <button type="submit"
                class="bg-green-700 hover:bg-green-800 text-white px-6 py-2 rounded-lg shadow transition">
                💾 Perbarui Data
            </button>
        </div>
    </form>
</div>
@endsection