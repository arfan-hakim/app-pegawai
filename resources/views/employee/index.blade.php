@extends('layouts.master')

@section('title', 'Daftar Pegawai')
@section('page-title', 'Daftar Pegawai')

@section('content')
<div class="container mx-auto">
    <!-- Header -->
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-3xl font-bold text-gray-700">Daftar Pegawai</h1>
        <a href="{{ route('employees.create') }}"
            class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700 transition">
            + Tambah Pegawai
        </a>
    </div>

    <!-- Tabel Data -->
    @if($employees->count())
    <div class="overflow-x-auto bg-white shadow-lg rounded-2xl border border-gray-100">
        <table class="min-w-full divide-y divide-gray-200 text-sm text-gray-700">
            <thead class="bg-gradient-to-r from-blue-600 to-indigo-500 text-white">
                <tr>
                    <th class="px-6 py-3 text-left font-semibold uppercase tracking-wider">Nama Lengkap</th>
                    <th class="px-6 py-3 text-left font-semibold uppercase tracking-wider">Email</th>
                    <th class="px-6 py-3 text-left font-semibold uppercase tracking-wider">Nomor Telepon</th>
                    <th class="px-6 py-3 text-left font-semibold uppercase tracking-wider">Departemen</th>
                    <th class="px-6 py-3 text-left font-semibold uppercase tracking-wider">Jabatan</th>
                    <th class="px-6 py-3 text-center font-semibold uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-center font-semibold uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach($employees as $employee)
                <tr class="hover:bg-blue-50 transition-colors duration-150">
                    <td class="px-6 py-3 font-medium text-gray-800">{{ $employee->nama_lengkap }}</td>
                    <td class="px-6 py-3">{{ $employee->email }}</td>
                    <td class="px-6 py-3">{{ $employee->nomor_telepon }}</td>
                    <td class="px-6 py-3">
                        {{ $employee->departement ? $employee->departement->nama_departemen : '-' }}
                    </td>
                    <td class="px-6 py-3">
                        {{ $employee->position ? $employee->position->nama_jabatan : '-' }}
                    </td>
                    <td class="px-6 py-3 text-center">
                        <span class="px-3 py-1 rounded-full text-sm
                            {{ $employee->status === 'aktif' ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-600' }}">
                            {{ ucfirst($employee->status) }}
                        </span>
                    </td>
                    <td class="px-6 py-3 text-center space-x-3">
                        <!-- Tombol Edit -->
                        <a href="{{ route('employees.edit', $employee->id) }}"
                            class="text-blue-600 hover:text-blue-800 font-semibold transition">Edit</a>

                        <!-- Tombol Hapus -->
                        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="inline"
                            onsubmit="return confirm('Yakin ingin menghapus data pegawai ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="text-red-600 hover:text-red-800 font-semibold transition">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6 flex justify-center">
        {{ $employees->links('pagination::tailwind') }}
    </div>
    @else
    <div class="p-6 bg-yellow-50 border-l-4 border-yellow-400 text-yellow-700 rounded-xl shadow-sm">
        Tidak ada data pegawai.
    </div>
    @endif
</div>
@endsection