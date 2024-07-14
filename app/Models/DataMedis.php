<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataMedis extends Model
{
    use HasFactory;
    protected $fillable = [
        'kunjungan_id',
        'anak_id',
        'tanggal_pemeriksaan',
        'berat_badan',
        'tinggi_badan',
        'lingkar_kepala',
        'status_gizi',
        'hasil_pemeriksaan_kesehatan',
        'riwayat_penyakit',
        'imunisasi_yang_diberikan',
        'catatan_pemberian_asi',
        'catatan_pemberian_mpasi',
    ];

    public function anak()
    {
        return $this->belongsTo(Anak::class);
    }
}
