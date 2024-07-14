@extends('template-admin.layout')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms /</span> Tambah Monitoring</h4>

        <div class="card mb-4">
            <h5 class="card-header">Tambah Monitoring</h5>
            <div class="card-body">
                <form action="{{ route('monitoring.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label" for="anak_id">Nama Anak</label>
                        <select class="form-select" id="anak_id" name="anak_id" required>
                            <option disabled selected value="">Pilih Anak</option>
                            @foreach ($anaks as $anak)
                                <option value="{{ $anak->id }}">{{ $anak->nama_lengkap }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="periode_monitoring">Periode Monitoring</label>
                        <input class="form-control" id="periode_monitoring" name="periode_monitoring" required
                            type="text">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="catatan_monitoring">Catatan Monitoring</label>
                        <textarea class="form-control" id="catatan_monitoring" name="catatan_monitoring" required rows="3"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="rekomendasi_tindakan">Rekomendasi Tindakan</label>
                        <textarea class="form-control" id="rekomendasi_tindakan" name="rekomendasi_tindakan" required rows="3"></textarea>
                    </div>

                    <button class="btn btn-primary mt-3" type="submit">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
