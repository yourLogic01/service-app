{{-- @extends('dashboard.layouts.main')

@section('content')

    
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
@endsection --}}
@extends('dashboard.layouts.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Complete Order</h1>
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
                    <h6 class="m-0 font-weight-bold text-primary">Order Id : {{ $order->id }}</h6>
                </div>

                <div class="card-body">
                    <form id="confirm_order_form" class="mt-3" action="{{ route('admin.completeOrder', $order->id) }}"
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
