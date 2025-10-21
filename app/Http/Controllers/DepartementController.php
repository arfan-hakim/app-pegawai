<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use Illuminate\Http\Request;

class DepartementController extends Controller
{
    /**
     * Tampilkan semua data department.
     */
    public function index()
    {
        $departments = Departement::latest()->paginate(5);
        return view('departement.index', compact('departments'));
    }

    /**
     * Tampilkan form tambah department.
     */
    public function create()
    {
        return view('departement.create');
    }

    /**
     * Simpan data department baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:departments,name',
            'description' => 'nullable|string',
        ]);

        Departement::create($request->all());

        return redirect()->route('departement.index')
            ->with('success', 'Departement berhasil ditambahkan.');
    }

    /**
     * Tampilkan form edit untuk department tertentu.
     */
    public function edit(Departement $department)
    {
        return view('departement.edit', compact('department'));
    }

    /**
     * Update data department di database.
     */
    public function update(Request $request, Departement $department)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:departments,name,' . $department->id,
            'description' => 'nullable|string',
        ]);

        $department->update($request->all());

        return redirect()->route('departement.index')
            ->with('success', 'Department berhasil diperbarui.');
    }

    /**
     * Hapus data department.
     */
    public function destroy(Departement $department)
    {
        $department->delete();

        return redirect()->route('departement.index')
            ->with('success', 'Department berhasil dihapus.');
    }
}
