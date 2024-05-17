@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-inner">
            {{-- header --}}
            <div class="page-header">
                <h4 class="page-title">Barang</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="{{ route('product') }}">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">
                            Data Barang
                        </a>
                    </li>
                </ul>
            </div>

            {{-- main content --}}

            {{-- Daftar Barang --}}
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-head-row">
                                <div class="card-title">Data Barang</div>
                                <div class="card-tools">
                                    <a href="{{ route('product.create') }}"
                                        class="btn btn-info btn-border btn-round btn-sm mr-2">
                                        <span class="btn-label">
                                        </span>
                                        Tambah Barang
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive pb-4">
                                <table id="productTable" class="display table table-striped table-hover">
                                    <thead>
                                        <tr class="space-nowrap">
                                            <th class="text-center">Nomor</th>
                                            <th class="text-center">Kode</th>
                                            <th class="text-center">Kategori</th>
                                            <th class="text-center">Nama</th>
                                            <th class="text-center">Jumlah</th>
                                            <th class="text-center">Satuan</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="productTableBody">
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

@section('script')
    <script>
        const productTable = $('#productTable').DataTable({
            columnDefs: [{
                targets: 'filter-none',
                orderable: false,
            }],
            language: {
                "sEmptyTable": "Tidak ada data yang tersedia di tabel",
                "sInfo": "Menampilkan _START_ hingga _END_ dari _TOTAL_ entri",
                "sInfoEmpty": "Menampilkan 0 hingga 0 dari 0 entri",
                "sInfoFiltered": "(disaring dari total _MAX_ entri)",
                "sInfoPostFix": "",
                "sInfoThousands": ",",
                "sLengthMenu": "Tampilkan _MENU_ entri",
                "sLoadingRecords": "Memuat...",
                "sProcessing": "Memproses...",
                "sSearch": "Cari:",
                "sSearchPlaceholder": "Masukkan Keyword...",
                "sZeroRecords": "Tidak ditemukan data yang cocok",
                "oPaginate": {
                    "sFirst": "Pertama",
                    "sLast": "Terakhir",
                    "sNext": "Berikutnya",
                    "sPrevious": "Sebelumnya"
                },
                "oAria": {
                    "sSortAscending": ": aktifkan untuk mengurutkan kolom seproducta naik",
                    "sSortDescending": ": aktifkan untuk mengurutkan kolom seproducta menurun"
                },
                "select": {
                    "rows": {
                        "_": "Terpilih %d baris",
                        "0": "Klik sebuah baris untuk memilih",
                        "1": "Terpilih 1 baris"
                    }
                },
                "buttons": {
                    "print": "Cetak",
                    "copy": "Salin",
                    "copyTitle": "Salin ke papan klip",
                    "copySuccess": {
                        "_": "%d baris disalin",
                        "1": "1 baris disalin"
                    }
                },
            },
            lengthMenu: [5, 10, 25, 50, 100],
        });

        $(document).ready(function() {
            getProducts();
        });

        const showLoadingIndicator = () => {
            $('#productTableBody').html(tableLoader(11, `{{ asset('assets/img/loader/Ellipsis-2s-48px.svg') }}`));
        }

        function getProducts() {
            productTable.clear().draw();

            showLoadingIndicator();

            $.ajax({
                type: "GET",
                url: "{{ route('get.product.data') }}",
                data: {
                    token: "{{ csrf_token() }}",
                },
                dataType: "json",
                success: function(response) {
                    if (response.data.products.length > 0) {
                        $.each(response.data.products, function(index, product) {
                            var rowData = [
                                index + 1,
                                product.kode,
                                product.category.nama,
                                product.nama,
                                product.jumlah,
                                product.unit.nama,
                                `<a href="{{ url('barang/${product.id}/edit') }}" class="btn btn-primary btn-sm mr-2">
                                    <i class="fas fa-edit"></i>
                                </a>`,
                            ];
                            var rowNode = productTable.row.add(rowData).draw(
                                    false)
                                .node();

                            $(rowNode).find('td').eq(0).addClass('text-center');
                            $(rowNode).find('td').eq(3).addClass('text-nowrap');
                            $(rowNode).find('td').eq(4).addClass('text-center');
                            $(rowNode).find('td').eq(5).addClass('text-center');
                            $(rowNode).find('td').eq(6).addClass('text-center');
                        });

                    } else {
                        $('#productTableBody').html(tableEmpty(11, 'Barang'));
                    }

                },
                error: function(response) {
                    $('#productTableBody').html(tableError(11, `${response.responseJSON.data.error}`));
                }
            });
        }
    </script>
@endsection
