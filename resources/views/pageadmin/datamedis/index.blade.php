@extends('template-admin.layout')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Data Medis</h4>

        <div class="mb-3">
            <a href="{{ route('datamedis.tambah') }}" class="btn btn-primary">Tambah Data</a>
        </div>

        <div class="card">
            <h5 class="card-header">Data Medis</h5>
            <div class="table-responsive text-nowrap p-4">
                <table id="example" class="display compact nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nama Anak</th>
                            <th>Tanggal Pemeriksaan</th>
                            <th>Berat Badan</th>
                            <th>Tinggi Badan</th>
                            <th>Lingkar Kepala</th>
                            <th>Status Gizi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dataMedis as $data)
                            <tr>
                                <td>{{ $data->anak->nama_lengkap }}</td>
                                <td>{{ $data->tanggal_pemeriksaan }}</td>
                                <td>{{ $data->berat_badan }}</td>
                                <td>{{ $data->tinggi_badan }}</td>
                                <td>{{ $data->lingkar_kepala }}</td>
                                <td>{{ $data->status_gizi }}</td>
                                <td>
                                    <a href="{{ route('datamedis.edit', $data->id) }}" class="btn btn-warning">Edit</a>
                                    <button class="btn btn-danger" onclick="confirmDelete({{ $data->id }})">Delete</button>
                                    <form id="delete-form-{{ $data->id }}" action="{{ route('datamedis.destroy', $data->id) }}" method="POST" style="display: none;">
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
