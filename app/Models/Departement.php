<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    use HasFactory;

    protected $fillable = ['nama_departement'];

    protected $table = 'departements';

    // One Departement has many Employees
    public function employees()
    {
        return $this->hasMany(Employee::class, 'departement_id');
    }
}
