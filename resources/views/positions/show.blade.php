@extends('layouts.master')

@section('title', 'Detail Jabatan')
@section('page-title', 'Detail Jabatan')

@section('content')
<div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold mb-6 text-gray-700">Detail Jabatan</h1>

    <div class="grid grid-cols-2 gap-4 text-gray-800">
        <div><span class="font-semibold">ID:</span> {{ $position->id }}</div>
        <div><span class="font-semibold">Nama Jabatan:</span> {{ $position->nama_jabatan }}</div>
        <div><span class="font-semibold">Gaji Pokok:</span> Rp {{ number_format($position->gaji_pokok, 0, ',', '.') }}</div>
        <div><span class="font-semibold">Dibuat pada:</span> {{ $position->created_at->format('d M Y H:i') }}</div>
        <div><span class="font-semibold">Diperbarui pada:</span> {{ $position->updated_at->format('d M Y H:i') }}</div>
    </div>

    <div class="mt-6 flex justify-between">
        <a href="{{ route('positions.index') }}"
            class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition">
            Kembali
        </a>

        <a href="{{ route('positions.edit', $position->id) }}"
            class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600 transition">
            Edit
        </a>
    </div>
</div>
@endsection