<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anak;
use App\Models\OrangTua;
use RealRashid\SweetAlert\Facades\Alert;

class AnakController extends Controller
{
    public function index()
    {
        $anaks = Anak::with('orangTua')->get();
        return view('pageadmin.anak.index', compact('anaks'));
    }

    public function tambah()
    {
        $orangTuas = OrangTua::all();
        return view('pageadmin.anak.tambah', compact('orangTuas'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'orang_tua_id' => 'required|exists:orang_tuas,id',
            'nama_lengkap' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string|max:255',
            'nomor_identitas_anak' => 'required|string|max:255|unique:anaks,nomor_identitas_anak',
        ]);

        // Create a new Anak record
        Anak::create($validatedData);

        // Use SweetAlert for a success message
        Alert::success('Berhasil', 'Data anak berhasil disimpan');

        return redirect()->route('anak.index');
    }



    public function edit($id)
    {
        $anak = Anak::findOrFail($id);
        $orangTuas = OrangTua::all();
        return view('pageadmin.anak.edit', compact('anak', 'orangTuas'));
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'orang_tua_id' => 'required|exists:orang_tuas,id',
            'nama_lengkap' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string|max:255',
            'nomor_identitas_anak' => 'required|string|max:255|unique:anaks,nomor_identitas_anak,'.$id,
        ]);

        // Find the existing Anak record and update it
        $anak = Anak::findOrFail($id);
        $anak->update($validatedData);

        // Use SweetAlert for a success message
        Alert::success('Berhasil', 'Data anak berhasil diupdate');

        return redirect()->route('anak.index');
    }

    public function destroy($id)
    {
        $anak = Anak::findOrFail($id);
        $anak->delete();

        // Use SweetAlert for a success message
        Alert::success('Berhasil', 'Data anak berhasil dihapus');

        return redirect()->route('anak.index');
    }
}
