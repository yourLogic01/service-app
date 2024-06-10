@extends('layouts.sub')

@section('container')
    {{-- <div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
            <h2 class="mb-3">Order Jasa Reparasi</h2>
            
        </div>
    </div>
</div> --}}
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
        <h1 class="h2">Order Jasa Reparasi</h1>
    </div>
    <div class="col-lg-10">
        <div class="card shadow mb-5">
            <div class="card-body">
                <form method="post" action="{{ route('order.store') }}" class="mb-5" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Alamat</label>
                        <textarea class="form-control form-control-address @error('address') is-invalid @enderror" id="address" name="address"
                            rows="3" value="{{ old('address') }}"></textarea>
                        @error('address')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="date" class="form-label">Tanggal Reservasi</label>
                        <input type="date" class="form-control form-control-custom @error('date') is-invalid @enderror"
                            id="date" name="date" value="{{ old('date') }}">
                        @error('date')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-5">
                        <label for="item_id" class="form-label">Jenis Barang</label>
                        <select class="form-select" name="item_id" id="item_id">
                            @foreach ($items as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Jelaskan keadaan barang anda secara description!</label>
                        @error('description')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <input id="description" type="hidden" name="description" value="{{ old('description') }}">
                        <trix-editor input="description"></trix-editor>
                    </div>
                    <div class="mb-3">
                        <label for="item_picture" class="form-label">Input Gambar Barang anda </label>
                        <input class="form-control" type="file" id="item_picture" name="item_picture">
                    </div>
                    <button type="submit" class="btn btn-primary mt-3 py-3">Create Order</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        })
        document.addEventListener('DOMContentLoaded', function() {
            const dateInput = document.getElementById('date');
            const today = new Date().toISOString().split('T')[0];
            dateInput.setAttribute('min', today);
        });
    </script>
@endsection
@section('script')
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 1500
            });
        </script>
    @endif
@endsection
