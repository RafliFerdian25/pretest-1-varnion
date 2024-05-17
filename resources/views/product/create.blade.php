@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-inner">
            {{-- header --}}
            <div class="page-header">
                <h4 class="page-title">Tambah Barang</h4>
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
                            Form Tambah Barang
                        </a>
                    </li>
                </ul>
            </div>

            {{-- main content --}}
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Form Tambah Barang</div>
                            <div class="card-category">
                                Form ini digunakan untuk menambah Barang
                            </div>
                        </div>
                        <form id="formAddProduct" method="POST">
                            @csrf
                            <div class="card-body">
                                {{-- Nama --}}
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-sm-right">Nama
                                        <span class="required-label">*</span></label>
                                    <div class="col-lg-6 col-md-9 col-sm-8">
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Masukkan Nama Barang" minlength="2" maxlength="20" required>
                                    </div>
                                </div>
                                {{-- Kategori --}}
                                <div class="form-group form-show-validation row">
                                    <label for="category" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-sm-right">Kategori
                                        <span class="required-label">*</span></label>
                                    <div class="col-lg-6 col-md-9 col-sm-8">
                                        <select class="form-control" id="category" name="category" required>
                                            <option value="">Pilih Kategori</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->kode }}">{{ $category->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                {{-- Satuan --}}
                                <div class="form-group form-show-validation row">
                                    <label for="unit" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-sm-right">Satuan
                                        <span class="required-label">*</span></label>
                                    <div class="col-lg-6 col-md-9 col-sm-8">
                                        <input type="text" class="form-control" id="unit" name="unit"
                                            placeholder="Masukkan Satuan" required>
                                    </div>
                                </div>
                                {{-- Jumlah --}}
                                <div class="form-group form-show-validation row">
                                    <label for="quantity"
                                        class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-sm-right">Jumlah</label>
                                    <div class="col-lg-6 col-md-9 col-sm-8">
                                        <input type="number" class="form-control" id="quantity" name="quantity"
                                            placeholder="Masukkan Jumlah" max="100" min="0">
                                    </div>
                                </div>
                            </div>
                            <div class="card-action">
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <a href="{{ route('product') }}" id="backToProduct"
                                            class="btn btn-default btn-outline-dark" role="presentation">Batal</a>
                                        <button class="btn btn-primary ml-3" id="formAddProductButton"
                                            type="submit">Kirim</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#category').select2({
                theme: "bootstrap",
            });
        });
        $("#formAddProduct").validate({
            rules: {
                name: {
                    required: true,
                    minlength: 2,
                    maxlength: 20,
                },
                category: {
                    required: true,
                },
                unit: {
                    required: true,
                },
                quantity: {
                    number: true,
                    min: 0,
                    max: 100,
                },

            },
            messages: {
                name: {
                    required: '<i class="fas fa-exclamation-circle mr-6 text-sm icon-error"></i>Nama Barang tidak boleh kosong',
                    minlength: '<i class="fas fa-exclamation-circle mr-6 text-sm icon-error"></i>Nama Barang harus 1 karakter',
                    maxlength: '<i class="fas fa-exclamation-circle mr-6 text-sm icon-error"></i>Nama Barang maksimal 20 karakter',
                },
                category: {
                    required: '<i class="fas fa-exclamation-circle mr-6 text-sm icon-error"></i>Kategori tidak boleh kosong',
                },
                unit: {
                    required: '<i class="fas fa-exclamation-circle mr-6 text-sm icon-error"></i>Satuan tidak boleh kosong',
                },
                quantity: {
                    number: '<i class="fas fa-exclamation-circle mr-6 text-sm icon-error"></i>Jumlah harus berupa angka',
                    min: '<i class="fas fa-exclamation-circle mr-6 text-sm icon-error"></i>Jumlah minimal 0',
                    max: '<i class="fas fa-exclamation-circle mr-6 text-sm icon-error"></i>Jumlah maksimal 100',
                }
            },
            submitHandler: function(form, event) {
                event.preventDefault();
                var formData = new FormData(form);
                $('#formAddProductButton').html('<i class="fas fa-circle-notch text-lg spinners-2"></i>');
                $('#formAddProductButton').prop('disabled', true);
                $.ajax({
                    type: "POST",
                    url: `{{ route('product.store') }}`,
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        $('#formAddProductButton').html('Kirim');
                        $('#formAddProductButton').prop('disabled', false);
                        swal({
                                title: "Berhasil!",
                                text: response.meta.message,
                                icon: "success",
                                buttons: {
                                    confirm: {
                                        text: "Okay",
                                        value: "confirm",
                                        visible: true,
                                        className: "btn btn-success",
                                        closeModal: true,
                                    }
                                }
                            })
                            .then(() => {
                                window.location.href = response.data.redirect
                            });
                    },
                    error: function(xhr, status, error) {
                        $('#formAddProductButton').html('Kirim');
                        $('#formAddProductButton').prop('disabled', false);
                        if (xhr.responseJSON) {
                            new swal({
                                title: "Gagal!",
                                text: xhr.responseJSON.meta.message + ", Error : " + xhr
                                    .responseJSON.data.error,
                                icon: "error",
                            });
                        } else {
                            new swal({
                                title: "Gagal!",
                                text: "Terjadi kegagalan, silahkan coba beberapa saat lagi! Error: " +
                                    xhr.responseJSON.data.error,
                                error,
                                icon: "error",
                            });
                        }
                        return false;
                    },
                });
            }
        });
    </script>
@endsection
