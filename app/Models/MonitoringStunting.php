<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonitoringStunting extends Model
{
    use HasFactory;

    protected $table = 'monitoring_stuntings';

    protected $fillable = [
        'indentifikasi_stunting_id',
        'tanggal',
        'berat_badan',
        'tinggi_badan',
        'lingkar_kepala',
        'status_gizi',
        'hasil_pemeriksaan_kesehatan',
        'tindakan',
        'catatan',
        'status',
    ];

    public function indentifikasiStunting()
    {
        return $this->belongsTo(IndentifikasiStunting::class, 'indentifikasi_stunting_id');
    }
}
