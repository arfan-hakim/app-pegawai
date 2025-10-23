<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Departement;
use App\Models\Position;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        // Ambil data pegawai + relasi departemen dan jabatan, urutkan dari terbaru
        $employees = Employee::with(['departement', 'position'])->latest()->paginate(5);

        // Kirim data ke view employees/index.blade.php
        return view('employee.index', compact('employees'));
    }

    // Tampilkan form create
    public function create()
    {
        $departemen = Departement::all();
        $jabatan = Position::all();
        return view('employee.create', compact('departemen', 'jabatan'));
    }

    // Simpan data employee baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email',
            'nomor_telepon' => 'required|string|max:20',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
            'tanggal_masuk' => 'required|date',
            'departement_id' => 'required|exists:departemen,id',
            'jabatan_id' => 'required|exists:positions,id',
            'status' => 'required|string',
        ]);

        Employee::create([
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'nomor_telepon' => $request->nomor_telepon,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'tanggal_masuk' => $request->tanggal_masuk,
            'departement_id' => $request->departemen_id,
            'jabatan_id' => $request->jabatan_id,
            'status' => $request->status,
        ]);

        return redirect()->route('employee.index')->with('success', 'Data karyawan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        // Ambil data karyawan berdasarkan ID
        $employee = Employee::findOrFail($id);

        // Ambil semua data departemen dan jabatan untuk dropdown
        $departemen = Departement::all();
        $jabatan = Position::all();

        // Tampilkan view edit dengan data yang dibutuhkan
        return view('employee.edit', compact('employee', 'departemen', 'jabatan'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama_lengkap'   => 'required|string|max:255',
            'email'          => 'required|email|max:255',
            'nomor_telepon'  => 'required|string|max:20',
            'tanggal_lahir'  => 'required|date',
            'alamat'         => 'required|string|max:255',
            'tanggal_masuk'  => 'required|date',
            'departement_id'  => 'required|exists:departements,id',
            'jabatan_id'     => 'required|exists:positions,id',
            'status'         => 'required|string|max:50',
        ]);

        // Ambil data karyawan yang ingin diupdate
        $employee = Employee::findOrFail($id);

        // Update data (created_at tidak berubah, hanya updated_at otomatis diperbarui)
        $employee->update([
            'nama_lengkap'   => $request->nama_lengkap,
            'email'          => $request->email,
            'nomor_telepon'  => $request->nomor_telepon,
            'tanggal_lahir'  => $request->tanggal_lahir,
            'alamat'         => $request->alamat,
            'tanggal_masuk'  => $request->tanggal_masuk,
            'departement_id'  => $request->departemen_id,
            'jabatan_id'     => $request->jabatan_id,
            'status'         => $request->status,
        ]);

        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('employee.index')->with('success', 'Data karyawan berhasil diperbarui!');
    }
}
