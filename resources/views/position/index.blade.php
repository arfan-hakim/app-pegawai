@extends('layouts.master')

@section('title', 'Daftar Jabatan')
@section('page-title', 'Daftar Jabatan')

@section('content')

<div class="container mx-auto"> <!-- Judul Halaman -->
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-3xl font-bold text-gray-700">Daftar Jabatan</h1> <a href="{{ route('positions.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700 transition"> + Tambah Jabatan </a>
    </div>
    <!-- Cek Data -->
    @if($positions->count())
    <div class="overflow-x-auto bg-white shadow-lg rounded-2xl border border-gray-100">
        <table class="min-w-full divide-y divide-gray-200 text-sm text-gray-700">
            <thead class="bg-gradient-to-r from-blue-600 to-indigo-500 text-white">
                <tr>
                    <th class="px-6 py-3 text-left font-semibold uppercase tracking-wider">Nama Jabatan</th>
                    <th class="px-6 py-3 text-left font-semibold uppercase tracking-wider">Gaji Pokok</th>
                    <th class="px-6 py-3 text-center font-semibold uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-100">
                @foreach($positions as $position)
                <tr class="hover:bg-blue-50 transition-colors duration-150">
                    <td class="px-6 py-3 font-medium text-gray-800">{{ $position->nama_jabatan }}</td>
                    <td class="px-6 py-3 text-gray-600">Rp {{ number_format($position->gaji_pokok, 0, ',', '.') }}</td>
                    <td class="px-6 py-3 text-center space-x-3">
                        <a href="{{ route('positions.show', $position->id) }}"
                            class="text-blue-600 hover:text-blue-800 font-medium">Detail</a>
                        <a href="{{ route('positions.edit', $position->id) }}"
                            class="text-yellow-600 hover:text-yellow-800 font-medium">Edit</a>
                        <form action="{{ route('positions.destroy', $position->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus jabatan ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800 font-semibold transition">
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
        {{ $positions->links('pagination::tailwind') }}
    </div>
    @else
    <div class="p-6 bg-yellow-50 border-l-4 border-yellow-400 text-yellow-700 rounded-xl shadow-sm">
        Tidak ada data jabatan.
    </div>
    @endif
</div> @endsection