@extends('layouts.master')

@section('title', 'Daftar Departemen')
@section('page-title', 'Daftar Departemen')

@section('content')
<div class="max-w-5xl mx-auto mt-10 bg-white/90 dark:bg-gray-800/90 backdrop-blur-md p-8 rounded-2xl shadow-lg border border-green-200 dark:border-green-700 transition">

    <!-- Header -->
    <div class="flex items-center justify-between mb-6">
        <a href="{{ route('departements.create') }}"
            class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg shadow transition">
            + Tambah Departemen
        </a>
    </div>

    <!-- Cek Data -->
    @if($departements->count())
    <div class="overflow-x-auto rounded-xl border border-green-300 dark:border-green-700">
        <table class="min-w-full rounded-xl overflow-hidden text-sm text-gray-800 dark:text-gray-100">
            <thead class="bg-green-700 text-white">
                <tr>
                    <th class="px-6 py-3 text-left font-semibold uppercase tracking-wider">Nama Departemen</th>
                    <th class="px-6 py-3 text-center font-semibold uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-green-100 dark:divide-green-700 bg-white/80 dark:bg-gray-900/60">
                @foreach($departements as $departement)
                <tr class="hover:bg-green-50 dark:hover:bg-green-800 transition">
                    <td class="px-6 py-3 font-medium">{{ $departement->nama_departement }}</td>
                    <td class="px-6 py-3 text-center">
                        <form action="{{ route('departements.destroy', $departement->id) }}" method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus departemen ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-600 hover:bg-red-700 text-white px-4 py-1 rounded-md shadow transition">
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
        {{ $departements->links('pagination::tailwind') }}
    </div>

    @else
    <!-- Jika Data Kosong -->
    <div
        class="p-6 mt-6 text-center bg-yellow-100 dark:bg-yellow-900/50 border-l-4 border-yellow-400 text-yellow-800 dark:text-yellow-200 rounded-xl shadow-sm">
        😕 Data departemen belum tersedia
    </div>
    @endif
</div>
@endsection