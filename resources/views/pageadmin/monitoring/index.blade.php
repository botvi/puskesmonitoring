@extends('template-admin.layout')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Monitoring</h4>

        <div class="mb-3">
            <a href="{{ route('monitoring.tambah') }}" class="btn btn-primary">Tambah Data</a>
        </div>

        <div class="card">
            <h5 class="card-header">Monitoring</h5>
            <div class="table-responsive text-nowrap p-4">
                <table id="example" class="display compact nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Anak</th>
                            <th>Periode Monitoring</th>
                            <th>Catatan Monitoring</th>
                            <th>Rekomendasi Tindakan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($monitorings as $monitoring)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $monitoring->anak->nama_lengkap }}</td>
                                <td>{{ $monitoring->periode_monitoring }}</td>
                                <td>{{ $monitoring->catatan_monitoring }}</td>
                                <td>{{ $monitoring->rekomendasi_tindakan }}</td>
                                <td>
                                    <a href="{{ route('monitoring.edit', $monitoring->id) }}" class="btn btn-warning">Edit</a>
                                    <button class="btn btn-danger" onclick="confirmDelete('{{ $monitoring->id }}')">Delete</button>
                                    <form id="delete-form-{{ $monitoring->id }}" action="{{ route('monitoring.destroy', $monitoring->id) }}" method="POST" style="display: none;">
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
