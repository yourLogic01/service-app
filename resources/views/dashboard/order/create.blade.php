@extends('dashboard.layouts.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Create New Order</h1>
    </div>
    {{-- @if (session('error'))
    <div class="alert alert-danger d-flex justify-content-between align-items-center">
        {{ session('error') }}
        <button type="button" class="btn-close flex-end" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif --}}
    <!-- Content Row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form id="create_order_form" class="form-card p-4" action="{{ route('admin.orderStore') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                    </div>
                    <div class="mb-3">
                        <label for="customer_name" class="form-label">Nama</label>
                        <input type="text"
                            class="form-control form-control-custom @error('customer_name') is-invalid @enderror"
                            id="customer_name" name="customer_name" value="{{ old('customer_name') }}"></input>
                        @error('customer_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="price">Price</label>
                        <input id="price" type="text"
                            class="form-control form-control-custom @error('price') is-invalid @enderror" name="price"
                            required value="{{ old('price') }}">
                        @error('price')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
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
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/jquery-mask-money.js') }}"></script>
    <script>
        $(document).ready(function() {

            $('#price').maskMoney({
                prefix: 'Rp.',
                thousands: '.',
                decimal: ',',
            });

            $('#create_order_form').submit(function() {
                var price = $('#price').maskMoney('unmasked')[0];
                $('#price').val(price);
            });
        });
    </script>
@endsection
