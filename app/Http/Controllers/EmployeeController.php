<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    public function index()
    {
        $employees = Employee::latest()->paginate(5);

        return view('employee.index', compact('employees'));
    }

    public function create()
    {
        $employees = Employee::all();
        return view('employee.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap'   => 'required|string|max:255',
            'email'          => 'required|email|max:255',
            'nomor_telepon'  => 'required|string|max:20',
            'tanggal_lahir'  => 'required|date',
            'alamat'         => 'required|string|max:255',
            'tanggal_masuk'  => 'required|date',
            'status'         => 'required|string|max:50',
        ]);

        Employee::create($request->all());
        return redirect()->route('employees.index');
    }

    public function show(string $id)
    {
        $employee = Employee::findOrFail($id);
        return view('employee.show', compact('employee'));
    }

    public function edit(string $id)
    {
        $employee = Employee::findOrFail($id);
        return view('employee.edit', compact('employee'));
    }

    public function update(Request $request, string $id)
    {
        // Validasi input
        $request->validate([
            'nama_lengkap'   => 'required|string|max:255',
            'email'          => 'required|email|max:255',
            'nomor_telepon'  => 'required|string|max:20',
            'tanggal_lahir'  => 'required|date',
            'alamat'         => 'required|string|max:255',
            'tanggal_masuk'  => 'required|date',
            'status'         => 'required|string|max:50',
        ]);

        // Cari data pegawai berdasarkan ID
        $employee = Employee::findOrFail($id);

        // Update data pegawai
        $employee->update($request->only([
            'nama_lengkap',
            'email',
            'nomor_telepon',
            'tanggal_lahir',
            'alamat',
            'tanggal_masuk',
            'status',
        ]));

        // Redirect kembali ke halaman index
        return redirect()->route('employees.index')
            ->with('success', 'Data pegawai berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
        return redirect()->route('employees.index');
    }
}
