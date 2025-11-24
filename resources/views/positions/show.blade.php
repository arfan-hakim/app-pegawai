@extends('layouts.master')

@section('title', 'Detail Jabatan')
@section('page-title', 'Detail Jabatan')

@section('content')
<div class="max-w-3xl mx-auto bg-white/90 dark:bg-gray-800/90 backdrop-blur-md p-8 rounded-2xl shadow-lg border border-green-200 dark:border-green-700 mt-10">

    <!-- Judul -->
    <h1 class="text-3xl font-bold mb-8 text-center text-green-800 dark:text-green-200">
        🧾 Detail Jabatan
    </h1>

    <!-- Data Jabatan -->
    <div class="overflow-hidden rounded-xl border border-green-100 dark:border-green-700">
        <table class="w-full text-left border-collapse text-gray-700 dark:text-gray-200">
            <tbody>
                <tr class="border-b dark:border-green-800 hover:bg-green-50 dark:hover:bg-green-900/40 transition">
                    <th class="px-6 py-3 w-1/3 bg-green-50 dark:bg-green-900/40 font-semibold">ID</th>
                    <td class="px-6 py-3">{{ $position->id }}</td>
                </tr>

                <tr class="border-b dark:border-green-800 hover:bg-green-50 dark:hover:bg-green-900/40 transition">
                    <th class="px-6 py-3 bg-green-50 dark:bg-green-900/40 font-semibold">Nama Jabatan</th>
                    <td class="px-6 py-3">{{ $position->nama_jabatan }}</td>
                </tr>

                <tr class="border-b dark:border-green-800 hover:bg-green-50 dark:hover:bg-green-900/40 transition">
                    <th class="px-6 py-3 bg-green-50 dark:bg-green-900/40 font-semibold">Gaji Pokok</th>
                    <td class="px-6 py-3 text-green-700 dark:text-green-300 font-medium">
                        Rp {{ number_format($position->gaji_pokok, 0, ',', '.') }}
                    </td>
                </tr>

                <tr class="border-b dark:border-green-800 hover:bg-green-50 dark:hover:bg-green-900/40 transition">
                    <th class="px-6 py-3 bg-green-50 dark:bg-green-900/40 font-semibold">Dibuat Pada</th>
                    <td class="px-6 py-3">{{ $position->created_at->format('d M Y H:i') }}</td>
                </tr>

                <tr class="hover:bg-green-50 dark:hover:bg-green-900/40 transition">
                    <th class="px-6 py-3 bg-green-50 dark:bg-green-900/40 font-semibold">Diperbarui Pada</th>
                    <td class="px-6 py-3">{{ $position->updated_at->format('d M Y H:i') }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Tombol Aksi -->
    <div class="mt-8 flex justify-between">
        <a href="{{ route('positions.index') }}"
            class="bg-green-700 hover:bg-green-800 text-white px-5 py-2 rounded-lg shadow-md transition duration-200">
            ← Kembali
        </a>

        <a href="{{ route('positions.edit', $position->id) }}"
            class="bg-yellow-500 hover:bg-yellow-600 text-white px-5 py-2 rounded-lg shadow-md transition duration-200">
            ✏️ Edit Jabatan
        </a>
    </div>
</div>
@endsection