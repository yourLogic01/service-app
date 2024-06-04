@extends('dashboard.layouts.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Order</h1>
    </div>
    @if (session('success'))
        <div class="alert alert-success d-flex justify-content-between align-items-center">
            {{ session('success') }}
            <button type="button" class="btn-close flex-end" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="py-3">
        <a href="{{ route('admin.orderCreate') }}" class="btn btn-primary">Tambah</a>
    </div>
    <!-- Content Row -->
    <div class="row">

        <!-- Area Chart -->
        <div class="col">
            <table class="table table-hover text-nowrap" id="myTable" style="width: 100%">
                <thead>
                    <tr>
                        <th class="text-center">Id order</th>
                        <th class="text-center">Nama Pemesan</th>
                        <th class="text-center">Tanggal order</th>
                        <th class="text-center">Jenis Barang</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td class="text-center">{{ $order->id }}</td>
                            <td class="text-center">{{ $order->name }}</td>
                            <td class="text-center">{{ $order->created_at->translatedFormat('l, d F Y') }}</td>
                            <td class="text-center">{{ $order->item->name }}</td>
                            <td class="text-center">
                                @if ($order->status == 0)
                                    <span class="badge text-bg-danger text-white">Dibatalkan</span>
                                @elseif($order->status == 1)
                                    <span class="badge text-bg-warning text-white">Butuh Konfirmasi</span>
                                @elseif($order->status == 2)
                                    <span class="badge text-bg-primary text-white">Sudah Bayar</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-1">
                                    <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#detailModal{{ $order->id }} ">Lihat</a>
                                    {{-- Modal --}}
                                    <div class="modal fade" id="detailModal{{ $order->id }}" tabindex="-1"
                                        aria-labelledby="detailModal{{ $order->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <div class="row">
                                                        <div class="col-md-9">
                                                            <h1 class="modal-title fs-5"
                                                                id="detailModal{{ $order->id }}">
                                                                {{ $order->id }} |
                                                                {{ $order->name }}
                                                            </h1>
                                                        </div>
                                                        <div class="col-md-3">
                                                            @if ($order->status == 0)
                                                                <span
                                                                    class="badge text-bg-danger text-white">Dibatalkan</span>
                                                            @elseif($order->status == 1)
                                                                <span class="badge text-bg-warning text-white">Butuh
                                                                    Konfirmasi</span>
                                                            @elseif($order->status == 2)
                                                                <span class="badge text-bg-primary text-white">Sudah
                                                                    Bayar</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>

                                                </div>
                                                <div class="modal-body">
                                                    <div class="row mb-2">
                                                        <div class="col text-start">
                                                            <label for="message-text" class="col-label">Tanggal
                                                                order:</label>
                                                            <p>{{ $order->created_at }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col text-start">
                                                            <label for="message-text" class="col-label">Tanggal
                                                                Reservasi:</label>
                                                            <p>{{ $order->date }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2 text-wrap">
                                                        <div class="col text-start">
                                                            <label for="message-text" class="col-label">Alamat
                                                                Order:</label>
                                                            <p class="text-break">{{ $order->address }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col text-start">
                                                            <label for="message-text" class="col-label">Jenis
                                                                Barang:</label>
                                                            <p>{{ $order->item->name }}</p>
                                                        </div>
                                                    </div>
                                                    @if ($order->price != null)
                                                        <div class="row mb-2">
                                                            <div class="col text-start">
                                                                <label for="message-text" class="col-label">Harga:</label>
                                                                <p>Rp. {{ number_format($order->price, 0, ',', '.') }}</p>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    <div class="row mb-2">
                                                        <div class="col text-start">
                                                            <label for="message-text" class="col-label">Detail
                                                                kerusakan:</label>
                                                            <p>{!! $order->description !!}</p>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col text-start">
                                                            <label for="message-text" class="col-label">Gambar
                                                                Barang:</label>
                                                            <br>
                                                            <img src="{{ asset('storage/' . $order->item_picture) }}"
                                                                alt="" width="300px">
                                                        </div>
                                                    </div>
                                                    @if ($order->teknisi_id != null)
                                                        <div class="row mb-2">
                                                            <div class="col text-start">
                                                                <label for="message-text" class="col-label">Teknisi yang
                                                                    mengerjakan:</label>
                                                                <p>{{ $order->technician->name }}</p>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    @if ($order->message != null)
                                                        <div class="row mb-2">
                                                            <div class="col text-start text-wrap">
                                                                <label for="message-text" class="col-label">Keterangan
                                                                    :</label>
                                                                <p class="text-break">{{ $order->message }}</p>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if ($order->status == 1)
                                        <!-- Button konfirmasi modal -->
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#konfirmModal{{ $order->id }}">
                                            Konfirmasi Order
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="konfirmModal{{ $order->id }}" tabindex="-1"
                                            aria-labelledby="konfirmModalLabel{{ $order->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5"
                                                            id="konfirmModalLabel{{ $order->id }}">Konfirmasi Order
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>konfirmasi Order dengan ID {{ $order->id }}</p>
                                                        <form id="confirm_order_form{{ $order->id }}" class="mt-3"
                                                            action="{{ route('admin.confirmOrder', $order->id) }}"
                                                            method="POST">
                                                            @method('PUT')
                                                            @csrf
                                                            <div class="mb-3">
                                                                <label for="message{{ $order->id }}"
                                                                    class="form-label">Keterangan perbaikan :</label>
                                                                <input id="message{{ $order->id }}" type="text"
                                                                    class="form-control @error('message') is-invalid @enderror"
                                                                    name="message" required value="{{ old('message') }}">
                                                                @error('message')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="price{{ $order->id }}"
                                                                    class="form-label">Harga perbaikan :</label>
                                                                <input id="price{{ $order->id }}" type="text"
                                                                    class="form-control @error('price') is-invalid @enderror"
                                                                    name="price" required value="{{ old('price') }}">
                                                                @error('price')
                                                                    <div class="invalid-feedback">
                                                                        {{ $price }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary btn-sm"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit"
                                                                    class="btn btn-sm btn-primary">Selesaikan
                                                                    Order</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <form action="" method="POST">
                                            @method('PUT')
                                            @csrf
                                            <button type="submit" class="btn btn-primary btn-sm">Konfirmasi
                                                Order</button>
                                        </form> --}}
                                        <!-- Button batal modal -->
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#batalModal{{ $order->id }}">
                                            Batal
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="batalModal{{ $order->id }}" tabindex="-1"
                                            aria-labelledby="batalModalLabel{{ $order->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5"
                                                            id="batalModalLabel{{ $order->id }}">Batalkan Order?</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Apakah anda yakin ingin membatalkan order ini?</p>
                                                        <form action="{{ route('admin.canceledOrder', $order->id) }}"
                                                            method="POST">
                                                            @method('PUT')
                                                            @csrf
                                                            <div class="mb-3">
                                                                <label for="message{{ $order->id }}"
                                                                    class="form-label">Alasan Pembatalan</label>
                                                                <input id="message{{ $order->id }}" type="text"
                                                                    class="form-control @error('message') is-invalid @enderror"
                                                                    name="message" required value="{{ old('message') }}">
                                                                @error('message')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary btn-sm"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit"
                                                                    class="btn btn-sm btn-danger">Batalkan Order</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endsection
    @section('scripts')
        <script src="{{ asset('js/jquery-mask-money.js') }}"></script>
        <script>
            $(document).ready(function() {

                $('#price{{ $order->id }}').maskMoney({
                    prefix: 'Rp.',
                    thousands: '.',
                    decimal: ',',
                });

                $('#confirm_order_form{{ $order->id }}').submit(function() {
                    var price = $('#price{{ $order->id }}').maskMoney('unmasked')[0];
                    $('#price{{ $order->id }}').val(price);
                });
            });
        </script>
    @endsection
