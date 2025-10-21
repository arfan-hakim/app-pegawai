<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $table = 'attendances';

    // Satu absensi dimiliki oleh satu pegawai
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'karyawan_id');
    }
}
