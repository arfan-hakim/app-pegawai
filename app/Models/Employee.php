<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';

    protected $fillable = [
        'nama_lengkap',
        'email',
        'nomor_telepon',
        'tanggal_lahir',
        'alamat',
        'tanggal_masuk',
        'departement_id',
        'jabatan_id',
        'status',
    ];

    public function departement()
    {
        return $this->belongsTo(Departement::class, 'departement_id');
    }
    public function position()
    {
        return $this->belongsTo(Position::class, 'jabatan_id');
    }
}