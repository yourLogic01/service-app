@extends('layouts.sub')

@section('container')
    <!-- Header -->
    <header class="ex-header">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 offset-xl-1">
                    <h1>Transaction History</h1>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </header> <!-- end of ex-header -->
    <!-- end of header -->

    <!-- Content Row -->
    <div class="container py-3">
        <div class="row">

            <!-- Area Chart -->
            <div class="col">
                <table class="table table-hover text-nowrap" id="myTable" style="width: 100%">
                    <thead>
                        <tr>
                            <th class="text-center">No. Invoice</th>
                            <th class="text-center">Tanggal Pemesanan</th>
                            <th class="text-center">Jenis Barang</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Total Harga</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td class="text-center">{{ $order->id }}</td>
                                <td class="text-center">{{ $order->created_at->translatedFormat('l, d F Y') }}</td>
                                <td class="text-center">{{ $order->item->name }}</td>
                                <td class="text-center">
                                    @if ($order->status == 0)
                                        <span class="badge text-bg-danger text-white">Canceled</span>
                                    @elseif($order->status == 1)
                                        <span class="badge text-bg-warning text-white">Pending</span>
                                    @elseif($order->status == 2)
                                        <span class="badge text-bg-success text-white">Paid</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if ($order->status == 0)
                                        <span>order canceled</span>
                                    @elseif ($order->price == null)
                                        <span>Rp. ?</span>
                                    @else
                                        Rp.
                                        {{ number_format($order->price, 0, ',', '.') }}
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('user.OrderHistoryDetail', $order->id) }}"
                                        class="btn btn-sm btn-primary">Lihat</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
