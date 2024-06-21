<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokter;
use RealRashid\SweetAlert\Facades\Alert;

class DokterController extends Controller
{
    public function index()
    {
        $dokters = Dokter::all();
        return view('pageadmin.dokter.index', compact('dokters'));
    }

    public function tambah()
    {
        return view('pageadmin.dokter.tambah');
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'spesialisasi' => 'nullable|string|max:255',
            'kontak' => 'required|string|max:255',
            'alamat' => 'nullable|string|max:255',
        ]);

        // Create a new Dokter record
        Dokter::create($validatedData);

        // Use SweetAlert for a success message
        Alert::success('Berhasil', 'Data dokter berhasil disimpan');

        return redirect()->route('dokter.index');
    }


    public function edit($id)
    {
        $dokter = Dokter::findOrFail($id);
        return view('pageadmin.dokter.edit', compact('dokter'));
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'spesialisasi' => 'nullable|string|max:255',
            'kontak' => 'required|string|max:255',
            'alamat' => 'nullable|string|max:255',
        ]);

        // Find the existing Dokter record and update it
        $dokter = Dokter::findOrFail($id);
        $dokter->update($validatedData);

        // Use SweetAlert for a success message
        Alert::success('Berhasil', 'Data dokter berhasil diupdate');

        return redirect()->route('dokter.index');
    }

    public function destroy($id)
    {
        $dokter = Dokter::findOrFail($id);
        $dokter->delete();

        // Use SweetAlert for a success message
        Alert::success('Berhasil', 'Data dokter berhasil dihapus');

        return redirect()->route('dokter.index');
    }
}
