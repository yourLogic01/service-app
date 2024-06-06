@extends('dashboard.layouts.main')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex flex-wrap align-items-center" style="margin-bottom: 15px;">
                        <div>
                            Reference: <strong>{{ $order->id }}</strong>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4" style="margin-bottom: 15px;">
                            <div class="col-sm-6 mb-3 mb-md-0">
                                <h5 class="mb-2 border-bottom pb-2">Company Info:</h5>
                                <div><strong>Samid Service</strong></div>
                                <div>Email: samidservice.sme@gmail.com</div>
                                <div>Phone: 08996248476</div>
                            </div>

                            <div class="col-sm-6 mb-3 mb-md-0">
                                <h5 class="mb-2 border-bottom pb-2">Invoice Info:</h5>
                                <div>Invoice: <strong>INV/{{ $order->id }}</strong></div>
                                <div>Date: {{ \Carbon\Carbon::parse($order->date)->format('d M, Y') }}</div>
                                <div>
                                    Status: <strong>
                                        @if ($order->status == 2)
                                            Completed
                                        @endif
                                    </strong>
                                </div>
                                <div>
                                    Payment Status: <strong>
                                        @if ($order->status == 2)
                                            Paid
                                        @endif
                                    </strong>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive-sm" style="margin: 20px 0;">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="align-middle">Nama Pemesan</th>
                                        <th class="align-middle">Harga Perbaikan</th>
                                        <th class="align-middle">Jenis Barang</th>
                                        <th class="align-middle">Kerusakan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="align-middle">
                                            {{ $order->name }} <br>
                                        </td>

                                        <td class="align-middle">
                                            Rp. {{ number_format($order->price, 0, ',', '.') }}
                                        </td>

                                        <td class="align-middle">
                                            {{ $order->item->name }}
                                        </td>

                                        <td class="align-middle">
                                            {!! $order->description !!}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="row">
                            <div class="col-lg-8 col-md-6 col-sm-6 d-flex flex-row justify-content-start p-4"
                                style="margin-top: 15px;">
                                <div>
                                    <h5>Note : </h5>
                                </div>
                                <div class="px-2">
                                    <p>{{ $order->message ? $order->message : 'No description or note.' }}</p>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 col-sm-6 ml-md-auto" style="overflow-x:auto; margin-top: 15px;">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td class="left"><strong>Total Amount</strong></td>
                                            <td class="right">
                                                <strong>Rp. {{ number_format($order->price, 0, ',', '.') }}</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="left"><strong>Paid Amount</strong></td>
                                            <td class="right">
                                                <strong>Rp. {{ number_format($order->price, 0, ',', '.') }}</strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
