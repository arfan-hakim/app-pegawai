<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\Koperasi;

class SalaryController extends Controller
{
    public function index()
    {
        $salaries = Salary::with('employee')->get();
        return view('salaries.index', compact('salaries'));
    }

    public function create()
    {
        $employees = Employee::all();
        return view('salaries.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'bulan' => 'required',
            'gaji_pokok' => 'required|numeric',
            'tunjangan' => 'nullable|numeric',
            'potongan' => 'nullable|numeric',
        ]);

        // Hitung total gaji awal
        $total_gaji_awal = $request->gaji_pokok + ($request->tunjangan ?? 0) - ($request->potongan ?? 0);

        // Hitung potongan koperasi 5%
        $potongan_koperasi = $total_gaji_awal * 0.05;
        $total_gaji_setelah_potongan = $total_gaji_awal - $potongan_koperasi;

        // Simpan ke tabel salaries (yang ditampilkan adalah 95%)
        Salary::create([
            'karyawan_id' => $request->karyawan_id,
            'bulan' => $request->bulan,
            'gaji_pokok' => $request->gaji_pokok,
            'tunjangan' => $request->tunjangan,
            'potongan' => $request->potongan,
            'total_gaji' => $total_gaji_setelah_potongan,
        ]);

        // Tambahkan potongan koperasi ke tabel koperasis
        $koperasi = Koperasi::firstOrCreate(
            ['employee_id' => $request->karyawan_id],
            ['saldo' => 0]
        );

        $koperasi->saldo += $potongan_koperasi;
        $koperasi->save();

        return redirect()->route('salaries.index')
            ->with('success', 'Data gaji berhasil ditambahkan, dan saldo koperasi diperbarui.');
    }


    public function reset()
    {
        \App\Models\Salary::truncate(); // hapus semua isi tabel
        return redirect()->route('salaries.index')->with('success', 'Semua data gaji berhasil dihapus.');
    }
}
