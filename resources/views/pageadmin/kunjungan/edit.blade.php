@extends('template-admin.layout')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms /</span> Edit Kunjungan</h4>
        <form action="{{ route('kunjungan.update', $kunjungan->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Menggunakan metode PUT untuk update -->
            <div class="card mb-4">
                <h5 class="card-header">Edit Kunjungan</h5>
                <div class="card-body">


                    <div class="mb-3">
                        <label class="form-label" for="anak_id">Anak</label>
                        <select class="form-select" id="anak_id" name="anak_id" required>
                            @foreach ($anaks as $anak)
                                <option {{ $anak->id == $kunjungan->anak_id ? 'selected' : '' }}
                                    value="{{ $anak->id }}">{{ $anak->nama_lengkap }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="dokter_id">Dokter</label>
                        <select class="form-select" id="dokter_id" name="dokter_id" required>
                            @foreach ($dokters as $dokter)
                                <option {{ $dokter->id == $kunjungan->dokter_id ? 'selected' : '' }}
                                    value="{{ $dokter->id }}">{{ $dokter->nama_lengkap }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="tanggal_kunjungan">Tanggal Kunjungan</label>
                        <input class="form-control" id="tanggal_kunjungan" name="tanggal_kunjungan" required type="date"
                            value="{{ $kunjungan->tanggal_kunjungan }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="tujuan_kunjungan">Tujuan Kunjungan</label>
                        <textarea class="form-control" id="tujuan_kunjungan" name="tujuan_kunjungan" required rows="3">{{ $kunjungan->tujuan_kunjungan }}</textarea>
                    </div>

                </div>
            </div>
            <div class="card mb-4">
                <h5 class="card-header">Edit Medis</h5>
                <div class="card-body">
                    <div>
                        <div class="form-group mb-3">
                            <label for="anak_id">Nama Anak</label>
                            <select class="form-control @error('anak_id') is-invalid @enderror" id="anak_id"
                                name="anak_id" required>
                                <option value="">Pilih Anak</option>
                                @foreach ($anaks as $anak)
                                    <option {{ old('anak_id', $dataMedis->anak_id) == $anak->id ? 'selected' : '' }}
                                        value="{{ $anak->id }}">{{ $anak->nama_lengkap }}</option>
                                @endforeach
                            </select>
                            @error('anak_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="tanggal_pemeriksaan">Tanggal Pemeriksaan</label>
                            <input class="form-control @error('tanggal_pemeriksaan') is-invalid @enderror"
                                id="tanggal_pemeriksaan" name="tanggal_pemeriksaan" required type="date"
                                value="{{ old('tanggal_pemeriksaan', $dataMedis->tanggal_pemeriksaan) }}">
                            @error('tanggal_pemeriksaan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="berat_badan">Berat Badan</label>
                            <input class="form-control @error('berat_badan') is-invalid @enderror" id="berat_badan"
                                name="berat_badan" required step="0.01" type="number"
                                value="{{ old('berat_badan', $dataMedis->berat_badan) }}">
                            @error('berat_badan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="tinggi_badan">Tinggi Badan</label>
                            <input class="form-control @error('tinggi_badan') is-invalid @enderror" id="tinggi_badan"
                                name="tinggi_badan" required step="0.01" type="number"
                                value="{{ old('tinggi_badan', $dataMedis->tinggi_badan) }}">
                            @error('tinggi_badan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="lingkar_kepala">Lingkar Kepala</label>
                            <input class="form-control @error('lingkar_kepala') is-invalid @enderror" id="lingkar_kepala"
                                name="lingkar_kepala" required step="0.01" type="number"
                                value="{{ old('lingkar_kepala', $dataMedis->lingkar_kepala) }}">
                            @error('lingkar_kepala')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="status_gizi">Status Gizi</label>
                            <input class="form-control @error('status_gizi') is-invalid @enderror" id="status_gizi"
                                name="status_gizi" required type="text"
                                value="{{ old('status_gizi', $dataMedis->status_gizi) }}">
                            @error('status_gizi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="hasil_pemeriksaan_kesehatan">Hasil Pemeriksaan Kesehatan</label>
                            <textarea class="form-control @error('hasil_pemeriksaan_kesehatan') is-invalid @enderror"
                                id="hasil_pemeriksaan_kesehatan" name="hasil_pemeriksaan_kesehatan">{{ old('hasil_pemeriksaan_kesehatan', $dataMedis->hasil_pemeriksaan_kesehatan) }}</textarea>
                            @error('hasil_pemeriksaan_kesehatan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="riwayat_penyakit">Riwayat Penyakit</label>
                            <textarea class="form-control @error('riwayat_penyakit') is-invalid @enderror" id="riwayat_penyakit"
                                name="riwayat_penyakit">{{ old('riwayat_penyakit', $dataMedis->riwayat_penyakit) }}</textarea>
                            @error('riwayat_penyakit')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="imunisasi_yang_diberikan">Imunisasi yang Diberikan</label>
                            <textarea class="form-control @error('imunisasi_yang_diberikan') is-invalid @enderror" id="imunisasi_yang_diberikan"
                                name="imunisasi_yang_diberikan">{{ old('imunisasi_yang_diberikan', $dataMedis->imunisasi_yang_diberikan) }}</textarea>
                            @error('imunisasi_yang_diberikan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="catatan_pemberian_asi">Catatan Pemberian ASI</label>
                            <textarea class="form-control @error('catatan_pemberian_asi') is-invalid @enderror" id="catatan_pemberian_asi"
                                name="catatan_pemberian_asi">{{ old('catatan_pemberian_asi', $dataMedis->catatan_pemberian_asi) }}</textarea>
                            @error('catatan_pemberian_asi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="catatan_pemberian_mpasi">Catatan Pemberian MPASI</label>
                            <textarea class="form-control @error('catatan_pemberian_mpasi') is-invalid @enderror" id="catatan_pemberian_mpasi"
                                name="catatan_pemberian_mpasi">{{ old('catatan_pemberian_mpasi', $dataMedis->catatan_pemberian_mpasi) }}</textarea>
                            @error('catatan_pemberian_mpasi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>


            <div class="card mb-4">
                <h5 class="card-header">Edit Monitoring</h5>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label" for="catatan_monitoring">Catatan Monitoring</label>
                        <textarea class="form-control" id="catatan_monitoring" name="catatan_monitoring" required rows="3">{{ $monitoring->catatan_monitoring }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="rekomendasi_tindakan">Rekomendasi Tindakan</label>
                        <textarea class="form-control" id="rekomendasi_tindakan" name="rekomendasi_tindakan" required rows="3">{{ $monitoring->rekomendasi_tindakan }}</textarea>
                    </div>
                    <button class="btn btn-primary mt-3" type="submit">Update</button>
                </div>


            </div>
        </form>
    </div>
@endsection
