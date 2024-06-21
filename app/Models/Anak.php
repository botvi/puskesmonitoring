<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anak extends Model
{
    use HasFactory;
    protected $fillable = [
        'orang_tua_id',
        'nama_lengkap',
        'tanggal_lahir',
        'jenis_kelamin',
        'nomor_identitas_anak',
    ];

    public function orangTua()
    {
        return $this->belongsTo(OrangTua::class);
    }
}
