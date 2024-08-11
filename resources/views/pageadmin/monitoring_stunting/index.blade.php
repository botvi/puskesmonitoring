<!-- resources/views/pageadmin/orangtua/index.blade.php -->

@extends('template-admin.layout')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Monitoring Stunting</h4>

        <div class="card">
            <h5 class="card-header">Data Anak Stunting</h5>
            <div class="table-responsive text-nowrap p-4">
                <table class="display compact nowrap" id="example" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nama Anak</th>
                            <th>Tanggal Kunjungan</th>
                            <th>status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($monitoringStuntings as $data)
                            <tr>
                                <td>{{ $data->monitoring->anak->nama_lengkap ?? '' }}</td>
                                <td>{{ $data->monitoring->tanggal_kunjungan }}</td>
                                <td>{{ $data->status }}</td>
                                <td>
                                    <a class="btn btn-warning btn-sm"
                                        href="{{ route('monitoring-stunting.detail', $data->id) }}">Detail Monitoring</a>
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
