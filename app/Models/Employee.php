<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'nama_lengkap',
        'email',
        'nomor_telepon',
        'tanggal_lahir',
        'alamat',
        'tanggal_masuk',
        'status',
    ];
    // Pegawai milik satu departemen
    public function departement()
    {
        return $this->belongsTo(Departement::class, 'departemen_id');
    }

    // Pegawai milik satu jabatan
    public function position()
    {
        return $this->belongsTo(Position::class, 'jabatan_id');
    }

    // Pegawai punya banyak absensi
    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'employee_id');
    }

    // Pegawai punya banyak gaji
    public function salaries()
    {
        return $this->hasMany(Salary::class, 'employee_id');
    }
}
