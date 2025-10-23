@extends('layouts.master')

@section('title', 'Tambah Pegawai')
@section('page-title', 'Tambah Pegawai')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-header bg-primary text-white text-center py-3 rounded-top-4">
            <h4 class="mb-0">Tambah Data Pegawai</h4>
        </div>

        <div class="card-body p-4">
            @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Terjadi kesalahan!</strong>
                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('employees.store') }}" method="POST">
                @csrf

                <!-- Nama Lengkap -->
                <div class="mb-3">
                    <label for="nama_lengkap" class="form-label fw-semibold">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" class="form-control border-primary-subtle"
                        value="{{ old('nama_lengkap') }}" required>
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label fw-semibold">Email</label>
                    <input type="email" name="email" class="form-control border-primary-subtle"
                        value="{{ old('email') }}" required>
                </div>

                <!-- Nomor Telepon -->
                <div class="mb-3">
                    <label for="nomor_telepon" class="form-label fw-semibold">Nomor Telepon</label>
                    <input type="text" name="nomor_telepon" class="form-control border-primary-subtle"
                        value="{{ old('nomor_telepon') }}" required>
                </div>

                <!-- Tanggal Lahir -->
                <div class="mb-3">
                    <label for="tanggal_lahir" class="form-label fw-semibold">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="form-control border-primary-subtle"
                        value="{{ old('tanggal_lahir') }}" required>
                </div>

                <!-- Alamat -->
                <div class="mb-3">
                    <label for="alamat" class="form-label fw-semibold">Alamat</label>
                    <textarea name="alamat" class="form-control border-primary-subtle" rows="3"
                        required>{{ old('alamat') }}</textarea>
                </div>

                <!-- Tanggal Masuk -->
                <div class="mb-3">
                    <label for="tanggal_masuk" class="form-label fw-semibold">Tanggal Masuk</label>
                    <input type="date" name="tanggal_masuk" class="form-control border-primary-subtle"
                        value="{{ old('tanggal_masuk') }}" required>
                </div>

                <!-- Departemen -->
                <div class="mb-3">
                    <label for="departement_id" class="form-label fw-semibold">Departemen</label>
                    <select name="departement_id" class="form-select border-primary-subtle" required>
                        <option value="">-- Pilih Departemen --</option>
                        @foreach ($departemen as $d)
                        <option value="{{ $d->id }}" {{ old('departement_id') == $d->id ? 'selected' : '' }}>
                            {{ $d->nama_departement }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <!-- Jabatan -->
                <div class="mb-3">
                    <label for="jabatan_id" class="form-label fw-semibold">Jabatan</label>
                    <select name="jabatan_id" class="form-select border-primary-subtle" required>
                        <option value="">-- Pilih Jabatan --</option>
                        @foreach ($jabatan as $j)
                        <option value="{{ $j->id }}" {{ old('jabatan_id') == $j->id ? 'selected' : '' }}>
                            {{ $j->nama_jabatan }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <!-- Status -->
                <div class="mb-4">
                    <label for="status" class="form-label fw-semibold">Status</label>
                    <select name="status" class="form-select border-primary-subtle" required>
                        <option value="">-- Pilih Status --</option>
                        <option value="Aktif" {{ old('status') == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="Tidak Aktif" {{ old('status') == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                    </select>
                </div>

                <!-- Tombol Aksi -->
                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('employees.index') }}" class="btn btn-secondary px-4 py-2 rounded-pill shadow-sm">
                        ← Kembali
                    </a>
                    <button type="submit" class="btn btn-primary px-4 py-2 rounded-pill shadow-sm">
                        💾 Simpan Data
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection