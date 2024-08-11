@extends('template-admin.layout')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms /</span> Monitoring Kunjungan</h4>

        <div class="card mb-4">
            <h5 class="card-header">Monitoring Kunjungan Stunting</h5>
            <div class="card-body">
                {{-- alert --}}
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <form action="{{ route('monitoring-stunting-kontroll.store') }}" method="POST">
                    @csrf
                    <input name="indentifikasi_stunting_id" type="hidden" value="{{ $id }}">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="tanggal">Tanggal Kontrol</label>
                                <input class="form-control @error('tanggal') is-invalid @enderror" id="tanggal"
                                    name="tanggal" required type="date" value="{{ date('Y-m-d') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="berat_badan">Berat Badan</label>
                                <input class="form-control @error('berat_badan') is-invalid @enderror" id="berat_badan"
                                    name="berat_badan" required type="number" value="{{ old('berat_badan') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="tinggi_badan">Tinggi Badan</label>
                                <input class="form-control @error('tinggi_badan') is-invalid @enderror" id="tinggi_badan"
                                    name="tinggi_badan" required type="number" value="{{ old('tinggi_badan') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="lingkar_kepala">Lingkar Kepala</label>
                                <input class="form-control @error('lingkar_kepala') is-invalid @enderror"
                                    id="lingkar_kepala" name="lingkar_kepala" required type="number"
                                    value="{{ old('lingkar_kepala') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="status_gizi">Status Gizi</label>
                                <input class="form-control @error('status_gizi') is-invalid @enderror" id="status_gizi"
                                    name="status_gizi" required type="text" value="{{ old('status_gizi') }}">
                                @error('status_gizi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="hasil_pemeriksaan_kesehatan">Hasil Pemeriksaan Kesehatan</label>
                                <textarea class="form-control @error('hasil_pemeriksaan_kesehatan') is-invalid @enderror"
                                    id="hasil_pemeriksaan_kesehatan" name="hasil_pemeriksaan_kesehatan" required type="text">{{ old('hasil_pemeriksaan_kesehatan') }}</textarea>
                                @error('hasil_pemeriksaan_kesehatan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="tindakan">Tindakan</label>
                                <textarea class="form-control @error('tindakan') is-invalid @enderror" id="tindakan" name="tindakan" required
                                    type="text">{{ old('tindakan') }}</textarea>
                                @error('tindakan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="catatan">Catatan</label>
                                <textarea class="form-control @error('catatan') is-invalid @enderror" id="catatan" name="catatan" required
                                    type="text">{{ old('catatan') }}</textarea>
                                @error('catatan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="status">Status</label>
                                <select class="form-control @error('status') is-invalid @enderror" id="status"
                                    name="status" required>
                                    <option value="sehat">Sehat</option>
                                    <option value="berlanjut">Berlanjut</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary mt-3" type="submit">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
