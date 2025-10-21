@extends('layouts.master')

@section('title', 'Daftar Departemen')
@section('page-title', 'Daftar Departemen')

@section('content')
<div class="container mx-auto">
    <!-- Judul Halaman -->
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-3xl font-bold text-gray-700">Daftar Departemen</h1>
        <a href="{{ route('departement.create') }}"
            class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700 transition">
            + Tambah Departemen
        </a>
    </div>

    <!-- Cek Data -->
    @if($departments->count())
    <div class="overflow-x-auto bg-white shadow-lg rounded-2xl border border-gray-100">
        <table class="min-w-full divide-y divide-gray-200 text-sm text-gray-700">
            <thead class="bg-gradient-to-r from-blue-600 to-indigo-500 text-white">
                <tr>
                    <th class="px-6 py-3 text-left font-semibold uppercase tracking-wider">Nama Departemen</th>
                    <th class="px-6 py-3 text-left font-semibold uppercase tracking-wider">Deskripsi</th>
                    <th class="px-6 py-3 text-center font-semibold uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-100">
                @foreach($departments as $department)
                <tr class="hover:bg-blue-50 transition-colors duration-150">
                    <td class="px-6 py-3 font-medium text-gray-800">{{ $department->nama_departemen }}</td>
                    <td class="px-6 py-3 text-gray-600">{{ $department->deskripsi ?? '-' }}</td>
                    <td class="px-6 py-3 text-center space-x-3">
                        <a href="{{ route('departement.show', $department->id) }}"
                            class="text-blue-600 hover:text-blue-800 font-semibold transition">Detail</a>
                        <a href="{{ route('departement.edit', $department->id) }}"
                            class="text-yellow-600 hover:text-yellow-800 font-semibold transition">Edit</a>
                        <form action="{{ route('departement.destroy', $department->id) }}" method="POST"
                            class="inline-block"
                            onsubmit="return confirm('Yakin ingin menghapus departemen ini?')">
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
        {{ $departments->links('pagination::tailwind') }}
    </div>
    @else
    <div class="p-6 bg-yellow-50 border-l-4 border-yellow-400 text-yellow-700 rounded-xl shadow-sm">
        Tidak ada data departemen.
    </div>
    @endif
</div>
@endsection