@extends('template-admin.layout')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Anak</h4>

        <div class="card">
            <h5 class="card-header">Anak</h5>
            <div class="table-responsive text-nowrap p-4">
                <table class="display compact nowrap" id="example" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nomor Identitas Anak</th>
                            <th>Nama Lengkap</th>
                            <th>Terakhir Kunjungan</th>
                            <th>Orang Tua</th>
                            <th>Laporan Kunjungan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($anaks as $anak)
                            <tr>
                                <td>{{ $anak->nomor_identitas_anak }}</td>
                                <td>{{ $anak->nama_lengkap }}</td>
                                <td>{{ $anak->kunjungans->last() ? $anak->kunjungans->last()->tanggal_kunjungan : '-' }}
                                </td>
                                <td>{{ $anak->orangTua->nama_lengkap }}</td>
                                <td>
                                    <a class="btn btn-primary"
                                        href="{{ route('laporan.show', ['id' => $anak->id]) }}">Lihat</a>
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
