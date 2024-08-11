<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndentifikasiStunting extends Model
{
    use HasFactory;
    protected $table = 'indentifikasi_stunting';

    protected $fillable = [
        'monitorings_id',
        'anaks_id',
        'status',
    ];

    public function anak()
    {
        return $this->belongsTo(Anak::class, 'anaks_id');
    }

    public function monitoring()
    {
        return $this->belongsTo(Kunjungan::class, 'monitorings_id');
    }
    public function monitoringStuntings()
    {
        return $this->hasMany(MonitoringStunting::class, 'indentifikasi_stunting_id');
    }
}
