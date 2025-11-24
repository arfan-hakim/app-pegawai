@extends('layouts.master')

@section('title', 'Tambah Pegawai')
@section('page-title', 'Tambah Pegawai')

@section('content')
<div class="max-w-4xl mx-auto bg-white/90 dark:bg-gray-800/90 backdrop-blur-md p-8 rounded-2xl shadow-xl border border-green-200 dark:border-green-700 mt-10">

    <!-- Notifikasi Error -->
    @if ($errors->any())
    <div class="mb-6 p-4 bg-red-100/80 border-l-4 border-red-600 text-red-700 dark:bg-red-900/50 dark:text-red-200 rounded-lg">
        <strong>⚠️ Terjadi kesalahan:</strong>
        <ul class="list-disc ml-5 mt-2 space-y-1">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- Notifikasi Sukses -->
    @if (session('success'))
    <div class="mb-6 p-4 bg-green-100 border-l-4 border-green-600 text-green-800 dark:bg-green-900/60 dark:text-green-100 rounded-lg shadow-sm">
        ✅ {{ session('success') }}
    </div>
    @endif

    <h1 class="text-3xl font-bold text-green-800 dark:text-green-200 mb-8 text-center">🧍 Tambah Data Pegawai</h1>

    <!-- Form -->
    <form action="{{ route('employees.store') }}" method="POST" class="space-y-5">
        @csrf

        <!-- Nama Lengkap -->
        <div>
            <label for="nama_lengkap" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Nama Lengkap</label>
            <input type="text" name="nama_lengkap" id="nama_lengkap"
                class="w-full border border-green-300 dark:border-green-700 rounded-lg shadow-sm focus:ring-2 focus:ring-green-500 focus:border-green-500 transition bg-white dark:bg-gray-900/70 text-gray-900 dark:text-gray-100"
                value="{{ old('nama_lengkap') }}" required>
        </div>

        <!-- Email -->
        <div>
            <label for="email" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Email</label>
            <input type="email" name="email" id="email"
                class="w-full border border-green-300 dark:border-green-700 rounded-lg shadow-sm focus:ring-2 focus:ring-green-500 focus:border-green-500 transition bg-white dark:bg-gray-900/70 text-gray-900 dark:text-gray-100"
                value="{{ old('email') }}" required>
        </div>

        <!-- Nomor Telepon -->
        <div>
            <label for="nomor_telepon" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Nomor Telepon</label>
            <input type="text" name="nomor_telepon" id="nomor_telepon"
                class="w-full border border-green-300 dark:border-green-700 rounded-lg shadow-sm focus:ring-2 focus:ring-green-500 focus:border-green-500 transition bg-white dark:bg-gray-900/70 text-gray-900 dark:text-gray-100"
                value="{{ old('nomor_telepon') }}" required>
        </div>

        <!-- Tanggal Lahir -->
        <div>
            <label for="tanggal_lahir" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                class="w-full border border-green-300 dark:border-green-700 rounded-lg shadow-sm focus:ring-2 focus:ring-green-500 focus:border-green-500 transition bg-white dark:bg-gray-900/70 text-gray-900 dark:text-gray-100"
                value="{{ old('tanggal_lahir') }}" required>
        </div>

        <!-- Alamat -->
        <div>
            <label for="alamat" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Alamat</label>
            <textarea name="alamat" id="alamat" rows="3"
                class="w-full border border-green-300 dark:border-green-700 rounded-lg shadow-sm focus:ring-2 focus:ring-green-500 focus:border-green-500 transition bg-white dark:bg-gray-900/70 text-gray-900 dark:text-gray-100"
                required>{{ old('alamat') }}</textarea>
        </div>

        <!-- Tanggal Masuk -->
        <div>
            <label for="tanggal_masuk" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Tanggal Masuk</label>
            <input type="date" name="tanggal_masuk" id="tanggal_masuk"
                class="w-full border border-green-300 dark:border-green-700 rounded-lg shadow-sm focus:ring-2 focus:ring-green-500 focus:border-green-500 transition bg-white dark:bg-gray-900/70 text-gray-900 dark:text-gray-100"
                value="{{ old('tanggal_masuk') }}" required>
        </div>

        <!-- Departemen -->
        <div>
            <label for="departement_id" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Departemen</label>
            <select name="departement_id" id="departement_id"
                class="w-full border border-green-300 dark:border-green-700 rounded-lg shadow-sm focus:ring-2 focus:ring-green-500 focus:border-green-500 transition bg-white dark:bg-gray-900/70 text-gray-900 dark:text-gray-100"
                required>
                <option value="">-- Pilih Departemen --</option>
                @foreach ($departemen as $d)
                <option value="{{ $d->id }}" {{ old('departement_id') == $d->id ? 'selected' : '' }}>
                    {{ $d->nama_departement }}
                </option>
                @endforeach
            </select>
        </div>

        <!-- Jabatan -->
        <div>
            <label for="jabatan_id" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Jabatan</label>
            <select name="jabatan_id" id="jabatan_id"
                class="w-full border border-green-300 dark:border-green-700 rounded-lg shadow-sm focus:ring-2 focus:ring-green-500 focus:border-green-500 transition bg-white dark:bg-gray-900/70 text-gray-900 dark:text-gray-100"
                required>
                <option value="">-- Pilih Jabatan --</option>
                @foreach ($jabatan as $j)
                <option value="{{ $j->id }}" {{ old('jabatan_id') == $j->id ? 'selected' : '' }}>
                    {{ $j->nama_jabatan }}
                </option>
                @endforeach
            </select>
        </div>

        <!-- Status -->
        <div>
            <label for="status" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Status</label>
            <select name="status" id="status"
                class="w-full border border-green-300 dark:border-green-700 rounded-lg shadow-sm focus:ring-2 focus:ring-green-500 focus:border-green-500 transition bg-white dark:bg-gray-900/70 text-gray-900 dark:text-gray-100"
                required>
                <option value="">-- Pilih Status --</option>
                <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="nonaktif" {{ old('status') == 'nonaktif' ? 'selected' : '' }}>Tidak Aktif</option>
            </select>
        </div>

        <!-- Tombol -->
        <div class="flex justify-end gap-3 pt-6">
            <a href="{{ route('employees.index') }}"
                class="px-5 py-2 rounded-lg bg-gray-500 hover:bg-gray-600 text-white shadow transition duration-200 flex items-center gap-1">
                ⬅️ Kembali
            </a>
            <button type="submit"
                class="px-6 py-2 rounded-lg bg-green-700 hover:bg-green-800 text-white shadow-md transition duration-200 flex items-center gap-1">
                💾 Simpan Data
            </button>
        </div>
    </form>
</div>
@endsection