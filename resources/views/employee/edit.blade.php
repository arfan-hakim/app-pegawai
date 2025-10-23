@extends('layouts.master')

@section('title', 'Edit Pegawai')
@section('page-title', 'Edit Pegawai')

@section('content')
<div class="container mt-4">
    <h3>Edit Data Karyawan</h3>
    <hr>

    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Terjadi kesalahan!</strong>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('employee.update', $employee->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Nama Lengkap -->
        <div class="mb-3">
            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
            <input type="text" name="nama_lengkap" class="form-control" value="{{ old('nama_lengkap', $employee->nama_lengkap) }}" required>
        </div>

        <!-- Email -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $employee->email) }}" required>
        </div>

        <!-- Nomor Telepon -->
        <div class="mb-3">
            <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
            <input type="text" name="nomor_telepon" class="form-control" value="{{ old('nomor_telepon', $employee->nomor_telepon) }}" required>
        </div>

        <!-- Tanggal Lahir -->
        <div class="mb-3">
            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir', $employee->tanggal_lahir) }}" required>
        </div>

        <!-- Alamat -->
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea name="alamat" class="form-control" rows="3" required>{{ old('alamat', $employee->alamat) }}</textarea>
        </div>

        <!-- Tanggal Masuk -->
        <div class="mb-3">
            <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
            <input type="date" name="tanggal_masuk" class="form-control" value="{{ old('tanggal_masuk', $employee->tanggal_masuk) }}" required>
        </div>

        <!-- Departemen -->
        <div class="mb-3">
            <label for="departemen_id" class="form-label">Departemen</label>
            <select name="departemen_id" class="form-select" required>
                <option value="">-- Pilih Departemen --</option>
                @foreach ($departemen as $d)
                <option value="{{ $d->id }}" {{ old('departemen_id', $employee->departemen_id) == $d->id ? 'selected' : '' }}>
                    {{ $d->nama_departemen }}
                </option>
                @endforeach
            </select>
        </div>

        <!-- Jabatan -->
        <div class="mb-3">
            <label for="jabatan_id" class="form-label">Jabatan</label>
            <select name="jabatan_id" class="form-select" required>
                <option value="">-- Pilih Jabatan --</option>
                @foreach ($jabatan as $j)
                <option value="{{ $j->id }}" {{ old('jabatan_id', $employee->jabatan_id) == $j->id ? 'selected' : '' }}>
                    {{ $j->nama_jabatan }}
                </option>
                @endforeach
            </select>
        </div>

        <!-- Status -->
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" class="form-select" required>
                <option value="">-- Pilih Status --</option>
                <option value="Aktif" {{ old('status', $employee->status) == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="Tidak Aktif" {{ old('status', $employee->status) == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
            </select>
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('employee.index') }}" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Perbarui</button>
        </div>
    </form>
</div>
@endsection