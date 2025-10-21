<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;

    protected $table = 'salaries';

    // Satu data gaji dimiliki oleh satu pegawai
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
