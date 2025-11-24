@extends('layouts.master')

@section('title', 'Saldo Koperasi')
@section('page-title', '💰 Daftar Saldo Koperasi')

@section('content')
<div class="max-w-5xl mx-auto mt-6">

    @if($koperasi->count())
    <div class="overflow-x-auto bg-white/90 dark:bg-gray-800/90 backdrop-blur-md shadow-xl rounded-2xl border border-green-200 dark:border-green-700 transition-all">
        <table class="min-w-full divide-y divide-green-100 dark:divide-green-700 text-sm text-gray-800 dark:text-gray-100">
            <thead class="bg-gradient-to-r from-green-700 to-emerald-600 text-white">
                <tr>
                    <th class="px-6 py-3 text-left font-semibold uppercase tracking-wider">Nama Pegawai</th>
                    <th class="px-6 py-3 text-center font-semibold uppercase tracking-wider">Saldo Koperasi</th>
                    <th class="px-6 py-3 text-center font-semibold uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-green-100 dark:divide-green-700">
                @foreach($koperasi as $item)
                <tr class="hover:bg-green-50 dark:hover:bg-green-900/30 transition-colors duration-150">
                    <!-- Nama Pegawai -->
                    <td class="px-6 py-3 font-medium text-gray-900 dark:text-gray-100">
                        {{ $item->employee->nama_lengkap ?? '-' }}
                    </td>

                    <!-- Saldo -->
                    <td class="px-6 py-3 text-center font-semibold">
                        @if($item->saldo > 0)
                        <span class="text-green-700 dark:text-green-300">
                            Rp {{ number_format($item->saldo, 0, ',', '.') }}
                        </span>
                        @else
                        <span class="text-gray-500 dark:text-gray-400">-</span>
                        @endif
                    </td>

                    <!-- Tombol Aksi -->
                    <td class="px-6 py-3 text-center">
                        <a href="{{ route('koperasis.useForm', $item->id) }}"
                            class="inline-block bg-amber-500 hover:bg-amber-600 text-white font-medium px-4 py-1.5 rounded-lg shadow transition">
                            Gunakan
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6 flex justify-center">
        {{ $koperasi->links('pagination::tailwind') }}
    </div>

    @else
    <div class="p-6 bg-yellow-50 dark:bg-yellow-900/30 border-l-4 border-yellow-500 text-yellow-800 dark:text-yellow-200 rounded-xl shadow-sm text-center">
        ⚠️ Data saldo koperasi belum tersedia.
    </div>
    @endif
</div>
@endsection