<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('data_medis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('anak_id');
            $table->date('tanggal_pemeriksaan');
            $table->float('berat_badan');
            $table->float('tinggi_badan');
            $table->float('lingkar_kepala');
            $table->string('status_gizi');
            $table->text('hasil_pemeriksaan_kesehatan')->nullable();
            $table->text('riwayat_penyakit')->nullable();
            $table->text('imunisasi_yang_diberikan')->nullable();
            $table->text('catatan_pemberian_asi')->nullable();
            $table->text('catatan_pemberian_mpasi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_medis');
    }
};
