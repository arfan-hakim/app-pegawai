<?php

namespace App\Http\Controllers;

use App\Models\Koperasi;
use Illuminate\Http\Request;

class KoperasiController extends Controller
{
    // 🧾 Menampilkan semua data saldo koperasi
    public function index()
    {
        $koperasis = Koperasi::with('employee')->get();
        return view('koperasis.index', compact('koperasis'));
    }

    // 🪙 Menampilkan form untuk menggunakan saldo
    public function useForm($id)
    {
        $koperasi = Koperasi::with('employee')->findOrFail($id);
        return view('koperasis.use', compact('koperasi'));
    }

    // 💸 Mengurangi saldo koperasi
    public function useBalance(Request $request, $id)
    {
        $request->validate([
            'jumlah' => 'required|numeric|min:1',
        ]);

        $koperasi = Koperasi::findOrFail($id);

        if ($koperasi->saldo < $request->jumlah) {
            return back()->with('error', 'Saldo tidak mencukupi.');
        }

        $koperasi->saldo -= $request->jumlah;
        $koperasi->save();

        return redirect()->route('koperasis.index')->with('success', 'Saldo berhasil digunakan.');
    }
}
