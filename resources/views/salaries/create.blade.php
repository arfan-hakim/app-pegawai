@extends('layouts.master')

@section('title', 'Tambah Gaji')
@section('page-title', 'Tambah Data Gaji')

@section('content')
<div class="max-w-3xl mx-auto bg-white/90 dark:bg-gray-800/90 backdrop-blur-md p-8 rounded-2xl shadow-lg border border-green-200 dark:border-green-700 mt-10">
    <h1 class="text-3xl font-bold text-green-800 dark:text-green-200 mb-8 flex items-center gap-2">
        🧾 Form Tambah Data Gaji
    </h1>

    <form action="{{ route('salaries.store') }}" method="POST" id="salaryForm" class="space-y-5">
        @csrf

        <!-- Nama Karyawan -->
        <div>
            <label for="karyawan" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Nama Karyawan</label>
            <select name="karyawan_id" id="karyawan"
                class="w-full border border-green-300 dark:border-green-700 rounded-lg shadow-sm focus:ring-2 focus:ring-green-500 focus:border-green-500 transition bg-white dark:bg-gray-900/70 text-gray-800 dark:text-gray-100">
                <option value="">-- Pilih Karyawan --</option>
                @foreach($employees as $employee)
                <option value="{{ $employee->id }}" data-gaji="{{ $employee->position->gaji_pokok ?? 0 }}">
                    {{ $employee->nama_lengkap }}
                </option>
                @endforeach
            </select>
        </div>

        <!-- Bulan -->
        <div>
            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Bulan</label>
            <input type="month" name="bulan"
                class="w-full border border-green-300 dark:border-green-700 rounded-lg shadow-sm focus:ring-2 focus:ring-green-500 focus:border-green-500 transition bg-white dark:bg-gray-900/70 text-gray-800 dark:text-gray-100">
        </div>

        <!-- Gaji Pokok -->
        <div>
            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Gaji Pokok</label>
            <input type="number" name="gaji_pokok" id="gaji_pokok" readonly
                class="w-full border border-green-300 dark:border-green-700 rounded-lg shadow-sm bg-gray-100 dark:bg-gray-700 cursor-not-allowed text-gray-700 dark:text-gray-300">
        </div>

        <!-- Tunjangan -->
        <div>
            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Tunjangan</label>
            <input type="number" name="tunjangan"
                class="w-full border border-green-300 dark:border-green-700 rounded-lg shadow-sm focus:ring-2 focus:ring-green-500 focus:border-green-500 transition bg-white dark:bg-gray-900/70 text-gray-800 dark:text-gray-100">
        </div>

        <!-- Potongan -->
        <div>
            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Potongan</label>
            <input type="number" name="potongan"
                class="w-full border border-green-300 dark:border-green-700 rounded-lg shadow-sm focus:ring-2 focus:ring-green-500 focus:border-green-500 transition bg-white dark:bg-gray-900/70 text-gray-800 dark:text-gray-100">
        </div>

        <!-- Tombol Aksi -->
        <div class="flex justify-end gap-3 pt-4">
            <a href="{{ route('salaries.index') }}"
                class="px-5 py-2 rounded-lg bg-gray-500 hover:bg-gray-600 text-white shadow transition duration-200 flex items-center gap-1">
                ⬅️ Kembali
            </a>
            <button type="submit"
                class="px-5 py-2 rounded-lg bg-green-700 hover:bg-green-800 text-white shadow-md transition duration-200 flex items-center gap-1">
                💾 Simpan
            </button>
        </div>
    </form>
</div>

<script>
    document.getElementById('karyawan').addEventListener('change', function() {
        const gajiPokok = this.options[this.selectedIndex].getAttribute('data-gaji');
        document.getElementById('gaji_pokok').value = gajiPokok || 0;
    });
</script>
@endsection