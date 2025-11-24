@extends('layouts.master')

@section('title', 'Data Gaji')
@section('page-title', '💰 Data Gaji Pegawai')

@section('content')
<div class="max-w-6xl mx-auto bg-white/90 dark:bg-gray-800/90 backdrop-blur-md p-8 rounded-2xl shadow-lg border border-green-200 dark:border-green-700 mt-10">

    <!-- Header -->
    <div class="flex justify-between items-center mb-8">

        <div class="flex gap-3">
            <!-- Tombol Tambah Gaji -->
            <a href="{{ route('salaries.create') }}"
                class="bg-green-700 hover:bg-green-800 text-white px-5 py-2 rounded-lg shadow-md transition duration-200 flex items-center gap-1">
                ➕ Tambah Gaji
            </a>

            <!-- Tombol Hapus Semua Data -->
            <form action="{{ route('salaries.reset') }}" method="POST"
                onsubmit="return confirm('⚠️ Yakin ingin menghapus semua data gaji?')">
                @csrf
                <button type="submit"
                    class="bg-red-600 hover:bg-red-700 text-white px-5 py-2 rounded-lg shadow-md transition duration-200 flex items-center gap-1">
                    🗑️ Hapus Semua
                </button>
            </form>
        </div>
    </div>

    <!-- Tabel Data -->
    <div class="overflow-x-auto rounded-xl border border-green-100 dark:border-green-700">
        <table class="min-w-full text-left border-collapse">
            <thead>
                <tr class="bg-gradient-to-r from-green-700 to-emerald-600 text-white">
                    <th class="py-3 px-5 font-semibold">Nama Karyawan</th>
                    <th class="py-3 px-5 font-semibold">Bulan</th>
                    <th class="py-3 px-5 font-semibold">Gaji Pokok</th>
                    <th class="py-3 px-5 font-semibold">Tunjangan</th>
                    <th class="py-3 px-5 font-semibold">Potongan</th>
                    <th class="py-3 px-5 font-semibold">Total Gaji</th>
                </tr>
            </thead>
            <tbody class="text-gray-700 dark:text-gray-200">
                @forelse ($salaries as $salary)
                <tr class="border-t dark:border-green-800 hover:bg-green-50 dark:hover:bg-green-900/40 transition">
                    <td class="py-3 px-5">{{ $salary->employee->nama_lengkap }}</td>
                    <td class="py-3 px-5">{{ $salary->bulan }}</td>
                    <td class="py-3 px-5">Rp {{ number_format($salary->gaji_pokok, 0, ',', '.') }}</td>
                    <td class="py-3 px-5">Rp {{ number_format($salary->tunjangan, 0, ',', '.') }}</td>
                    <td class="py-3 px-5">Rp {{ number_format($salary->potongan, 0, ',', '.') }}</td>
                    <td class="py-3 px-5 font-semibold text-green-700 dark:text-green-300">
                        Rp {{ number_format($salary->total_gaji, 0, ',', '.') }}
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-6 text-gray-500 dark:text-gray-400">
                        Tidak ada data gaji tersedia 📄
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection