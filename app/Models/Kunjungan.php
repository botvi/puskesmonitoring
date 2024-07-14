<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kunjungan extends Model
{
    use HasFactory;
    protected $fillable = [
        'anak_id',
        'dokter_id',
        'tanggal_kunjungan',
        'tujuan_kunjungan',
    ];

    public function anak()
    {
        return $this->belongsTo(Anak::class);
    }

    public function dokter()
    {
        return $this->belongsTo(Dokter::class);
    }

    public function dataMedis()
    {
        return $this->hasOne(DataMedis::class);
    }

    public function monitoring()
    {
        return $this->hasOne(Monitoring::class);
    }
}
