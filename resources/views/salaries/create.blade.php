@extends('layouts.master')

@section('title', 'Tambah Gaji')
@section('page-title', 'Tambah Data Gaji')

@section('content')
<div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md">
    <h1 class="text-xl font-bold text-gray-700 mb-6">Form Tambah Data Gaji</h1>

    <form action="{{ route('salaries.store') }}" method="POST" id="salaryForm">
        @csrf

        <div class="mb-4">
            <label class="block text-gray-700">Nama Karyawan</label>
            <select name="karyawan_id" id="karyawan" class="w-full border-gray-300 rounded-lg mt-1">
                <option value="">-- Pilih Karyawan --</option>
                @foreach($employees as $employee)
                <option value="{{ $employee->id }}" data-gaji="{{ $employee->position->gaji_pokok ?? 0 }}">
                    {{ $employee->nama_lengkap }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Bulan</label>
            <input type="month" name="bulan" class="w-full border-gray-300 rounded-lg mt-1">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Gaji Pokok</label>
            <input type="number" name="gaji_pokok" id="gaji_pokok" class="w-full border-gray-300 rounded-lg mt-1" readonly>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Tunjangan</label>
            <input type="number" name="tunjangan" class="w-full border-gray-300 rounded-lg mt-1">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Potongan</label>
            <input type="number" name="potongan" class="w-full border-gray-300 rounded-lg mt-1">
        </div>

        <div class="flex justify-end space-x-2">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">Simpan</button>
            <a href="{{ route('salaries.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg">Kembali</a>
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