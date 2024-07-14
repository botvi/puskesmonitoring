<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrangTua;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;

class OrangTuaController extends Controller
{
    public function index()
    {
        $orangTuas = OrangTua::all();
        return view('pageadmin.orangtua.index', compact('orangTuas'));
    }

    public function tambah()
    {
        return view('pageadmin.orangtua.tambah');
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'alamat' => 'nullable|string|max:255',
            'kontak' => 'nullable|string|max:255',
            'pendidikan' => 'nullable|string|max:255',
            'pekerjaan' => 'nullable|string|max:255',
            'nomor_kk' => 'required',
            'nik' => 'required|unique:orang_tuas,nik',
        ]);

        $userCreate = User::create([
            'name' => $validatedData['nama_lengkap'],
            'email' => $validatedData['nik'] . '@mail.com',
            'password' => bcrypt($validatedData['nik']),
            'role' => 'orangtua',
        ]);

        $validatedData['user_id'] = $userCreate->id;

        // Create a new OrangTua record
        $orangTua = OrangTua::create($validatedData);

        // Menggunakan SweetAlert untuk menampilkan pesan sukses
        Alert::success('Berhasil', 'Data orang tua berhasil disimpan');

        // Mengembalikan response atau redirect ke halaman lain
        return redirect()->route('orangtua.index');
    }

    public function edit($id)
    {
        $orangTua = OrangTua::findOrFail($id);
        return view('pageadmin.orangtua.edit', compact('orangTua'));
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'alamat' => 'nullable|string|max:255',
            'kontak' => 'nullable|string|max:255',
            'pendidikan' => 'nullable|string|max:255',
            'pekerjaan' => 'nullable|string|max:255',
            'nomor_kk' => 'required|integer',
            'nik' => 'required|integer|unique:orang_tuas,nik,' . $id,
        ]);

        // Find the existing OrangTua record and update it
        $orangTua = OrangTua::findOrFail($id);
        $orangTua->update($validatedData);

        // Menggunakan SweetAlert untuk menampilkan pesan sukses
        Alert::success('Berhasil', 'Data orang tua berhasil diupdate');

        // Mengembalikan response atau redirect ke halaman lain
        return redirect()->route('orangtua.index');
    }

    public function destroy($id)
    {
        $orangTua = OrangTua::findOrFail($id);
        $orangTua->delete();

        // Menggunakan SweetAlert untuk menampilkan pesan sukses
        Alert::success('Berhasil', 'Data orang tua berhasil dihapus');

        // Mengembalikan response atau redirect ke halaman lain
        return redirect()->route('orangtua.index');
    }
}
