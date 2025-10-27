@extends('layouts.master')

@section('title', 'Detail Pegawai')
@section('page-title', 'Detail Pegawai')

@section('content')
<div class="max-w-3xl mx-auto bg-white p-8 rounded-2xl shadow-lg border border-gray-100">
    <h1 class="text-3xl font-bold mb-6 text-gray-700 text-center">Detail Pegawai</h1>

    <div class="overflow-hidden rounded-lg border border-gray-200">
        <table class="w-full text-left border-collapse">
            <tbody>
                <tr class="border-b hover:bg-gray-50">
                    <th class="px-5 py-3 w-1/3 bg-gray-100 font-semibold text-gray-700">Nama Lengkap</th>
                    <td class="px-5 py-3">{{ $employee->nama_lengkap }}</td>
                </tr>
                <tr class="border-b hover:bg-gray-50">
                    <th class="px-5 py-3 bg-gray-100 font-semibold text-gray-700">Email</th>
                    <td class="px-5 py-3">{{ $employee->email }}</td>
                </tr>
                <tr class="border-b hover:bg-gray-50">
                    <th class="px-5 py-3 bg-gray-100 font-semibold text-gray-700">Nomor Telepon</th>
                    <td class="px-5 py-3">{{ $employee->nomor_telepon }}</td>
                </tr>
                <tr class="border-b hover:bg-gray-50">
                    <th class="px-5 py-3 bg-gray-100 font-semibold text-gray-700">Tanggal Lahir</th>
                    <td class="px-5 py-3">{{ $employee->tanggal_lahir }}</td>
                </tr>
                <tr class="border-b hover:bg-gray-50">
                    <th class="px-5 py-3 bg-gray-100 font-semibold text-gray-700">Alamat</th>
                    <td class="px-5 py-3">{{ $employee->alamat }}</td>
                </tr>
                <tr class="border-b hover:bg-gray-50">
                    <th class="px-5 py-3 bg-gray-100 font-semibold text-gray-700">Departemen</th>
                    <td class="px-5 py-3">{{ $employee->departement ? $employee->departement->nama_departement : '-' }}</td>
                </tr>
                <tr class="border-b hover:bg-gray-50">
                    <th class="px-5 py-3 bg-gray-100 font-semibold text-gray-700">Jabatan</th>
                    <td class="px-5 py-3">{{ $employee->position ? $employee->position->nama_jabatan : '-' }}</td>
                </tr>
                <tr class="border-b hover:bg-gray-50">
                    <th class="px-5 py-3 bg-gray-100 font-semibold text-gray-700">Tanggal Masuk</th>
                    <td class="px-5 py-3">{{ $employee->tanggal_masuk }}</td>
                </tr>
                <tr>
                    <th class="px-5 py-3 bg-gray-100 font-semibold text-gray-700">Status</th>
                    <td class="px-5 py-3">
                        <span class="px-3 py-1 rounded-full text-sm 
                            {{ $employee->status === 'aktif' ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-600' }}">
                            {{ ucfirst($employee->status) }}
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="mt-8 text-center">
        <a href="{{ route('employees.index') }}"
            class="inline-block bg-blue-600 text-white px-6 py-2 rounded-lg shadow hover:bg-blue-700 transition">
            ← Kembali ke Daftar Pegawai
        </a>
    </div>
</div>
@endsection