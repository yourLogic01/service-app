@extends('dashboard.layouts.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Confirm Order</h1>
    </div>
    @if (session('error'))
        <div class="alert alert-danger d-flex justify-content-between align-items-center">
            {{ session('error') }}
            <button type="button" class="btn-close flex-end" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <!-- Content Row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Order Details</h6>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h5 class="font-weight-bold">Nama Pemesan:</h5>
                            <p>{{ $order->name }}</p>
                        </div>
                        <div class="col-md-6">
                            <h5 class="font-weight-bold">Alamat:</h5>
                            <p>{{ $order->address }}</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h5 class="font-weight-bold">Tanggal Reservasi:</h5>
                            <p>{{ $order->date }}</p>
                        </div>
                        <div class="col-md-6">
                            <h5 class="font-weight-bold">Jenis Barang:</h5>
                            <p>{{ $order->item->name }}</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <h5 class="font-weight-bold">Detail Kerusakan:</h5>
                            <p>{!! $order->description !!}</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <h5 class="font-weight-bold">Gambar:</h5>
                            <img src="{{ asset('storage/' . $order->item_picture) }}" alt="Gambar Barang" class="img-fluid">
                        </div>
                    </div>
                    <form id="confirm_order_form" class="mt-3" action="{{ route('admin.confirmOrder', $order->id) }}"
                        method="POST">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label for="message" class="form-label">Keterangan perbaikan :</label>
                            <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="3">{{ old('message') }}</textarea>
                            @error('message')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Harga perbaikan :</label>
                            <input id="price" type="text" class="form-control @error('price') is-invalid @enderror"
                                name="price" required value="{{ old('price') }}">
                            @error('price')
                                <div class="invalid-feedback">
                                    {{ $price }}
                                </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-md btn-primary">Selesaikan Order</button>
                    </form>
                </div>
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

            $('#confirm_order_form').submit(function() {
                var price = $('#price').maskMoney('unmasked')[0];
                $('#price').val(price);
            });
        });
    </script>
@endsection
