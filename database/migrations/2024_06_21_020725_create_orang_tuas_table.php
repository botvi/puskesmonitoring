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
        Schema::create('orang_tuas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('alamat')->nullable();
            $table->string('kontak')->nullable();
            $table->string('pendidikan');
            $table->string('pekerjaan');
            $table->integer('nomor_kk');
            $table->integer('nik');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orang_tuas');
    }
};
