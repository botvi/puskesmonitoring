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
                        <label for="anak_id" class="form-label">Nama Anak</label>
                        <select class="form-select" id="anak_id" name="anak_id" required>
                            <option value="" disabled selected>Pilih Anak</option>
                            @foreach($anaks as $anak)
                                <option value="{{ $anak->id }}">{{ $anak->nama_lengkap }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="periode_monitoring" class="form-label">Periode Monitoring</label>
                        <input type="text" class="form-control" id="periode_monitoring" name="periode_monitoring" required>
                    </div>

                    <div class="mb-3">
                        <label for="catatan_monitoring" class="form-label">Catatan Monitoring</label>
                        <textarea class="form-control" id="catatan_monitoring" name="catatan_monitoring" rows="3" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="rekomendasi_tindakan" class="form-label">Rekomendasi Tindakan</label>
                        <textarea class="form-control" id="rekomendasi_tindakan" name="rekomendasi_tindakan" rows="3" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
