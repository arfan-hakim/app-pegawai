@extends('layouts.master')

@section('title', 'Detail Data Pegawai')
@section('page-title', 'Detail Data Pegawai')

@section('content')
<div class="max-w-3xl mx-auto bg-white/90 dark:bg-gray-800/90 backdrop-blur-md p-8 rounded-2xl shadow-xl border border-green-200 dark:border-green-700 transition-all">

    <!-- Tabel Detail -->
    <div class="overflow-hidden rounded-lg border border-green-200 dark:border-green-700">
        <table class="w-full text-left border-collapse">
            <tbody class="divide-y divide-green-100 dark:divide-green-700">
                <tr class="hover:bg-green-50 dark:hover:bg-green-900/30 transition">
                    <th class="px-5 py-3 w-1/3 bg-green-50 dark:bg-green-900/40 font-semibold text-green-800 dark:text-green-200">Nama Lengkap</th>
                    <td class="px-5 py-3 text-gray-800 dark:text-gray-100">{{ $employee->nama_lengkap }}</td>
                </tr>
                <tr class="hover:bg-green-50 dark:hover:bg-green-900/30 transition">
                    <th class="px-5 py-3 bg-green-50 dark:bg-green-900/40 font-semibold text-green-800 dark:text-green-200">Email</th>
                    <td class="px-5 py-3 text-gray-800 dark:text-gray-100">{{ $employee->email }}</td>
                </tr>
                <tr class="hover:bg-green-50 dark:hover:bg-green-900/30 transition">
                    <th class="px-5 py-3 bg-green-50 dark:bg-green-900/40 font-semibold text-green-800 dark:text-green-200">Nomor Telepon</th>
                    <td class="px-5 py-3 text-gray-800 dark:text-gray-100">{{ $employee->nomor_telepon }}</td>
                </tr>
                <tr class="hover:bg-green-50 dark:hover:bg-green-900/30 transition">
                    <th class="px-5 py-3 bg-green-50 dark:bg-green-900/40 font-semibold text-green-800 dark:text-green-200">Tanggal Lahir</th>
                    <td class="px-5 py-3 text-gray-800 dark:text-gray-100">{{ $employee->tanggal_lahir }}</td>
                </tr>
                <tr class="hover:bg-green-50 dark:hover:bg-green-900/30 transition">
                    <th class="px-5 py-3 bg-green-50 dark:bg-green-900/40 font-semibold text-green-800 dark:text-green-200">Alamat</th>
                    <td class="px-5 py-3 text-gray-800 dark:text-gray-100">{{ $employee->alamat }}</td>
                </tr>
                <tr class="hover:bg-green-50 dark:hover:bg-green-900/30 transition">
                    <th class="px-5 py-3 bg-green-50 dark:bg-green-900/40 font-semibold text-green-800 dark:text-green-200">Departemen</th>
                    <td class="px-5 py-3 text-gray-800 dark:text-gray-100">
                        {{ $employee->departement ? $employee->departement->nama_departement : '-' }}
                    </td>
                </tr>
                <tr class="hover:bg-green-50 dark:hover:bg-green-900/30 transition">
                    <th class="px-5 py-3 bg-green-50 dark:bg-green-900/40 font-semibold text-green-800 dark:text-green-200">Jabatan</th>
                    <td class="px-5 py-3 text-gray-800 dark:text-gray-100">
                        {{ $employee->position ? $employee->position->nama_jabatan : '-' }}
                    </td>
                </tr>
                <tr class="hover:bg-green-50 dark:hover:bg-green-900/30 transition">
                    <th class="px-5 py-3 bg-green-50 dark:bg-green-900/40 font-semibold text-green-800 dark:text-green-200">Tanggal Masuk</th>
                    <td class="px-5 py-3 text-gray-800 dark:text-gray-100">{{ $employee->tanggal_masuk }}</td>
                </tr>
                <tr>
                    <th class="px-5 py-3 bg-green-50 dark:bg-green-900/40 font-semibold text-green-800 dark:text-green-200">Status</th>
                    <td class="px-5 py-3">
                        <span class="px-3 py-1 rounded-full text-sm font-medium
                            {{ $employee->status === 'aktif' 
                                ? 'bg-green-100 text-green-700 dark:bg-green-800 dark:text-green-200' 
                                : 'bg-gray-200 text-gray-700 dark:bg-gray-700 dark:text-gray-300' }}">
                            {{ ucfirst($employee->status) }}
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Tombol Kembali -->
    <div class="mt-8 text-center">
        <a href="{{ route('employees.index') }}"
            class="inline-block bg-green-700 hover:bg-green-800 text-white px-6 py-2 rounded-lg shadow transition">
            ← Kembali ke Daftar Pegawai
        </a>
    </div>
</div>
@endsection