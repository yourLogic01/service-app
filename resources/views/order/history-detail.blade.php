@extends('layouts.sub')

@section('container')
    <div class="container pt-5 pb-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="row">
                        <div class="form-group col-md-12 flex-column d-flex pt-5 ps-5">
                            <h2>Invoice | {{ $order->id }}</h2>
                        </div>
                        <div class="form-group col-12 flex-column d-flex ps-5">
                            <h5>{{ $order->created_at->translatedFormat('l, j F Y') }}</h5>
                        </div>
                        <div class="form-group col-lg-3 flex-column d-flex px-5">
                            @if ($order->status == 0)
                                <span class="badge text-bg-danger text-white">Canceled</span>
                            @elseif($order->status == 1)
                                <span class="badge text-bg-warning text-white">Pending</span>
                            @elseif($order->status == 2)
                                <span class="badge text-bg-secondary text-white">On Progress</span>
                            @elseif($order->status == 3)
                                <span class="badge text-bg-success text-white">Paid</span>
                            @endif
                        </div>
                        <div class="hr">
                            <hr style="border-top: solid #000;">
                        </div>
                        <div class="form-group col-md-12 flex-column d-flex ps-5 pt-5">
                            <table class="table-responsive">
                                <tr>
                                    <td>
                                        <h6>Nama Pemesan</h6>
                                    </td>
                                    <td>
                                        <h6>:</h6>
                                    </td>
                                    <td>
                                        <h6>{{ $order->customer_name }}</h6>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h6>Tanggal Reparasi</h6>
                                    </td>
                                    <td>
                                        <h6>:</h6>
                                    </td>
                                    <td>
                                        <h6>{{ $order->date }}</h6>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h6>Alamat</h6>
                                    </td>
                                    <td>
                                        <h6>:</h6>
                                    </td>
                                    <td>
                                        <h6>{{ $order->address }}</h6>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h6>Jenis Barang</h6>
                                    </td>
                                    <td>
                                        <h6>:</h6>
                                    </td>
                                    <td>
                                        <h6>{{ $order->item->name }}</h6>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h6>Description</h6>
                                    </td>
                                    <td>
                                        <h6>:</h6>
                                    </td>
                                    <td>
                                        <h6>{!! $order->description !!}</h6>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h6>Total Harga</h6>
                                    </td>
                                    <td>
                                        <h6>:</h6>
                                    </td>
                                    <td>
                                        @if ($order->status == 0)
                                            <span>order canceled</span>
                                        @elseif ($order->price == null)
                                            <span>Rp. ?</span>
                                        @else
                                            <h6>Rp. {{ number_format($order->price, 0, ',', '.') }}</h6>
                                        @endif
                                    </td>
                                </tr>
                                @if ($order->message)
                                    <tr>
                                        <td>
                                            <h6>Keterangan</h6>
                                        </td>
                                        <td>
                                            <h6>:</h6>
                                        </td>
                                        <td>
                                            <h6>{{ $order->message }}</h6>
                                        </td>
                                    </tr>
                                @endif
                            </table>
                            <h6>gambar Barang :</h6>
                            <img src="{{ asset('storage/' . $order->item_picture) }}" alt="order image" width="300px">
                        </div>
                        <div class="hr">
                            <hr style="border-top: solid #000;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
