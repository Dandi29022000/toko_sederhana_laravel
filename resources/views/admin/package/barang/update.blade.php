@extends('admin.layouts.app')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Master Data Barang</h1>

    <div class="row justify-content-center">
        <div class="col-md-8">
        
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h5 class="m-0 font-weight-bold text-primary">Form Update Data Barang</h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('barang.update', $Barang->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="input-group">
                            <label for="id" class="col-md-4 col-form-label text-md-end">{{ __('Id') }}</label>
                            <input class="form-control" name="id" placeholder="Id" type="text" value="{{ $Barang->id }}" readonly>
                        </div>
                        <br>
                            <div class="input-group">
                                <label for="kode_barang" class="col-md-4 col-form-label text-md-end">{{ __('Kode Barang') }}</label>
                                <input class="form-control" name="kode_barang" placeholder="Kode Barang" type="text" value="{{ $Barang->kode_barang }}">
                            </div>
                        <br>
                            <div class="input-group">
                                <label for="nama_barang" class="col-md-4 col-form-label text-md-end">{{ __('Nama Barang') }}</label>
                                <input class="form-control" name="nama_barang" placeholder="Nama Barang" rows="4" value="{{ $Barang->nama_barang }}">
                            </div>
                        <br>
                        <div class="input-group">
                            <label for="pabrik" class="col-md-4 col-form-label text-md-end">{{ __('Pabrik') }}</label>
                            <input class="form-control" name="pabrik" placeholder="Pabrik" type="text" value="{{ $Barang->pabrik }}">
                        </div>
                        <br>
                        <div class="input-group">
                            <label for="satuan" class="col-md-4 col-form-label text-md-end">{{ __('Satuan') }}</label>
                            <input class="form-control" name="satuan" placeholder="Satuan" type="text" value="{{ $Barang->satuan }}">
                        </div>
                        <br>
                        <div class="input-group">
                            <label for="harga_jual" class="col-md-4 col-form-label text-md-end">{{ __('Harga Jual') }}</label>
                            <input class="form-control" name="harga_jual" placeholder="Harga Jual" type="text" value="{{ $Barang->harga_jual }}">
                        </div>
                        <br>
                        <div class="input-group">
                            <label for="gambar" class="col-md-4 col-form-label text-md-end">{{ __('Masukkan Foto') }}</label>
                            <input class="form-control" name="gambar" type="file" value="{{ $Barang->gambar }}">
                            <img width="150px" src="{{asset('storage/'.$Barang->gambar)}}">
                        </div>
                        <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary btn-block">Update Data</button>
                                </div>
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-warning btn-block" onclick="kembaliBarang();">Cancel</button>
                                </div>
                            </div>
                    </form>

                    <script>
                        function kembaliBarang() {
                            window.location.href = "/admin/barang";
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection