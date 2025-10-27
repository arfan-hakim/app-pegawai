<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        $attendances = Attendance::whereDate('tanggal', Carbon::today())->get();
        return view('attendances.index', compact('employees', 'attendances'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status_absensi' => 'required|in:hadir,izin,sakit,alpha',
        ]);

        Attendance::updateOrCreate(
            ['karyawan_id' => $id, 'tanggal' => Carbon::today()],
            ['status_absensi' => $request->status_absensi]
        );

        return back()->with('success', 'Status absensi diperbarui!');
    }

    public function checkIn($id)
    {
        $attendance = Attendance::where('karyawan_id', $id)
            ->whereDate('tanggal', Carbon::today())
            ->first();

        if (!$attendance || !$attendance->status_absensi) {
            return back()->with('error', 'Pilih status absensi terlebih dahulu!');
        }

        $attendance->update(['tanggal' => Carbon::today(), 'waktu_masuk' => Carbon::now()->format('H:i:s')]);

        return back()->with('success', 'Waktu masuk tercatat!');
    }

    public function checkOut($id)
    {
        $attendance = Attendance::where('karyawan_id', $id)
            ->whereDate('tanggal', Carbon::today())
            ->first();

        if (!$attendance || !$attendance->waktu_masuk) {
            return back()->with('error', 'Belum melakukan absensi masuk!');
        }

        $attendance->update([
            'waktu_keluar' => Carbon::now()->format('H:i:s'),
        ]);

        return back()->with('success', 'Waktu keluar tercatat!');
    }

    public function reset()
    {
        \App\Models\Attendance::query()->update([
            'tanggal' => null,
            'waktu_masuk' => null,
            'waktu_keluar' => null,
        ]);

        return redirect()->route('attendances.index')->with('success', 'Data absensi berhasil direset.');
    }
}
