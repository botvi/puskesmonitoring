<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monitoring extends Model
{
    use HasFactory;
    protected $fillable = [
        'anak_id',
        'periode_monitoring',
        'catatan_monitoring',
        'rekomendasi_tindakan',
    ];

    public function anak()
    {
        return $this->belongsTo(Anak::class);
    }
}
