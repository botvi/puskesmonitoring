<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Monitoring;
use App\Models\Anak;
use RealRashid\SweetAlert\Facades\Alert;

class MonitoringController extends Controller
{
    public function index()
    {
        $monitorings = Monitoring::with('anak')->get();
        return view('pageadmin.monitoring.index', compact('monitorings'));
    }

    public function tambah()
    {
        $anaks = Anak::all();
        return view('pageadmin.monitoring.tambah', compact('anaks'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'anak_id' => 'required|exists:anaks,id',
            'periode_monitoring' => 'required|string|max:255',
            'catatan_monitoring' => 'nullable|string',
            'rekomendasi_tindakan' => 'nullable|string',
        ]);

        Monitoring::create($validatedData);

        Alert::success('Berhasil', 'Data monitoring berhasil disimpan');

        return redirect()->route('monitoring.index');
    }

    public function edit($id)
    {
        $monitoring = Monitoring::findOrFail($id);
        $anaks = Anak::all();
        return view('pageadmin.monitoring.edit', compact('monitoring', 'anaks'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'anak_id' => 'required|exists:anaks,id',
            'periode_monitoring' => 'required|string|max:255',
            'catatan_monitoring' => 'nullable|string',
            'rekomendasi_tindakan' => 'nullable|string',
        ]);

        $monitoring = Monitoring::findOrFail($id);
        $monitoring->update($validatedData);

        Alert::success('Berhasil', 'Data monitoring berhasil diperbarui');

        return redirect()->route('monitoring.index');
    }

    public function destroy($id)
    {
        $monitoring = Monitoring::findOrFail($id);
        $monitoring->delete();

        Alert::success('Berhasil', 'Data monitoring berhasil dihapus');

        return redirect()->route('monitoring.index');
    }
}
