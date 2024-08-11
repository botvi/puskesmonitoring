<?php

namespace App\Http\Controllers;

use App\Models\IndentifikasiStunting;
use App\Models\MonitoringStunting;
use Illuminate\Contracts\Queue\Monitor;
use Illuminate\Http\Request;

class MonitoringStuntingController extends Controller
{
    public function index()
    {
        $monitoringStuntings = IndentifikasiStunting::with(['monitoring' => function ($Q) {
            return $Q->with([
                'anak',
                'dokter',
                'dataMedis',
                'monitoring',
            ]);
        }])->get();
        // return $monitoringStuntings;
        return view('pageadmin.monitoring_stunting.index', compact('monitoringStuntings'));
    }

    public function detail($id)
    {
        $stuntingMonit = MonitoringStunting::where('indentifikasi_stunting_id', $id)
            ->with('indentifikasiStunting', function ($QQ) {
                return $QQ
                    ->with('anak')
                    ->with('monitoring', function ($Q) {
                        return $Q->with('anak');
                    });
            })
            ->get();
        $id = $id;
        return view('pageadmin.monitoring_stunting.monitoring', compact('stuntingMonit', 'id'));
    }

    public function createKonroll($id)
    {
        return view('pageadmin.monitoring_stunting.create-monitoring', [
            'id' => $id,
        ]);
    }

    // edit
    public function edit($id)
    {
        $monitoringStunting = MonitoringStunting::find($id);
        return view('pageadmin.monitoring_stunting.edit-monitoring', compact('monitoringStunting'));
    }

    public function storeKonroll(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'indentifikasi_stunting_id' => 'required',
                'tanggal' => 'required|date',
                'berat_badan' => 'required|numeric',
                'tinggi_badan' => 'required|numeric',
                'lingkar_kepala' => 'required|numeric',
                'status_gizi' => 'required|string|max:255',
                'hasil_pemeriksaan_kesehatan' => 'nullable|string',
                'tindakan' => 'nullable|string',
                'catatan' => 'nullable|string',
                'status' => 'required',
            ]);
            $monitoringStunting = MonitoringStunting::create($validatedData);
            return redirect()->route('monitoring-stunting.detail', $monitoringStunting->indentifikasi_stunting_id);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    // update
    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'indentifikasi_stunting_id' => 'required',
                'tanggal' => 'required|date',
                'berat_badan' => 'required|numeric',
                'tinggi_badan' => 'required|numeric',
                'lingkar_kepala' => 'required|numeric',
                'status_gizi' => 'required|string|max:255',
                'hasil_pemeriksaan_kesehatan' => 'nullable|string',
                'tindakan' => 'nullable|string',
                'catatan' => 'nullable|string',
                'status' => 'required',
            ]);
            $monitoringStunting = MonitoringStunting::find($id);
            $monitoringStunting->update($validatedData);
            return redirect()->route('monitoring-stunting.detail', $monitoringStunting->indentifikasi_stunting_id);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $monitoringStunting = MonitoringStunting::find($id);
            $monitoringStunting->delete();
            return redirect()->route('monitoring-stunting.detail', $monitoringStunting->indentifikasi_stunting_id);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    // print
    public function prints($id)
    {
        $stuntingMonit = MonitoringStunting::where('indentifikasi_stunting_id', $id)
            ->with('indentifikasiStunting', function ($QQ) {
                return $QQ
                    ->with('anak')
                    ->with('monitoring', function ($Q) {
                        return $Q->with('anak');
                    });
            })
            ->get();
        $id = $id;
        return view('pageadmin.monitoring_stunting.prints', compact('stuntingMonit', 'id'));
    }
}
