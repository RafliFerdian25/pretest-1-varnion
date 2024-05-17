@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-inner">
            {{-- header --}}
            <div class="page-header">
                <h4 class="page-title">Home User</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="{{ route('home') }}">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">
                            Data Pengguna
                        </a>
                    </li>
                </ul>
            </div>

            {{-- main content --}}

            {{-- Daftar Pengguna --}}
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-head-row">
                                <div class="card-title">Data Pengguna</div>
                                <div class="card-tools">
                                    <button onclick="addUser()" class="btn btn-info btn-border btn-round btn-sm mr-2">
                                        <span class="btn-label">
                                        </span>
                                        Tambah Pengguna
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive pb-4">
                                <table id="userTable" class="display table table-striped table-hover">
                                    <thead>
                                        <tr class="space-nowrap">
                                            <th class="text-center">Nomor</th>
                                            <th class="text-center">Nama</th>
                                            <th class="">Jenis Kelamin</th>
                                            <th class="">Jalan</th>
                                            <th class="">Email</th>
                                            <th class="">Profesi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="userTableBody">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Daftar Profesi --}}
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-head-row">
                                <div class="card-title">Data Profesi</div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive pb-4">
                                <table id="professionTable" class="display table table-striped table-hover">
                                    <thead>
                                        <tr class="space-nowrap">
                                            <th class="text-center">Nomor</th>
                                            <th class="text-center">Profesi</th>
                                            <th class="">Jumlah</th>
                                        </tr>
                                    </thead>
                                    <tbody id="professionTableBody">
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
        const userTable = $('#userTable').DataTable({
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
                    "sSortAscending": ": aktifkan untuk mengurutkan kolom seusera naik",
                    "sSortDescending": ": aktifkan untuk mengurutkan kolom seusera menurun"
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

        const professionTable = $('#professionTable').DataTable({
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
                    "sSortAscending": ": aktifkan untuk mengurutkan kolom seusera naik",
                    "sSortDescending": ": aktifkan untuk mengurutkan kolom seusera menurun"
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
            getUsers();
        });

        const showLoadingIndicator = () => {
            $('#userTableBody').html(tableLoader(11, `{{ asset('assets/img/loader/Ellipsis-2s-48px.svg') }}`));
        }

        function getUsers() {
            userTable.clear().draw();
            professionTable.clear().draw();

            showLoadingIndicator();

            $.ajax({
                type: "GET",
                url: "{{ route('get.data.user') }}",
                data: {
                    token: "{{ csrf_token() }}",
                },
                dataType: "json",
                success: function(response) {
                    if (response.data.users.length > 0) {
                        $.each(response.data.users, function(index, user) {
                            var rowData = [
                                index + 1,
                                user.nama,
                                user.jenis_kelamin,
                                user.jalan,
                                user.email,
                                user.profesi, ,
                            ];
                            var rowNode = userTable.row.add(rowData).draw(
                                    false)
                                .node();

                            $(rowNode).find('td').eq(0).addClass('text-center');
                            $(rowNode).find('td').eq(3).addClass('text-nowrap');
                        });

                        // mengambil data profesi
                        var professionData = response.data.users.map(user => user.profesi).reduce(function(obj,
                            item) {
                            obj[item] = (obj[item] || 0) + 1;
                            return obj;
                        }, {});

                        var i = 1;
                        $.each(professionData, function(profession, count) {
                            var rowData = [
                                i++,
                                profession,
                                count,
                            ];
                            var rowNode = $('#professionTable').DataTable().row.add(rowData).draw(
                                    false)
                                .node();

                            $(rowNode).find('td').eq(0).addClass('text-center');
                        });
                    } else {
                        $('#userTableBody').html(tableEmpty(11, 'Pengguna'));
                    }

                },
                error: function(response) {
                    $('#userTableBody').html(tableError(11, `${response.responseJSON.data.error}`));
                }
            });
        }

        function addUser() {
            swal({
                title: "Apakah anda yakin?",
                text: "Akan Menambah Data Pengguna!",
                icon: "warning",
                buttons: ["Batal", "Tambah"],
            }).then((result) => {
                if (result) {
                    $.ajax({
                        type: "GET",
                        url: `{{ route('get.random.user') }}`,
                        data: {
                            _token: "{{ csrf_token() }}",
                        },
                        success: function(response) {
                            swal({
                                    title: "Berhasil!",
                                    text: response.meta.message,
                                    icon: "success",
                                    buttons: {
                                        ok: "OK",
                                    },
                                })
                                .then(() => {
                                    getUsers();
                                });
                        },
                        error: function(xhr, status, error) {
                            if (xhr.responseJSON) {
                                swal({
                                    title: "Gagal!",
                                    text: xhr.statusText + ", Error : " + xhr
                                        .responseJSON.message,
                                    icon: "error",
                                });
                            } else {
                                swal({
                                    title: "Gagal!",
                                    text: "Terjadi kegagalan, silahkan coba beberapa saat lagi! Error: " +
                                        error,
                                    icon: "error",
                                });
                            }
                        }
                    });
                }
            });
        }

        function deleteUser(id) {
            swal({
                dangerMode: true,
                title: "Apakah anda yakin?",
                text: "Data Pengguna akan dihapus!",
                icon: "warning",
                buttons: ["Batal", "Hapus"],
            }).then((result) => {
                if (result) {
                    $.ajax({
                        type: "DELETE",
                        url: `{{ url('/user/${id}') }}`,
                        data: {
                            _token: "{{ csrf_token() }}",
                        },
                        success: function(response) {
                            swal({
                                    title: "Berhasil!",
                                    text: response.meta.message,
                                    icon: "success",
                                    buttons: {
                                        ok: "OK",
                                    },
                                })
                                .then(() => {
                                    getUsers();
                                });
                        },
                        error: function(xhr, status, error) {
                            if (xhr.responseJSON) {
                                swal({
                                    title: "Gagal!",
                                    text: xhr.statusText + ", Error : " + xhr
                                        .responseJSON.message,
                                    icon: "error",
                                });
                            } else {
                                swal({
                                    title: "Gagal!",
                                    text: "Terjadi kegagalan, silahkan coba beberapa saat lagi! Error: " +
                                        error,
                                    icon: "error",
                                });
                            }
                        }
                    });
                }
            });
        }
    </script>
@endsection
