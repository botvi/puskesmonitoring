<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kunjungan;
use App\Models\Anak;
use App\Models\Dokter;
use RealRashid\SweetAlert\Facades\Alert;

class KunjunganController extends Controller
{
    public function index()
    {
        $kunjungans = Kunjungan::with(['anak', 'dokter'])->get();
        return view('pageadmin.kunjungan.index', compact('kunjungans'));
    }

    public function tambah()
    {
        $anaks = Anak::all();
        $dokters = Dokter::all();
        return view('pageadmin.kunjungan.tambah', compact('anaks', 'dokters'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'anak_id' => 'required|exists:anaks,id',
            'dokter_id' => 'required|exists:dokters,id',
            'tanggal_kunjungan' => 'required|date',
            'tujuan_kunjungan' => 'required|string|max:255',
        ]);

        Kunjungan::create($validatedData);

        Alert::success('Berhasil', 'Data kunjungan berhasil disimpan');

        return redirect()->route('kunjungan.index');
    }

    public function edit($id)
    {
        $kunjungan = Kunjungan::findOrFail($id);
        $anaks = Anak::all();
        $dokters = Dokter::all();
        return view('pageadmin.kunjungan.edit', compact('kunjungan', 'anaks', 'dokters'));
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'anak_id' => 'required|exists:anaks,id',
            'dokter_id' => 'required|exists:dokters,id',
            'tanggal_kunjungan' => 'required|date',
            'tujuan_kunjungan' => 'required|string|max:255',
        ]);

        // Find the existing Kunjungan record and update it
        $kunjungan = Kunjungan::findOrFail($id);
        $kunjungan->update($validatedData);

        // Use SweetAlert for a success message
        Alert::success('Berhasil', 'Data kunjungan berhasil diperbarui');

        return redirect()->route('kunjungan.index');
    }

    public function destroy($id)
    {
        $kunjungan = Kunjungan::findOrFail($id);
        $kunjungan->delete();

        // Use SweetAlert for a success message
        Alert::success('Berhasil', 'Data kunjungan berhasil dihapus');

        return redirect()->route('kunjungan.index');
    }
}
