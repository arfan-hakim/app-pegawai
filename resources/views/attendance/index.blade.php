@extends('layouts.master')
@section('title', 'Absensi')
@section('page-title', 'Absensi')
@section('content')
<!-- Cek Data -->
@if($attendances->count())
<div class="overflow-x-auto bg-white shadow-lg rounded-2xl border border-gray-100">
    <table class="min-w-full divide-y divide-gray-200 text-sm text-gray-700">
        <thead class="bg-gradient-to-r from-blue-600 to-indigo-500 text-white">
            <tr>
                <th class="px-6 py-3 text-left font-semibold uppercase tracking-wider">Nama Karyawan</th>
                <th class="px-6 py-3 text-left font-semibold uppercase tracking-wider">Tanggal</th>
                <th class="px-6 py-3 text-left font-semibold uppercase tracking-wider">Waktu Masuk</th>
                <th class="px-6 py-3 text-left font-semibold uppercase tracking-wider">Waktu Keluar</th>
                <th class="px-6 py-3 text-left font-semibold uppercase tracking-wider">Status Absensi</th>
                <th class="px-6 py-3 text-center font-semibold uppercase tracking-wider">Aksi</th>
            </tr>
        </thead>

        <tbody class="divide-y divide-gray-100">
            @foreach($attendances as $attendance)
            <tr class="hover:bg-blue-50 transition-colors duration-150">
                <td class="px-6 py-3 font-medium text-gray-800">
                    {{ $attendance->employee->nama_lengkap ?? 'Tidak Ditemukan' }}
                </td>
                <td class="px-6 py-3">{{ $attendance->tanggal }}</td>
                <td class="px-6 py-3">{{ $attendance->waktu_masuk ?? '-' }}</td>
                <td class="px-6 py-3">{{ $attendance->waktu_keluar ?? '-' }}</td>
                <td class="px-6 py-3">
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold
                        @switch($attendance->status_absensi)
                            @case('hadir') bg-green-100 text-green-700 @break
                            @case('izin') bg-yellow-100 text-yellow-700 @break
                            @case('sakit') bg-blue-100 text-blue-700 @break
                            @case('alpha') bg-red-100 text-red-700 @break
                            @default bg-gray-100 text-gray-600
                        @endswitch">
                        {{ ucfirst($attendance->status_absensi) }}
                    </span>
                </td>
                <td class="px-6 py-3 text-center space-x-2">
                    <a href="{{ route('attendances.show', $attendance->id) }}"
                        class="text-blue-600 hover:text-blue-800 font-semibold transition">Detail</a>
                    <a href="{{ route('attendances.edit', $attendance->id) }}"
                        class="text-yellow-600 hover:text-yellow-800 font-semibold transition">Edit</a>
                    <form action="{{ route('attendances.destroy', $attendance->id) }}" method="POST"
                        class="inline-block"
                        onsubmit="return confirm('Yakin ingin menghapus data absensi ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="text-red-600 hover:text-red-800 font-semibold transition">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Pagination -->
<div class="mt-6 flex justify-center">
    {{ $attendances->links('pagination::tailwind') }}
</div>
@else
<div class="p-6 bg-yellow-50 border-l-4 border-yellow-400 text-yellow-700 rounded-xl shadow-sm">
    Tidak ada data absensi.
</div>
@endif
@endsection