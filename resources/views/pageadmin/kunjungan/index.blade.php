@extends('template-admin.layout')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Kunjungan</h4>

        <div class="mb-3">
            <a href="{{ route('kunjungan.tambah') }}" class="btn btn-primary">Tambah Data</a>
        </div>

        <div class="card">
            <h5 class="card-header">Kunjungan</h5>
            <div class="table-responsive text-nowrap p-4">
                <table id="example" class="display compact nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nama Anak</th>
                            <th>Nama Dokter</th>
                            <th>Tanggal Kunjungan</th>
                            <th>Tujuan Kunjungan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kunjungans as $kunjungan)
                            <tr>
                                <td>{{ $kunjungan->anak->nama_lengkap }}</td>
                                <td>{{ $kunjungan->dokter->nama_lengkap }}</td>
                                <td>{{ $kunjungan->tanggal_kunjungan }}</td>
                                <td>{{ $kunjungan->tujuan_kunjungan }}</td>
                                <td>
                                    <a href="{{ route('kunjungan.edit', $kunjungan->id) }}" class="btn btn-warning">Edit</a>
                                    <button class="btn btn-danger" onclick="confirmDelete('{{ $kunjungan->id }}')">Delete</button>
                                    <form id="delete-form-{{ $kunjungan->id }}" action="{{ route('kunjungan.destroy', $kunjungan->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data ini tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            })
        }
    </script>
@endsection
