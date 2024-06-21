@extends('template-admin.layout')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms /</span> Tambah Kunjungan</h4>

        <div class="card mb-4">
            <h5 class="card-header">Tambah Kunjungan</h5>
            <div class="card-body">
                <form action="{{ route('kunjungan.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="anak_id" class="form-label">Anak</label>
                        <select class="form-select" id="anak_id" name="anak_id" required>
                            @foreach($anaks as $anak)
                                <option value="{{ $anak->id }}">{{ $anak->nama_lengkap }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="dokter_id" class="form-label">Dokter</label>
                        <select class="form-select" id="dokter_id" name="dokter_id" required>
                            @foreach($dokters as $dokter)
                                <option value="{{ $dokter->id }}">{{ $dokter->nama_lengkap }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_kunjungan" class="form-label">Tanggal Kunjungan</label>
                        <input type="date" class="form-control" id="tanggal_kunjungan" name="tanggal_kunjungan" required>
                    </div>

                    <div class="mb-3">
                        <label for="tujuan_kunjungan" class="form-label">Tujuan Kunjungan</label>
                        <textarea class="form-control" id="tujuan_kunjungan" name="tujuan_kunjungan" rows="3" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
