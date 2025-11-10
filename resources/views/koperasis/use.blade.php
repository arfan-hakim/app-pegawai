@extends('layouts.master')

@section('title', 'Gunakan Saldo Koperasi')
@section('page-title', 'Gunakan Saldo Koperasi')

@section('content')
<div class="max-w-lg mx-auto bg-white p-6 rounded-2xl shadow-md border border-gray-100">
    <h1 class="text-2xl font-bold mb-6 text-gray-700 text-center">Gunakan Saldo Koperasi</h1>

    @if(session('error'))
    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-3 rounded mb-4">
        {{ session('error') }}
    </div>
    @endif

    <table class="w-full mb-6 border border-gray-200 rounded-lg overflow-hidden">
        <tr class="border-b">
            <th class="px-4 py-2 text-left bg-gray-100">Nama Pegawai</th>
            <td class="px-4 py-2">{{ $koperasi->employee->nama_lengkap }}</td>
        </tr>
        <tr>
            <th class="px-4 py-2 text-left bg-gray-100">Saldo Saat Ini</th>
            <td class="px-4 py-2 font-semibold text-green-600">Rp {{ number_format($koperasi->saldo, 0, ',', '.') }}</td>
        </tr>
    </table>

    <form action="{{ route('koperasis.useBalance', $koperasi->id) }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Jumlah yang Ingin Dipakai</label>
            <input type="number" name="jumlah" class="w-full border-gray-300 rounded-lg p-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Masukkan jumlah (Rp)">
            @error('jumlah')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-between mt-6">
            <a href="{{ route('koperasis.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition">Kembali</a>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">Gunakan Saldo</button>
        </div>
    </form>
</div>
@endsection