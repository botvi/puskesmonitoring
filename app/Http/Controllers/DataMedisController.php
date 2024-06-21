<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataMedis;
use App\Models\Anak;
use RealRashid\SweetAlert\Facades\Alert;

class DataMedisController extends Controller
{
    public function index()
    {
        $dataMedis = DataMedis::with('anak')->get();
        return view('pageadmin.datamedis.index', compact('dataMedis'));
    }

    public function tambah()
    {
        $anaks = Anak::all();
        return view('pageadmin.datamedis.tambah', compact('anaks'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'anak_id' => 'required|exists:anaks,id',
            'tanggal_pemeriksaan' => 'required|date',
            'berat_badan' => 'required|numeric',
            'tinggi_badan' => 'required|numeric',
            'lingkar_kepala' => 'required|numeric',
            'status_gizi' => 'required|string|max:255',
            'hasil_pemeriksaan_kesehatan' => 'nullable|string',
            'riwayat_penyakit' => 'nullable|string',
            'imunisasi_yang_diberikan' => 'nullable|string',
            'catatan_pemberian_asi' => 'nullable|string',
            'catatan_pemberian_mpasi' => 'nullable|string',
        ]);

        // Create a new DataMedis record
        DataMedis::create($validatedData);

        // Use SweetAlert for a success message
        Alert::success('Berhasil', 'Data medis berhasil disimpan');

        return redirect()->route('datamedis.index');
    }

    public function show($id)
    {
        $dataMedis = DataMedis::with('anak')->findOrFail($id);
        return view('pageadmin.datamedis.show', compact('dataMedis'));
    }

    public function edit($id)
    {
        $dataMedis = DataMedis::findOrFail($id);
        $anaks = Anak::all();
        return view('pageadmin.datamedis.edit', compact('dataMedis', 'anaks'));
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'anak_id' => 'required|exists:anaks,id',
            'tanggal_pemeriksaan' => 'required|date',
            'berat_badan' => 'required|numeric',
            'tinggi_badan' => 'required|numeric',
            'lingkar_kepala' => 'required|numeric',
            'status_gizi' => 'required|string|max:255',
            'hasil_pemeriksaan_kesehatan' => 'nullable|string',
            'riwayat_penyakit' => 'nullable|string',
            'imunisasi_yang_diberikan' => 'nullable|string',
            'catatan_pemberian_asi' => 'nullable|string',
            'catatan_pemberian_mpasi' => 'nullable|string',
        ]);

        // Find the existing DataMedis record and update it
        $dataMedis = DataMedis::findOrFail($id);
        $dataMedis->update($validatedData);

        // Use SweetAlert for a success message
        Alert::success('Berhasil', 'Data medis berhasil diupdate');

        return redirect()->route('datamedis.index');
    }

    public function destroy($id)
    {
        $dataMedis = DataMedis::findOrFail($id);
        $dataMedis->delete();

        // Use SweetAlert for a success message
        Alert::success('Berhasil', 'Data medis berhasil dihapus');

        return redirect()->route('datamedis.index');
    }
}
