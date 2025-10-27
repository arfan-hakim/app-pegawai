@extends('layouts.master')

@section('title', 'Data Gaji')
@section('page-title', 'Data Gaji Karyawan')

@section('content')
<div class="max-w-6xl mx-auto bg-white p-6 rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-700">Data Gaji Pegawai</h1>

        <div class="flex gap-3">
            <!-- Tombol Tambah Gaji -->
            <a href="{{ route('salaries.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow transition">
                + Tambah Gaji
            </a>

            <form action="{{ route('salaries.reset') }}" method="POST" onsubmit="return confirm('Yakin ingin hapus semua data gaji?')">
                @csrf
                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg shadow">
                    Hapus Semua Data
                </button>
            </form>
        </div>
    </div>

    <table class="min-w-full bg-white border border-gray-200 rounded-lg">
        <thead>
            <tr class="bg-blue-600 text-white text-left">
                <th class="py-3 px-4">Nama Karyawan</th>
                <th class="py-3 px-4">Bulan</th>
                <th class="py-3 px-4">Gaji Pokok</th>
                <th class="py-3 px-4">Tunjangan</th>
                <th class="py-3 px-4">Potongan</th>
                <th class="py-3 px-4">Total Gaji</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($salaries as $salary)
            <tr class="border-t hover:bg-gray-50">
                <td class="py-2 px-4">{{ $salary->employee->nama_lengkap }}</td>
                <td class="py-2 px-4">{{ $salary->bulan }}</td>
                <td class="py-2 px-4">Rp {{ number_format($salary->gaji_pokok, 0, ',', '.') }}</td>
                <td class="py-2 px-4">Rp {{ number_format($salary->tunjangan, 0, ',', '.') }}</td>
                <td class="py-2 px-4">Rp {{ number_format($salary->potongan, 0, ',', '.') }}</td>
                <td class="py-2 px-4 font-semibold text-green-600">Rp {{ number_format($salary->total_gaji, 0, ',', '.') }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center py-4 text-gray-500">Belum ada data gaji</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection