@extends('layouts.master')

@section('title', 'Daftar Pegawai')
@section('page-title', 'Daftar Pegawai')

@section('content')
<div class="container mx-auto">
    <!-- Header -->
    <div class="flex items-center justify-between mb-6">
        <a href="{{ route('employees.create') }}"
            class="bg-emerald-600 text-white px-5 py-2 rounded-lg shadow hover:bg-emerald-700 transition-all duration-200">
            + Tambah Pegawai
        </a>
    </div>

    <!-- Tabel Data -->
    @if($employees->count())
    <div
        class="overflow-x-auto bg-white dark:bg-gray-800 shadow-xl rounded-2xl border border-emerald-200 dark:border-gray-700">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 text-sm">
            <thead class="bg-emerald-700 text-white dark:bg-emerald-800">
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

            <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                @foreach($employees as $employee)
                <tr
                    class="hover:bg-emerald-50 dark:hover:bg-gray-700 transition-colors duration-150 text-gray-700 dark:text-gray-300">
                    <td class="px-6 py-3 font-medium">{{ $employee->nama_lengkap }}</td>
                    <td class="px-6 py-3">{{ $employee->email }}</td>
                    <td class="px-6 py-3">{{ $employee->nomor_telepon }}</td>
                    <td class="px-6 py-3">
                        {{ $employee->departement ? $employee->departement->nama_departement : '-' }}
                    </td>
                    <td class="px-6 py-3">
                        {{ $employee->position ? $employee->position->nama_jabatan : '-' }}
                    </td>
                    <td class="px-6 py-3 text-center">
                        <span
                            class="px-3 py-1 rounded-full text-sm font-semibold
                            {{ $employee->status === 'aktif'
                                ? 'bg-emerald-100 text-emerald-700 dark:bg-emerald-900 dark:text-emerald-300'
                                : 'bg-gray-200 text-gray-700 dark:bg-gray-700 dark:text-gray-400' }}">
                            {{ ucfirst($employee->status) }}
                        </span>
                    </td>

                    <td class="px-6 py-3 text-center space-x-3">
                        <!-- Tombol Detail -->
                        <a href="{{ route('employees.show', $employee->id) }}"
                            class="text-emerald-600 dark:text-emerald-400 hover:underline font-semibold transition">
                            Detail
                        </a>

                        <!-- Tombol Edit -->
                        <a href="{{ route('employees.edit', $employee->id) }}"
                            class="text-blue-600 dark:text-blue-400 hover:underline font-semibold transition">
                            Edit
                        </a>

                        <!-- Tombol Hapus -->
                        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="inline"
                            onsubmit="return confirm('Yakin ingin menghapus data pegawai ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="text-red-600 dark:text-red-400 hover:underline font-semibold transition">
                                Hapus
                            </button>
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
    <div
        class="p-6 bg-yellow-50 dark:bg-yellow-900/40 border-l-4 border-yellow-400 text-yellow-700 dark:text-yellow-300 rounded-xl shadow-sm text-center font-semibold">
        Data pegawai belum tersedia.
    </div>
    @endif
</div>
@endsection