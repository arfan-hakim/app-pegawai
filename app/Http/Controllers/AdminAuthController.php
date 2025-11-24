<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    // Landing Page
    public function landing()
    {
        return view('landing');
    }

    // Form login
    public function loginForm()
    {
        return view('auth.login');
    }

    // Proses login
    public function loginProcess(Request $request)
    {
        // validasi input wajib diisi
        $request->validate([
            'name' => 'required',
            'phone' => 'required'
        ]);

        // simpan nama admin ke session
        session(['admin_name' => $request->name]);

        // redirect langsung ke welcome admin
        return redirect()->route('admin.welcome');
    }


    // Halaman selamat datang admin
    public function welcome()
    {
        $name = session('admin_name', 'Admin');

        return view('admin.welcome', compact('name'));
    }

    public function logout()
    {
        session()->forget('admin_name');
        return redirect()->route('landing');
    }
}
