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
        Schema::create('indentifikasi_stunting', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('monitorings_id');
            $table->unsignedInteger('anaks_id');
            $table->string('status');
            $table->timestamps();
        });

        Schema::create('monitoring_stuntings', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('indentifikasi_stunting_id');
            $table->date('tanggal');
            $table->float('berat_badan');
            $table->float('tinggi_badan');
            $table->float('lingkar_kepala');
            $table->string('status_gizi');
            $table->text('hasil_pemeriksaan_kesehatan')->nullable();
            $table->text('tindakan')->nullable();
            $table->text('catatan')->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indentifikasi_stunting');
        Schema::dropIfExists('monitoring_stuntings');
    }
};
