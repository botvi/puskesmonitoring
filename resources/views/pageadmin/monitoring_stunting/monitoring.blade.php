@extends('template-admin.layout')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms /</span> Monitoring Kunjungan</h4>
        <div class="mb-3" style="display: flex; justify-content: space-between">
            <a class="btn btn-primary" href="{{ route('monitoring-stunting.create', [$id]) }}">Tambah Data</a>
            <a class="btn btn-secondary" href="{{ route('monitoring-stunting-kontroll.print', [$id]) }}">Prints</a>
        </div>
        <div class="card">
            <h5 class="card-header">Data Anak Stunting</h5>
            <div class="table-responsive text-nowrap p-4">
                <table class="display compact nowrap" id="example" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nama Anak</th>
                            <th>Tanggal Kunjungan</th>
                            <th>Berat Badan (kg)</th>
                            <th>Tinggi Badan (cm)</th>
                            <th>Lingkar Kepala (cm)</th>
                            <th>Status Gizi</th>
                            <th>Hasil Pemeriksaan Kesehatan</th>
                            <th>Tindakan</th>
                            <th>Catatan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($stuntingMonit as $data)
                            <tr>
                                <td>{{ $data->indentifikasiStunting->anak->nama_lengkap ?? '' }}</td>
                                <td>{{ $data->tanggal }}</td>
                                <td>{{ $data->berat_badan }}</td>
                                <td>{{ $data->tinggi_badan }}</td>
                                <td>{{ $data->lingkar_kepala }}</td>
                                <td>{{ $data->status_gizi }}</td>
                                <td>{{ $data->hasil_pemeriksaan_kesehatan }}</td>
                                <td>{{ $data->tindakan }}</td>
                                <td>{{ $data->catatan }}</td>
                                <td>{{ $data->status }}</td>
                                <td>
                                    <a class="btn btn-sm btn-warning"
                                        href="{{ route('monitoring-stunting-kontroll.edit', $data->id) }}">Edit</a>
                                    <form action="{{ route('monitoring-stunting-kontroll.destroy', $data->id) }}"
                                        method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection
