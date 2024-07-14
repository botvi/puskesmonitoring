@extends('template-admin.layout')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Blog</h4>

        <div class="mb-3">
            <a class="btn btn-primary" href="{{ route('blog.tambah') }}">Tambah Data</a>
        </div>

        <div class="card">
            <h5 class="card-header">Blog</h5>
            <div class="table-responsive text-nowrap p-4">
                <table class="display compact nowrap" id="example" style="width:100%">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($blogs as $blog)
                            <tr>
                                <td>{{ $blog->title }}</td>
                                <td>{{ $blog->deskripsi }}</td>
                                <td>
                                    <a class="btn btn-warning" href="{{ route('blog.edit', ['id' => $blog->id]) }}">Edit</a>
                                    <button class="btn btn-danger"
                                        onclick="confirmDelete({{ $blog->id }})">Delete</button>
                                    <form action="{{ route('blog.destroy', $blog->id) }}"
                                        id="delete-form-{{ $blog->id }}" method="POST" style="display: none;">
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
