@extends('layouts.master')

@section('title', 'Daftar Jabatan')
@section('page-title', '📋 Daftar Jabatan')

@section('content')
<div class="container mx-auto mt-10">

    <!-- Header Halaman -->
    <div class="flex items-center justify-between mb-8">
        <a href="{{ route('positions.create') }}"
            class="bg-green-700 hover:bg-green-800 text-white px-4 py-2 rounded-lg shadow-md transition-all duration-200 flex items-center gap-2">
            ➕ Tambah Jabatan
        </a>
    </div>

    <!-- Cek Data -->
    @if($positions->count())
    <div class="overflow-x-auto bg-white/90 dark:bg-gray-800/90 backdrop-blur-md shadow-lg rounded-2xl border border-green-200 dark:border-green-700">
        <table class="min-w-full divide-y divide-green-200 dark:divide-green-700 text-sm text-gray-800 dark:text-gray-200">
            <thead class="bg-gradient-to-r from-green-700 to-emerald-600 text-white">
                <tr>
                    <th class="px-6 py-3 text-left font-semibold uppercase tracking-wider">Nama Jabatan</th>
                    <th class="px-6 py-3 text-left font-semibold uppercase tracking-wider">Gaji Pokok</th>
                    <th class="px-6 py-3 text-center font-semibold uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-green-100 dark:divide-green-800">
                @foreach($positions as $position)
                <tr class="hover:bg-green-50 dark:hover:bg-green-900/50 transition-colors duration-150">
                    <td class="px-6 py-3 font-medium">{{ $position->nama_jabatan }}</td>
                    <td class="px-6 py-3">Rp {{ number_format($position->gaji_pokok, 0, ',', '.') }}</td>
                    <td class="px-6 py-3 text-center flex justify-center space-x-4">

                        <a href="{{ route('positions.show', $position->id) }}"
                            class="text-green-600 hover:text-green-800 font-medium transition">
                            🔍 Detail
                        </a>

                        <a href="{{ route('positions.edit', $position->id) }}"
                            class="text-yellow-600 hover:text-yellow-800 font-medium transition">
                            ✏️ Edit
                        </a>

                        <form action="{{ route('positions.destroy', $position->id) }}" method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus jabatan ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="text-red-600 hover:text-red-800 font-semibold transition">
                                🗑️ Hapus
                            </button>
                        </form>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-8 flex justify-center">
        {{ $positions->links('pagination::tailwind') }}
    </div>
    @else
    <div class="p-6 bg-yellow-50 dark:bg-yellow-900/40 border-l-4 border-yellow-400 dark:border-yellow-600 text-yellow-700 dark:text-yellow-300 rounded-xl shadow-sm">
        ⚠️ Tidak ada data jabatan yang tersedia.
    </div>
    @endif
</div>
@endsection