<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Transaction PDF</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        #transaction-table th,
        #transaction-table td {
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <H1>Data Transaksi</H1>
    <div class="row py-3">
        <table>
            <tr>
                <td>Periode</td>
                <td>:</td>
                @php
                    $startDate = \Carbon\Carbon::parse($startDate)->format('l, d/m/Y');
                    $endDate = \Carbon\Carbon::parse($endDate)->format('l, d/m/Y');
                @endphp
                @if ($startDate == $endDate)
                    <td>{{ $startDate }}</td>
                @else
                    <td>{{ $startDate }} - {{ $endDate }}</td>
                @endif
            </tr>
        </table>
    </div>
    <div class="row">
        <div class="col">
            <table class="table" id="transaction-table">
                <thead>
                    <tr>
                        <th class="text-center">ID Order</th>
                        <th class="text-center">Nama Pemesan</th>
                        <th class="text-center">Tanggal Transaksi</th>
                        <th class="text-center">Jenis Barang</th>
                        <th class="text-center">Total Pembayaran</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td class="text-center">{{ $order->id }}</td>
                            <td class="text-center">{{ $order->customer_name }}</td>
                            <td class="text-center">{{ \Carbon\Carbon::parse($order->created_at)->format('l, d/m/Y') }}
                            </td>
                            <td class="text-center">{{ $order->item->name }}</td>
                            <td class="text-center">Rp. {{ number_format($order->price, 0, ',', '.') }}
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td class="text-center" colspan="4"><strong>Total</strong></td>
                        <td class="text-center"><strong>Rp.
                                {{ number_format($totalTransaction, 0, ',', '.') }}</strong>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
