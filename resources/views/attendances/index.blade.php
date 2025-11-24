@extends('layouts.master')

@section('title', 'Data Kehadiran')
@section('page-title', '📋 Daftar Kehadiran Pegawai')

@section('content')
<div class="max-w-6xl mx-auto mt-10 bg-white/90 dark:bg-gray-800/90 backdrop-blur-md p-8 rounded-2xl shadow-lg border border-green-200 dark:border-green-700 transition">

    {{-- Alert Success --}}
    @if(session('success'))
    <div class="mb-4 bg-green-100 text-green-800 border border-green-400 rounded-lg p-3 text-center shadow-sm">
        {{ session('success') }}
    </div>
    @endif

    {{-- Alert Error --}}
    @if(session('error'))
    <div class="mb-4 bg-red-100 text-red-800 border border-red-400 rounded-lg p-3 text-center shadow-sm">
        {{ session('error') }}
    </div>
    @endif

    <div class="overflow-x-auto rounded-xl border border-green-300 dark:border-green-700">
        <table class="min-w-full rounded-xl overflow-hidden">
            <thead class="bg-green-700 text-white">
                <tr>
                    <th class="px-4 py-3 text-left">Nama Pegawai</th>
                    <th class="px-4 py-3 text-center">Tanggal</th>
                    <th class="px-4 py-3 text-center">Waktu Masuk</th>
                    <th class="px-4 py-3 text-center">Waktu Keluar</th>
                    <th class="px-4 py-3 text-center">Status Absensi</th>
                    <th class="px-4 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-green-100 dark:divide-green-700 text-center bg-white/80 dark:bg-gray-900/60">

                @if ($employees->isEmpty())
                <tr>
                    <td colspan="6" class="py-6 text-center text-gray-600 dark:text-gray-300 italic">
                        😕 Data belum tersedia
                    </td>
                </tr>
                @else
                @foreach ($employees as $employee)
                @php
                $attendance = $attendances->firstWhere('karyawan_id', $employee->id);
                @endphp
                <tr class="hover:bg-green-50 dark:hover:bg-green-800 transition">
                    <td class="px-4 py-3 text-left font-medium text-gray-800 dark:text-gray-100">{{ $employee->nama_lengkap }}</td>
                    <td class="px-4 py-3 text-gray-700 dark:text-gray-200">{{ $attendance->tanggal ?? '-' }}</td>
                    <td class="px-4 py-3 text-gray-700 dark:text-gray-200">{{ $attendance->waktu_masuk ?? '-' }}</td>
                    <td class="px-4 py-3 text-gray-700 dark:text-gray-200">{{ $attendance->waktu_keluar ?? '-' }}</td>

                    <td class="px-4 py-3">
                        <form action="{{ route('attendances.updateStatus', $employee->id) }}" method="POST" class="flex justify-center gap-2">
                            @csrf
                            @method('PUT')
                            <select name="status_absensi"
                                class="border border-green-400 dark:border-green-600 bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-100 rounded-lg p-2 focus:ring-2 focus:ring-green-500"
                                required>
                                <option value="">-- Pilih Status --</option>
                                <option value="hadir" {{ $attendance && $attendance->status_absensi == 'hadir' ? 'selected' : '' }}>Hadir</option>
                                <option value="izin" {{ $attendance && $attendance->status_absensi == 'izin' ? 'selected' : '' }}>Izin</option>
                                <option value="sakit" {{ $attendance && $attendance->status_absensi == 'sakit' ? 'selected' : '' }}>Sakit</option>
                                <option value="alpha" {{ $attendance && $attendance->status_absensi == 'alpha' ? 'selected' : '' }}>Alpha</option>
                            </select>
                            <button type="submit"
                                class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg shadow transition">
                                Simpan
                            </button>
                        </form>
                    </td>

                    <td class="px-4 py-3">
                        <div class="flex justify-center gap-2">
                            <form action="{{ route('attendances.checkIn', $employee->id) }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="bg-emerald-600 hover:bg-emerald-700 text-white px-4 py-2 rounded-lg shadow transition disabled:bg-gray-300 disabled:cursor-not-allowed"
                                    {{ !$attendance || !$attendance->status_absensi ? 'disabled' : '' }}>
                                    Masuk
                                </button>
                            </form>

                            <form action="{{ route('attendances.checkOut', $employee->id) }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="bg-rose-600 hover:bg-rose-700 text-white px-4 py-2 rounded-lg shadow transition disabled:bg-gray-300 disabled:cursor-not-allowed"
                                    {{ !$attendance || !$attendance->waktu_masuk ? 'disabled' : '' }}>
                                    Keluar
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>

    {{-- Tombol Reset --}}
    <div class="text-center mt-6">
        <form action="{{ route('attendances.reset') }}" method="POST">
            @csrf
            <button type="submit"
                class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded-full shadow-lg transition font-semibold"
                onclick="return confirm('Yakin ingin mereset semua data absensi?')">
                🔄 Reset Data Kehadiran
            </button>
        </form>
    </div>

</div>
@endsection