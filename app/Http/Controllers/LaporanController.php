<?php

namespace App\Http\Controllers;

use App\Models\Anak;
use App\Models\Kunjungan;
use App\Models\OrangTua;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $anaks = Anak::with('orangTua')->get();
        return view('pageadmin.laporan.index', compact('anaks'));
    }

    public function show($id)
    {
        $kunjungans = Kunjungan::where('anak_id', $id)->with([
            'anak',
            'dokter',
            'dataMedis',
            'monitoring',
        ])->get();
        return view('pageadmin.laporan.show', compact('kunjungans'));
    }

    public function prints($id)
    {
        $kunjungans = Kunjungan::where('anak_id', $id)->with([
            'anak',
            'dokter',
            'dataMedis',
            'monitoring',
        ])->get();
        return view('pageadmin.laporan.laporancetak', compact('kunjungans'));
    }

    // report for orang tua
    public function reportOrangTua()
    {
        $ortu = OrangTua::whereUserId(auth()->user()->id)->first();
        $kunjungans = Kunjungan::whereHas('anak', function ($query) use ($ortu) {
            $query->where('orang_tua_id', $ortu->id);
        })
            ->with([
                'anak',
                'dokter',
                'dataMedis',
                'monitoring',
            ])->get();
        return view('pageadmin.laporan.report-from-ortu', compact('kunjungans'));
    }
}
