<?php

namespace Database\Seeders;

use App\Models\Anak;
use App\Models\Dokter;
use App\Models\OrangTua;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class initSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // admin
        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        // orang tua
        User::create([
            'name' => 'Orang Tua 1',
            'email' => '1234567890@mail.com',
            'password' => bcrypt('1234567890'),
        ]);
        OrangTua::create([
            'user_id' => 2,
            'nama_lengkap' => 'Orang Tua 1',
            'alamat' => 'Jl. Orang Tua 1',
            'kontak' => '081234567890',
            'pendidikan' => 'S1',
            'pekerjaan' => 'PNS',
            'nomor_kk' => '1234567890',
            'nik' => '1234567890',
        ]);

        // Dokter
        Dokter::create([
            "nama_lengkap" => "Dokter 1",
            "spesialisasi" => "Spesialis 1",
            "kontak" => "081234567890",
            "alamat" => "Jl. Dokter 1",
        ]);

        Anak::create([
            "orang_tua_id" => 1,
            "nama_lengkap" => "Anak 1",
            "tanggal_lahir" => "2021-01-01",
            "jenis_kelamin" => "Laki-Laki",
            "nomor_identitas_anak" => "1234567890",
        ]);
    }
}
