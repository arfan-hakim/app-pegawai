<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use Illuminate\Http\Request;

class DepartementController extends Controller
{
    public function index()
    {
        $departements = Departement::latest()->paginate(5);
        return view('departements.index', compact('departements'));
    }

    public function create()
    {
        return view('departements.create'); // ✅ pakai 'departements'
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_departement' => 'required|string|max:100',
        ]);

        Departement::create($request->all());

        return redirect()->route('departements.index')
            ->with('success', 'Departemen berhasil ditambahkan.');
    }

    public function edit(Departement $departement)
    {
        return view('departements.edit', compact('departement')); // ✅ pakai 'departements'
    }

    public function update(Request $request, Departement $departement)
    {
        $request->validate([
            'nama_departement' => 'required|string|max:100',
        ]);

        $departement->update($request->all());

        return redirect()->route('departements.index')
            ->with('success', 'Departemen berhasil diperbarui.');
    }

    public function destroy(Departement $departement)
    {
        $departement->delete();

        return redirect()->route('departements.index')
            ->with('success', 'Departemen berhasil dihapus.');
    }
}
