@extends('layouts.master')

@section('title', 'Data Kehadiran')
@section('page-title', 'Data Kehadiran')

@section('content')
<div class="max-w-6xl mx-auto mt-10 bg-white p-8 rounded-xl shadow-lg">
    <h1 class="text-2xl font-bold text-gray-700 mb-6 text-center">Data Kehadiran Pegawai</h1>

    {{-- Alert Success --}}
    @if(session('success'))
    <div class="mb-4 bg-green-100 text-green-700 border border-green-300 rounded-lg p-3 text-center">
        {{ session('success') }}
    </div>
    @endif

    {{-- Alert Error --}}
    @if(session('error'))
    <div class="mb-4 bg-red-100 text-red-700 border border-red-300 rounded-lg p-3 text-center">
        {{ session('error') }}
    </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-200 rounded-lg">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="px-4 py-3 text-left">Nama Pegawai</th>
                    <th class="px-4 py-3 text-center">Tanggal</th>
                    <th class="px-4 py-3 text-center">Waktu Masuk</th>
                    <th class="px-4 py-3 text-center">Waktu Keluar</th>
                    <th class="px-4 py-3 text-center">Status Absensi</th>
                    <th class="px-4 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 text-center">
                @foreach ($employees as $employee)
                @php
                $attendance = $attendances->firstWhere('karyawan_id', $employee->id);
                @endphp
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-4 py-3 text-left font-medium text-gray-700">{{ $employee->nama_lengkap }}</td>
                    <td class="px-4 py-3">{{ $attendance->tanggal ?? '-' }}</td>
                    <td class="px-4 py-3">{{ $attendance->waktu_masuk ?? '-' }}</td>
                    <td class="px-4 py-3">{{ $attendance->waktu_keluar ?? '-' }}</td>

                    <td class="px-4 py-3">
                        <form action="{{ route('attendances.updateStatus', $employee->id) }}" method="POST" class="flex justify-center gap-2">
                            @csrf
                            @method('PUT')
                            <select name="status_absensi" class="border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-blue-400" required>
                                <option value="">-- Pilih Status --</option>
                                <option value="hadir" {{ $attendance && $attendance->status_absensi == 'hadir' ? 'selected' : '' }}>Hadir</option>
                                <option value="izin" {{ $attendance && $attendance->status_absensi == 'izin' ? 'selected' : '' }}>Izin</option>
                                <option value="sakit" {{ $attendance && $attendance->status_absensi == 'sakit' ? 'selected' : '' }}>Sakit</option>
                                <option value="alpha" {{ $attendance && $attendance->status_absensi == 'alpha' ? 'selected' : '' }}>Alpha</option>
                            </select>
                            <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg transition">
                                Simpan
                            </button>
                        </form>
                    </td>

                    <td class="px-4 py-3">
                        <div class="flex justify-center gap-2">
                            <form action="{{ route('attendances.checkIn', $employee->id) }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition disabled:bg-gray-300 disabled:cursor-not-allowed"
                                    {{ !$attendance || !$attendance->status_absensi ? 'disabled' : '' }}>
                                    Masuk
                                </button>
                            </form>

                            <form action="{{ route('attendances.checkOut', $employee->id) }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg transition disabled:bg-gray-300 disabled:cursor-not-allowed"
                                    {{ !$attendance || !$attendance->waktu_masuk ? 'disabled' : '' }}>
                                    Keluar
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="text-center mt-4">
            <form action="{{ route('attendances.reset') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit"
                    class="btn btn-danger px-4 py-2 fw-semibold shadow-sm rounded-pill"
                    style="font-size: 1rem;"
                    onclick="return confirm('Yakin ingin mereset semua data absensi?')">
                    <i class="bi bi-arrow-counterclockwise me-1"></i> Reset Data Kehadiran
                </button>
            </form>
        </div>

    </div>
</div>
@endsection