@extends('dashboard.layouts.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Postingan</h1>
    </div>
    @if (session('success'))
        <div class="alert alert-success d-flex justify-content-between align-items-center">
            {{ session('success') }}
            <button type="button" class="btn-close flex-end" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger d-flex justify-content-between align-items-center">
            {{ session('error') }}
            <button type="button" class="btn-close flex-end" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="py-3">
        <a href="{{ route('admin.postCreate') }}" class="btn btn-primary">Tambah</a>
    </div>
    <!-- Content Row -->
    <div class="row">

        <!-- Area Chart -->
        <div class="col">
            <table class="table table-hover text-nowrap" id="myTable" style="width: 100%">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Judul</th>
                        <th class="text-center">Penerbit</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $post->title }}</td>
                            <td class="text-center">{{ $post->author->name }}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-1">
                                    <a href="{{ route('admin.postDetail', $post->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Detail" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
                                    <a href="{{ route('admin.postEdit', $post->id) }}" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Edit" class="btn btn-sm btn-warning"><i
                                            class="fa fa-edit"></i>
                                    </a>

                                    <form class="deleteForm" action="{{ route('admin.postDelete', $post->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete"
                                            type="button" class="btn btn-sm btn-danger deleteButton">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('script')
    <script>
        var deleteButtons = document.querySelectorAll('.deleteButton');

        deleteButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var form = this.closest('.deleteForm');

                Swal.fire({
                    title: 'Hapus Postingan',
                    text: "Apakah Anda Yakin Untuk Menghapus?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
@endsection
