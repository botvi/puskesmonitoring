@extends('template-admin.layout')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms /</span> Tambah Anak</h4>

        <div class="card mb-4">
            <h5 class="card-header">Tambah Anak</h5>
            <div class="card-body">
                <form action="{{ route('anak.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="orang_tua_id">Orang Tua</label>
                        <select class="form-control @error('orang_tua_id') is-invalid @enderror" id="orang_tua_id" name="orang_tua_id" required>
                            <option value="">Pilih Orang Tua</option>
                            @foreach($orangTuas as $orangTua)
                                <option value="{{ $orangTua->id }}" {{ old('orang_tua_id') == $orangTua->id ? 'selected' : '' }}>{{ $orangTua->nama_lengkap }}</option>
                            @endforeach
                        </select>
                        @error('orang_tua_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="nama_lengkap">Nama Lengkap</label>
                        <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap') }}" required>
                        @error('nama_lengkap')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required>
                        @error('tanggal_lahir')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <input type="text" class="form-control @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin" name="jenis_kelamin" value="{{ old('jenis_kelamin') }}" required>
                        @error('jenis_kelamin')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="nomor_identitas_anak">Nomor Identitas Anak</label>
                        <input type="text" class="form-control @error('nomor_identitas_anak') is-invalid @enderror" id="nomor_identitas_anak" name="nomor_identitas_anak" value="{{ old('nomor_identitas_anak') }}" required>
                        @error('nomor_identitas_anak')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
