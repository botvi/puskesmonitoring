<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kunjungan;
use App\Models\Anak;
use App\Models\DataMedis;
use App\Models\Dokter;
use App\Models\IndentifikasiStunting;
use App\Models\Monitoring;
use Illuminate\Support\Facades\DB;
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

        DB::beginTransaction();
        try {
            $validatedData = $request->validate([
                'anak_id' => 'required|exists:anaks,id',
                'dokter_id' => 'required|exists:dokters,id',
                'tanggal_kunjungan' => 'required|date',
                'tujuan_kunjungan' => 'required|string|max:255',
            ]);
            $kunjungan = Kunjungan::create($validatedData);

            // create medis
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
                'stunting' => 'required|in:Ya,Tidak',
            ]);
            $validatedData['kunjungan_id'] = $kunjungan->id;
            $dataMedis = DataMedis::create($validatedData);


            $validatedData = $request->validate([
                'anak_id' => 'required|exists:anaks,id',
                'catatan_monitoring' => 'nullable|string',
                'rekomendasi_tindakan' => 'nullable|string',
            ]);
            $validatedData['periode_monitoring'] = $request->tanggal_kunjungan;
            $validatedData['kunjungan_id'] = $kunjungan->id;
            Monitoring::create($validatedData);
            if ($dataMedis->stunting == 'Ya') {
                IndentifikasiStunting::create([
                    'monitorings_id' => $kunjungan->id,
                    'anaks_id' => $request->anak_id,
                    'status' => 'teridentifikasi'
                ]);
            }
            DB::commit();
            Alert::success('Berhasil', 'Data kunjungan berhasil disimpan');
            if ($dataMedis->stunting == 'Ya') return redirect()->route('monitoring-stunting.index');
            return redirect()->route('kunjungan.index');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
            return redirect()->route('kunjungan.tambah');
            Alert::error('Gagal', 'Data kunjungan gagal disimpan');
        }
    }

    public function edit($id)
    {
        $kunjungan = Kunjungan::findOrFail($id);
        $anaks = Anak::all();
        $dokters = Dokter::all();
        $dataMedis = DataMedis::where('kunjungan_id', $id)->first();
        $monitoring = Monitoring::where('kunjungan_id', $id)->first();
        return view('pageadmin.kunjungan.edit', compact('kunjungan', 'anaks', 'dokters', 'dataMedis', 'monitoring'));
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $validatedData = $request->validate([
                'anak_id' => 'required|exists:anaks,id',
                'dokter_id' => 'required|exists:dokters,id',
                'tanggal_kunjungan' => 'required|date',
                'tujuan_kunjungan' => 'required|string|max:255',
            ]);
            $kunjungan = Kunjungan::findOrFail($id);
            $kunjungan->update($validatedData);

            // create medis
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
            $dataMedis = DataMedis::where('kunjungan_id', $id)->first();
            $dataMedis->update($validatedData);

            $validatedData = $request->validate([
                'anak_id' => 'required|exists:anaks,id',
                'catatan_monitoring' => 'nullable|string',
                'rekomendasi_tindakan' => 'nullable|string',
            ]);
            $monitoring = Monitoring::where('kunjungan_id', $id)->first();
            $monitoring->update($validatedData);

            DB::commit();
            Alert::success('Berhasil', 'Data kunjungan berhasil diperbarui');
            return redirect()->route('kunjungan.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('kunjungan.edit', $id);
            Alert::error('Gagal', 'Data kunjungan gagal diperbarui');
        }
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
