@extends('layouts.master')

@section('title', 'Saldo Koperasi')
@section('page-title', 'Saldo Koperasi')

@section('content')
<div class="container mx-auto">
    <!-- Header -->
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-3xl font-bold text-gray-700">Daftar Saldo Koperasi</h1>
    </div>

    @if($koperasis->count())
    <div class="overflow-x-auto bg-white shadow-lg rounded-2xl border border-gray-100">
        <table class="min-w-full divide-y divide-gray-200 text-sm text-gray-700">
            <thead class="bg-gradient-to-r from-blue-600 to-indigo-500 text-white">
                <tr>
                    <th class="px-6 py-3 text-left font-semibold uppercase tracking-wider">Nama Pegawai</th>
                    <th class="px-6 py-3 text-center font-semibold uppercase tracking-wider">Saldo Koperasi</th>
                    <th class="px-6 py-3 text-center font-semibold uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach($koperasis as $koperasi)
                <tr class="hover:bg-blue-50 transition-colors duration-150">
                    <td class="px-6 py-3 font-medium text-gray-800">
                        {{ $koperasi->employee->nama_lengkap }}
                    </td>
                    <td class="px-6 py-3 text-center font-semibold
                        {{ $koperasi->saldo > 0 ? 'text-green-600' : 'text-gray-500' }}">
                        {{ $koperasi->saldo ? 'Rp ' . number_format($koperasi->saldo, 0, ',', '.') : '-' }}
                    </td>
                    <td class="px-6 py-3 text-center">
                        <a href="{{ route('koperasis.useForm', $koperasi->id) }}"
                            class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">
                            Dipakai
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <div class="p-6 bg-yellow-50 border-l-4 border-yellow-400 text-yellow-700 rounded-xl shadow-sm">
        Belum ada data saldo koperasi.
    </div>
    @endif
</div>
@endsection