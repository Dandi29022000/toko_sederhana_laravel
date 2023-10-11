
@extends('admin.layouts.app')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Master Data User</h1>

    <div class="row justify-content-center">

        <div class="col-md-8">

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h5 class="m-0 font-weight-bold text-primary">Form Input Data User</h5>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="input-group">
                            <label for="nama" class="col-md-4 col-form-label text-md-end">{{ __('Nama') }}</label>
                            <input class="form-control" name="nama" placeholder="Nama" type="text">
                        </div>
                        <br>
                        <div class="input-group">
                            <label for="username" class="col-md-4 col-form-label text-md-end">{{ __('Username') }}</label>
                            <input class="form-control" name="username" placeholder="Username" type="text">
                        </div>
                        <br>
                        <div class="input-group">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                            <input class="form-control" name="password" placeholder="Password" type="password">
                        </div>
                        <br>
                        <div class="input-group">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                            <input class="form-control" placeholder="Confirm Password" type="password">
                        </div>
                        <br>
                        <div class="">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Level') }}</label>
                            <label class="fancy-radio">
                                <input name="level" value="admin" type="radio">
                                <span><i></i>Admin</span>
                            </label>
                            <label class="fancy-radio">
                                <input name="level" value="customer" type="radio">
                                <span><i></i>Customer</span>
                            </label>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary btn-block">Simpan Data</button>
                            </div>
                            <div class="col-md-6">
                                <button type="button" class="btn btn-warning btn-block" onclick="kembaliuser();">Cancel</button>
                            </div>
                        </div>
                    </form>
                        
                    <!-- Script -->
                    <script>
                        function kembaliuser() {
                            window.location.href = "/admin/user";
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection