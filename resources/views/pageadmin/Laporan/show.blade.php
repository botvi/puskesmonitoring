@extends('template-admin.layout')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Kunjungan Detail</h4>

        <div class="card">
            <div style="display: flex; justify-content: space-between; align-items: center">
                <div>
                    <h5 class="card-header">Kunjungan</h5>
                </div>
                <div>
                    <a class="btn btn-secondary" href="{{ route('laporan.print', ['id' => request('id')]) }}"
                        style="margin-right: 10px">Cetak</a>
                </div>
            </div>
            <div class="table-responsive text-nowrap p-4">
                <table class="display compact nowrap" id="example" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nama Anak</th>
                            <th>Nama Dokter</th>
                            <th>Tanggal Kunjungan</th>
                            <th>Tujuan Kunjungan</th>
                            <th>Tanggal Pemeriksaan</th>
                            <th>Berat Badan</th>
                            <th>Tinggi Badan</th>
                            <th>Lingkar Kepala</th>
                            <th>Status Gizi</th>
                            <th>Periode Monitoring</th>
                            <th>Catatan Monitoring</th>
                            <th>Rekomendasi Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kunjungans as $kunjungan)
                            <tr>
                                <td>{{ $kunjungan->anak->nama_lengkap }}</td>
                                <td>{{ $kunjungan->dokter->nama_lengkap }}</td>
                                <td>{{ $kunjungan->tanggal_kunjungan }}</td>
                                <td>{{ $kunjungan->tujuan_kunjungan }}</td>
                                <td>{{ $kunjungan->dataMedis->tanggal_pemeriksaan }}</td>
                                <td>{{ $kunjungan->dataMedis->berat_badan }}</td>
                                <td>{{ $kunjungan->dataMedis->tinggi_badan }}</td>
                                <td>{{ $kunjungan->dataMedis->lingkar_kepala }}</td>
                                <td>{{ $kunjungan->dataMedis->status_gizi }}</td>
                                <td>{{ $kunjungan->monitoring->periode_monitoring }}</td>
                                <td>{{ $kunjungan->monitoring->catatan_monitoring }}</td>
                                <td>{{ $kunjungan->monitoring->rekomendasi_tindakan }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
