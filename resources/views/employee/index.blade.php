@extends('layouts.master')

@section('title', 'Daftar Pegawai')
@section('page-title', 'Daftar Pegawai')

@section('content')
<div class="container mx-auto">
    <!-- Judul Halaman -->
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-3xl font-bold text-gray-700">Daftar Pegawai</h1>
        <a href="{{ route('employees.create') }}"
            class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700 transition">
            + Tambah Pegawai
        </a>
    </div>

    <!-- Cek Data -->
    @if($employees->count())
    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full border-collapse">
            <thead class="bg-gradient-to-r from-blue-600 to-blue-500 text-white">
                <tr>
                    <th class="px-4 py-3 text-left">Nama Lengkap</th>
                    <th class="px-4 py-3 text-left">Email</th>
                    <th class="px-4 py-3 text-left">Nomor Telepon</th>
                    <th class="px-4 py-3 text-left">Tanggal Lahir</th>
                    <th class="px-4 py-3 text-left">Alamat</th>
                    <th class="px-4 py-3 text-left">Tanggal Masuk</th>
                    <th class="px-4 py-3 text-left">Status</th>
                    <th class="px-4 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employees as $employee)
                <tr class="border-b hover:bg-gray-50 transition">
                    <td class="px-4 py-2">{{ $employee->nama_lengkap }}</td>
                    <td class="px-4 py-2">{{ $employee->email }}</td>
                    <td class="px-4 py-2">{{ $employee->nomor_telepon }}</td>
                    <td class="px-4 py-2">{{ $employee->tanggal_lahir }}</td>
                    <td class="px-4 py-2">{{ $employee->alamat }}</td>
                    <td class="px-4 py-2">{{ $employee->tanggal_masuk }}</td>
                    <td class="px-4 py-2">
                        <span
                            class="px-2 py-1 text-sm rounded-full {{ $employee->status == 'aktif' ? 'bg-green-100 text-green-600' : 'bg-red-100 text-red-600' }}">
                            {{ ucfirst($employee->status) }}
                        </span>
                    </td>
                    <td class="px-4 py-2 text-center space-x-2">
                        <a href="{{ route('employees.show', $employee->id) }}"
                            class="text-blue-600 hover:text-blue-800 font-medium">Detail</a>
                        <a href="{{ route('employees.edit', $employee->id) }}"
                            class="text-yellow-600 hover:text-yellow-800 font-medium">Edit</a>
                        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST"
                            class="inline-block"
                            onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="text-red-600 hover:text-red-800 font-medium">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $employees->links() }}
    </div>
    @else
    <div class="p-6 bg-yellow-50 border-l-4 border-yellow-400 text-yellow-700 rounded">
        Tidak ada data pegawai.
    </div>
    @endif
</div>
@endsection