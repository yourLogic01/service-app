@extends('dashboard.layouts.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Transaksi</h1>
    </div>
    <div class="row">
        <div class="row">
            <div class="col text-start py-3">
                <input type="text" id="daterange" name="daterange" />
            </div>
            <div class="col text-end py-3">
                <a id="exportPDFButton" class="btn btn-primary">Export to PDF</a>
            </div>
        </div>
        <div class="row justify-content-center mb-4">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Total Transaksi
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800" id="totalTransaction">Rp.
                                    {{ number_format($totalTransaction, 0, ',', '.') }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (session('success'))
        <div class="alert alert-success d-flex justify-content-between align-items-center">
            {{ session('success') }}
            <button type="button" class="btn-close flex-end" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <!-- Content Row -->
    <div class="row">
        <!-- Area Chart -->
        <div class="col">
            <table class="table table-hover text-nowrap" id="myTable" style="width: 100%">
                <thead>
                    <tr>
                        <th class="text-center">ID Order</th>
                        <th class="text-center">Nama Pemesan</th>
                        <th class="text-center">Tanggal Transaksi</th>
                        <th class="text-center">Jenis Barang</th>
                        <th class="text-center">Total Pembayaran</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td class="text-center">{{ $order->id }}</td>
                            <td class="text-center">{{ $order->customer_name }}</td>
                            <td class="text-center">{{ $order->created_at->translatedFormat('l, d F Y') }}</td>
                            <td class="text-center">{{ $order->item->name }}</td>
                            <td class="text-center"><span class="badge text-bg-success text-white">Rp
                                    {{ number_format($order->price, 0, ',', '.') }}</span>
                            </td>
                            <td class="text-center"><a href="{{ route('admin.detailTransaction', $order->id) }}"
                                    data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Detail"
                                    class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(function() {
            $('#daterange').daterangepicker({
                opens: 'right',
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                        'month').endOf('month')]
                }
            }, function(start, end, label) {
                loadTransactions(start.format('YYYY-MM-DD'), end.format('YYYY-MM-DD'));
            });

            $('#exportPDFButton').click(function() {
                var startDate = $('#daterange').data('daterangepicker').startDate.format('YYYY-MM-DD');
                var endDate = $('#daterange').data('daterangepicker').endDate.format('YYYY-MM-DD');
                var exportPDFUrl = '{{ route('admin.transactionExportPDF') }}?start_date=' + startDate +
                    '&end_date=' +
                    endDate;
                window.location.href = exportPDFUrl;
            });

            function loadTransactions(startDate, endDate) {
                $.ajax({
                    url: '{{ route('admin.loadTransactions') }}',
                    type: 'GET',
                    data: {
                        start_date: startDate,
                        end_date: endDate
                    },
                    success: function(response) {
                        $('#myTable').DataTable().destroy();
                        $('#myTable').DataTable({
                            data: response.orders,
                            columns: [{
                                    data: 'id',
                                    className: 'text-center'
                                },
                                {
                                    data: 'customer_name',
                                    className: 'text-center'
                                },
                                {
                                    data: 'created_at',
                                    className: 'text-center',
                                    render: function(data, type, row) {
                                        var date = new Date(data);
                                        var days = ['Minggu', 'Senin', 'Selasa', 'Rabu',
                                            'Kamis', 'Jumat', 'Sabtu'
                                        ];
                                        var dayName = days[date.getDay()];
                                        var formattedDate = ('0' + date.getDate())
                                            .slice(-2) + '/' + ('0' + (date.getMonth() +
                                                1)).slice(-2) + '/' + date
                                            .getFullYear();
                                        return dayName + ', ' + formattedDate;
                                    }
                                },
                                {
                                    data: 'item.name',
                                    className: 'text-center'
                                },
                                {
                                    data: 'price',
                                    className: 'text-center',
                                    render: function(data, type, row) {
                                        return '<span class="badge text-bg-success text-white">Rp. ' +
                                            Number(row.price).toLocaleString('id-ID', {
                                                minimumFractionDigits: 0
                                            }) + '</span>';
                                    }
                                },
                                {
                                    data: 'actions',
                                    className: 'text-center',
                                    orderable: false
                                }
                            ],
                            responsive: true,
                            scrollX: true,
                            order: [],
                        });

                        $('#totalTransaction').empty();
                        var formattedTotalTransaction = 'Rp ' + Number(response.totalTransaction)
                            .toLocaleString('id-ID', {
                                minimumFractionDigits: 0
                            });
                        $('#totalTransaction').append(formattedTotalTransaction);
                    },
                    error: function(xhr) {
                        console.log('Error:', xhr.responseText);
                    }
                });
            }
        });
    </script>
@endsection
