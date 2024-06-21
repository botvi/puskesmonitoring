<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrangTua extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_lengkap',
        'alamat',
        'kontak',
        'pendidikan',
        'pekerjaan',
        'nomor_kk',
        'nik',
    ];

    public function anak()
    {
        return $this->hasMany(Anak::class);
    }
}
