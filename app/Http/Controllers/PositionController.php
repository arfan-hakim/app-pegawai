<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $positions = Position::latest()->paginate(5);
        return view('position.index', compact('positions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('position.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_jabatan' => 'required|string|max:255',
            'gaji_pokok' => 'required|numeric',
        ]);

        // Simpan ke database
        Position::create([
            'nama_jabatan' => $request->nama_jabatan,
            'gaji_pokok' => $request->gaji_pokok,
        ]);

        // Redirect kembali ke index dengan pesan sukses
        return redirect()->route('positions.index')
            ->with('success', 'Jabatan berhasil ditambahkan.');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $position = Position::findOrFail($id);
        return view('position.show', compact('position'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Ambil data position berdasarkan ID
        $position = Position::findOrFail($id);

        // Kirim data ke view edit.blade.php
        return view('position.edit', compact('position'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama_jabatan' => 'required|string|max:255',
            'gaji_pokok' => 'required|numeric|min:0',
        ]);

        // Cari data posisi berdasarkan ID
        $position = Position::findOrFail($id);

        // Update data
        $position->nama_jabatan = $request->nama_jabatan;
        $position->gaji_pokok = $request->gaji_pokok;

        // Laravel otomatis mengupdate kolom updated_at
        $position->save();

        // Redirect kembali ke index dengan pesan sukses
        return redirect()->route('positions.index')->with('success', 'Data jabatan berhasil diperbarui!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $position = Position::findOrFail($id);
        $position->delete();

        return redirect()->route('positions.index')
            ->with('success', 'Data jabatan berhasil dihapus.');
    }
}
