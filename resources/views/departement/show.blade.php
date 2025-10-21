@extends('layouts.master')

@section('title', 'Detail Departemen')
@section('page-title', 'Detail Departemen')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold mb-6 text-gray-700">Detail Departemen</h1>

    <table class="w-full border border-gray-300 rounded-lg overflow-hidden">
        <tr class="border-b">
            <th class="px-4 py-2 text-left bg-gray-100 w-1/3">Nama Departemen</th>
            <td class="px-4 py-2">{{ $department->nama_departemen }}</td>
        </tr>
        <tr class="border-b">
            <th class="px-4 py-2 text-left bg-gray-100">Kode Departemen</th>
            <td class="px-4 py-2">{{ $department->kode_departemen }}</td>
        </tr>
        <tr class="border-b">
            <th class="px-4 py-2 text-left bg-gray-100">Lokasi</th>
            <td class="px-4 py-2">{{ $department->lokasi }}</td>
        </tr>
        <tr class="border-b">
            <th class="px-4 py-2 text-left bg-gray-100">Deskripsi</th>
            <td class="px-4 py-2">{{ $department->deskripsi ?? '-' }}</td>
        </tr>
        <tr>
            <th class="px-4 py-2 text-left bg-gray-100">Tanggal Dibuat</th>
            <td class="px-4 py-2">{{ $department->created_at->format('d M Y') }}</td>
        </tr>
    </table>

    <div class="mt-4">
        <a href="{{ route('departements.index') }}"
            class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
            Kembali
        </a>
    </div>
</div>
@endsection