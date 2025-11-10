<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Koperasi extends Model
{
    use HasFactory;

    protected $fillable = ['employee_id', 'saldo'];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
